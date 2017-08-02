<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Cars',
            'Cook',
            'Love',
            'Medicine',
            'Poetry',
            'Politics',
            'Sports',
            'Technology',
            'Travel',
            'Other',
        ];

        foreach ($categories as $category) {
            App\Category::create([
                'name' => $category
            ]);
        }
    }
}
