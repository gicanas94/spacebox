<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = App\Post::all();

        foreach ($posts as $post) {
            factory(App\Comment::class, 2)->create([
                'user_id' => rand(1,500),
                'post_id' => $post->id
            ]);
        }
    }
}
