<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        Post::create([
            'term' => 'Tweaking',
            'description' => 'Feeling like you are tripping',
            'usage' => 'After a prine espresso I feel like I am tweaking.',
        ]);

        Post::create([
            'term' => 'Looksmaxxing',
            'description' => 'imrove physical appearance',
            'usage' => 'I get no girls. I need to start Looksmaxxing.'
        ]);

        Post::create([
            'term' => 'Aura',
            'description' => 'A person\'s charisma and energy, felt by others in range.',
            'usage' => 'After getting my hair cut, my aura got stronger.'
        ]);
        
        Post::create([
            'term' => 'Gyatt',
            'description' => 'Expression of excitement after seeing the large behind of another person. Also a synonym for butt',
            'usage' => 'Hey George. Nice GYATT'
        ]);
        
    }
}
