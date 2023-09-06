<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Novel;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Novel::factory(23)->create();
        $daftar_tag = [
            [
            'nama' => 'Action',
            ],
            [
            'nama' => 'Drama',
            ],
            [
            'nama' => 'Cultivation',
            ],
            [
            'nama' => 'Over_powered',
            ],
            [
            'nama' => 'Romance',
            ],
       ];

       foreach ($daftar_tag as $tag) {
           Tag::create($tag);
       }
        // Tag::factory(23)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
