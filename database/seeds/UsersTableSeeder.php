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
            'username' => 'Gabriel',
            'email' => 'gicanas94@gmail.com',
            'password' => bcrypt('123456'),
            's_question' => "funciona esto?",
            's_answer' => 'ya lo veremos...',
            'lang' => 'ES',
            'banned' => 0
        ]);

        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');
        $admin->attachRole($adminRole);

        factory(App\User::class, 200)->create();
    }
}
