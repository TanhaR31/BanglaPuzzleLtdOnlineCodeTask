<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blogger;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Blogger::factory()->create([
            'b_name' => 'Tanha Reja',
            'b_phone' => 1720404781,
            'b_email' => 'tanhareja31@gmail.com',
            'b_password' => '133631788e68ce51eb65eac86bc93753',
            'b_address' => 'Bashundhara, Dhaka',
            'b_image' => 'Tanha.jpg',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\Blogger::factory()->create([
            'b_name' => 'Bill Gates',
            'b_phone' => 1720404782,
            'b_email' => 'billgates@gmail.com',
            'b_password' => '133631788e68ce51eb65eac86bc93753',
            'b_address' => 'America',
            'b_image' => 'bill gates.jfif',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\Blogger::factory()->create([
            'b_name' => 'Elon Musk',
            'b_phone' => 1720404783,
            'b_email' => 'elonmusk@gmail.com',
            'b_password' => '133631788e68ce51eb65eac86bc93753',
            'b_address' => 'America',
            'b_image' => 'elon musk.jfif',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
    }
}