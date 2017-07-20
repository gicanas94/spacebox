<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        foreach ($users as $user) {
            factory(App\Image::class)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
