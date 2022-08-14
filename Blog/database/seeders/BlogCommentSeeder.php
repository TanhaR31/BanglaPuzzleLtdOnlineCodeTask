<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogComment;

class BlogCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BlogComment::factory()->create([
            'blog_id' => 1,
            'blogger_id' => 2,
            'commnt' => 'Nice Thinking',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\BlogComment::factory()->create([
            'blog_id' => 2,
            'blogger_id' => 3,
            'commnt' => 'Scary',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\BlogComment::factory()->create([
            'blog_id' => 3,
            'blogger_id' => 1,
            'commnt' => 'Cool',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\BlogComment::factory()->create([
            'blog_id' => 3,
            'blogger_id' => 3,
            'commnt' => 'Initiative',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\BlogComment::factory()->create([
            'blog_id' => 5,
            'blogger_id' => 1,
            'commnt' => 'Amazing',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\BlogComment::factory()->create([
            'blog_id' => 5,
            'blogger_id' => 2,
            'commnt' => 'Impressive',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
    }
}