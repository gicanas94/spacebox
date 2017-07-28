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
            'question' => "Esta es mi pregunta secreta.",
            'answer' => 'Y esta mi respuesta :D',
            'lang' => 'ES',
            'ban_id' => null
        ]);

        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');
        $admin->attachRole($adminRole);

        factory(App\User::class, 300)->create();
    }
}
