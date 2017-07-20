<?php

use Illuminate\Database\Seeder;

class BansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        $spaceboxes = App\Spacebox::all();

        foreach ($users as $user) {
            if ($user->banned === 1) {
                App\Ban::create([
                    'reason' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'user_id' => $user->id
                ]);
            }
        }

        foreach ($spaceboxes as $spacebox) {
            if ($spacebox->banned === 1) {
                App\Ban::create([
                    'reason' => 'Nam commodo ipsum leo, eu pharetra augue malesuada sed.',
                    'spacebox_id' => $spacebox->id
                ]);
            }
        }
    }
}
