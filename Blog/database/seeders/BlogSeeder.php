<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Blog::factory()->create([
            'blogger_id' => 1,
            'title' => 'About Life',
            'slug' => 'about-life',
            'description' => 'Life is a quality that distinguishes matter that has biological processes, such as signaling and self-sustaining processes, from that which does not, and is defined by the capacity for growth, reaction to stimuli, metabolism, energy transformation, and reproduction.',
            'image' => '1660152656_morgan-sessions-6255-unsplash.jpg',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\Blog::factory()->create([
            'blogger_id' => 1,
            'title' => 'About Death',
            'slug' => 'about-death',
            'description' => 'Death is the irreversible cessation of all biological functions that sustain an organism. It can also be defined as the irreversible cessation of functioning of the whole brain, including brainstem. Brain death is sometimes used as a legal definition of death.',
            'image' => 'death.jpg',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\Blog::factory()->create([
            'blogger_id' => 2,
            'title' => 'Why I made a deerskin medicine bag with Washington states Teacher of the Year',
            'slug' => 'medicine-bag',
            'description' => 'By helping students develop confidence in their identity, he aims to help them do better in school and in life after school, whether that means going to college or joining the workforce. He is also thinking about how to train the next generation of leaders in Native communities. For example, next year he will start teaching a Native Civics class for students who might want to get into tribal government.',
            'image' => '1659719201228.jfif',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\Blog::factory()->create([
            'blogger_id' => 2,
            'title' => 'Cheap, green hydrogen would be a massive breakthrough in clean energy',
            'slug' => 'green-hydrogen',
            'description' => 'When most people picture greenhouse gas emissions, they think about cars and electricity. That is because they turn keys, press buttons, and flip switches every day. The good news is, we already have ways to decarbonize these types of emissions (solar, wind, and nuclear power and lithium ion batteries). The bad news is, they add up to only about one third of the total.',
            'image' => '1658332443614.jfif',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
        \App\Models\Blog::factory()->create([
            'blogger_id' => 3,
            'title' => 'A new malaria vaccine begins testing in Malawi and more TED news',
            'slug' => 'ted-news',
            'description' => 'The TED community is brimming with new projects and updates. Below, a few highlights. Malaria vaccine begins wide-scale testing in Malawi. RTS,S — the only malaria vaccine to successfully pass clinical trials — will be made available to 360,000 children in Kenya, Malawi and Ghana in the first round of implementation testing.',
            'image' => '26506792427_c6fa955012_o.webp',
            'created_at' => '2022-08-14 19:00:00',
            'updated_at' => '2022-08-14 19:00:00'
        ]);
    }
}