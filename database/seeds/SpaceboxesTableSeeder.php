<?php

use Illuminate\Database\Seeder;

class SpaceboxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        $colors = App\Spacebox::colors();

        foreach ($users as $user) {
            if ($user->username != 'demo') {
                factory(App\Spacebox::class)->create([
                    'name' => $user->username,
                    'slug' => str_slug($user->username, '-'),
                    'category_id' => rand(1,10),
                    'color' => $colors[array_rand($colors)],
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
