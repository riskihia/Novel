<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class DonationController extends Controller
{
    private $response = [];
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }
    
    
    public function index()
    {
        $donations = Donation::orderBy('id', 'desc')->paginate(8);
        return view('showDonations', compact('donations'));
    }

    public function create()
    {
        return view('donation');
    }

    public function store(Request $request)
    {
        
        DB::transaction(function() use($request) {
            $donation = Donation::create([
                'donor_name' => $request->donor_name,
                'donor_email' => $request->donor_email,
                'donation_type' => $request->donation_type,
                'amount' => floatval($request->amount),
                'note' => $request->note,
            ]);
            $payload = [
                'transaction_details' => [
                    'order_id'      => $donation->id,
                    'gross_amount'  => $donation->amount,
                ],
                'customer_details' => [
                    'first_name'    => $donation->donor_name,
                    'email'         => $donation->donor_email,
                    // 'phone'         => '08888888888',
                    // 'address'       => '',
                ],
                'item_details' => [
                    [
                        'id'       => $donation->donation_type,
                        'price'    => $donation->amount,
                        'quantity' => 1,
                        'name'     => ucwords(str_replace('_', ' ', $donation->donation_type))
                    ]
                ],
                "enabled_payments"=> ["other_qris"]
            ];
            $snapToken = Snap::getSnapToken($payload);
            $donation->snap_token = $snapToken;
            $donation->save();

            
            $this->response['snap_token'] = $snapToken;
        });
        // dd($this->response);
        return response()->json($this->response);
    }

    public function notification(Request $request)
    {
        $notif = new Notification();
        DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = Donation::findOrFail($orderId);

          if ($transaction == 'capture') {
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                $donation->setStatusPending();
              } else {
                $donation->setStatusSuccess();
              }

            }
          } elseif ($transaction == 'settlement') {

            $donation->setStatusSuccess();

          } elseif($transaction == 'pending'){

              $donation->setStatusPending();

          } elseif ($transaction == 'deny') {

              $donation->setStatusFailed();

          } elseif ($transaction == 'expire') {

              $donation->setStatusExpired();

          } elseif ($transaction == 'cancel') {

              $donation->setStatusFailed();

          }

        });

        return;
    }
}
