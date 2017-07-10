<?php

use Illuminate\Database\Seeder;
use App\Spacebox;
use App\User;

class SpaceboxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            factory(Spacebox::class)->create([
                'name' => $user->username,
                'user_id' => $user->id
            ]);
        }
    }
}
