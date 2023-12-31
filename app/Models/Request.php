<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = "requests";
    protected $keyType = "string";
    public $timestamps = true;


    use HasFactory;

    protected $fillable = [
        'judul',
        'link',
    ];
}
