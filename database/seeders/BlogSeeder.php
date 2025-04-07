<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'First Post',
            'content' => 'This is the content of the first post.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Second Post',
            'content' => 'This is the content of the second post.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Third Post',
            'content' => 'This is the content of the third post.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Fourth Post',
            'content' => 'This is the content of the fourth post.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Fifth Post',
            'content' => 'This is the content of the fifth post.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Sixth Post',
            'content' => 'This is the content of the sixth post.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Seventh Post',
            'content' => 'This is the content of the seventh post.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => 'Eighth Post',
            'content' => 'This is the content of the eighth post.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
