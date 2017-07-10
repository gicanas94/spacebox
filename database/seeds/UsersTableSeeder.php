<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'username' => 'Gabriel',
            'email' => 'gicanas94@gmail.com',
            'privileges' => 4,
            'state' => 1
        ]);

        factory(User::class, 50)->create();
    }
}
