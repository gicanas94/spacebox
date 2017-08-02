<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spaceboxes = App\Spacebox::all();

        foreach ($spaceboxes as $spacebox) {
            factory(App\Post::class, 5)->create([
                'spacebox_id' => $spacebox->id
            ]);
        }
    }
}
