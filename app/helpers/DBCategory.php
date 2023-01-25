<?php
namespace App\helpers;

use App\Category;

class DBCategory {

    public static function getCategory() {

        $data = Category::with('subcategories:id,parent_category,name')->select('id','name')->where('name', 'NOT LIKE', '%Tags%')->get();

        $categories = [];
        foreach ($data as $category) {
            $categories[$category->id] = $category->name;
        }

        return  $data;
    }

    public static function getTagsCategories() {

        $data = Category::with('subcategories:id,parent_category,name')->select('id','name')->where('name', 'LIKE', '%Tags%')->get();

        $categories = [];
        foreach ($data as $category) {
            $categories[$category->id] = $category->name;
        }

        return  $data;
    }
}
