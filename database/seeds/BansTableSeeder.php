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
            if ($user->id % 2 != 0 && $user->username != 'demo') {
                $ban = App\Ban::create([
                    'reason' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'user_id' => $user->id
                ]);

                App\User::find($user->id)->update(['ban_id' => $ban->id]);
            }
        }

        foreach ($spaceboxes as $spacebox) {
            if ($spacebox->id % 3 === 0) {
                $ban = App\Ban::create([
                    'reason' => 'Nam commodo ipsum leo, eu pharetra augue malesuada sed.',
                    'spacebox_id' => $spacebox->id
                ]);

                App\Spacebox::find($spacebox->id)->update(['ban_id' => $ban->id]);
            }
        }
    }
}
