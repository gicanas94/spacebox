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
        $admin = User::create([
            'username' => 'Gabriel',
            'email' => 'gicanas94@gmail.com',
            'password' => bcrypt('123456'),
            's_question' => "funciona esto?",
            's_answer' => 'ya lo veremos...',
            'site_lang' => 'ES',
            'active' => 1
        ]);

        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');
        $admin->attachRole($adminRole);

        factory(User::class, 500)->create();
    }
}
