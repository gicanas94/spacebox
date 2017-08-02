<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\User::create([
            'username' => 'demo',
            'email' => 'gicanas94@gmail.com',
            'password' => bcrypt('123456'),
            'question' => "This is my secret question.",
            'answer' => 'And this... this is my answer :P',
            'lang' => 'en',
            'ban_id' => null
        ]);

        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');
        $admin->attachRole($adminRole);

        factory(App\User::class, 500)->create();
    }
}
