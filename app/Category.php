<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function spacebox()
    {
        return $this->hasMany('App\Spacebox');
    }

    public static function getCategories()
    {
        $categories = [];
        foreach (Category::all() as $category) {
            $categories[] = ['id' => $category->id, 'name' => trans('messages.category-' . $category->id)];
        }

        return $categories;
    }
}
