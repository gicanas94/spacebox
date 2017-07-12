<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Spacebox;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spaceboxes = Spacebox::all();

        foreach ($spaceboxes as $spacebox) {
            factory(Post::class, 10)->create([
                'spacebox_id' => $spacebox->id
            ]);
        }
    }
}
