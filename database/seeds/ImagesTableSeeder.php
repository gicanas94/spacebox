<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\User;

class ImagesTableSeeder extends Seeder
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
            factory(Image::class)->create([
                'name' => $user->username,
                'user_id' => $user->id
            ]);
        }
    }
}
