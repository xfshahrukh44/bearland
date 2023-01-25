<?php
namespace App\helpers;

use App\Category;
use App\Models\Subcategory;

class DBCategory {

    public static function getCategory() {

        $data = Category::with('subcategories:id,parent_category,name')
            ->select('id','name')
            ->where('name', 'NOT LIKE', '%Tags%')
            ->where('name', 'NOT LIKE', '%Bins%')
            ->get();

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

    public static function getBinCategories () {
        //create bin category if not present
        $main_bin_category = Category::firstOrCreate([
            'name' => 'Bins'
        ], [
            'slug' => 'bins',
        ]);

        //change subcategories parent category
        $bin_category_names= [
            'Plastic Stack & Hang Bin Boxes',
            'Giant Stackable Bin Boxes',
            'Mobile Giant Stackable Bin Boxes',
            'Stack & Hang Bin Dividers',
            'Plastic Shelf Bin Dividers',
            'Bin Cups',
            'Clear Plastic Shelf Bin Boxes',
            'Conductive Bin Boxes',
            'Bin Organizers',
            'Wire Shelves with Bins',
            'Tri-Dex? Bin Label Holders',
            'Warehouse Rack Bins',
            'Corrugated Bin Dividers',
            'White Bin Boxes - 9" Deep',
            'White Bin Boxes - 24" Deep',
            'White Bin Boxes - 12" Deep',
            'White Bin Boxes - 15" Deep',
            'White Bin Boxes - 18" Deep',
            'Kraft Bin Boxes - 9" Deep',
            'Kraft Bin Boxes - 18" Deep',
            'Kraft Bin Boxes - 12" Deep',
            'Kraft Bin Boxes - 24" Deep',
            'Jumbo Bin Boxes - 12" Deep',
            'Jumbo Bin Boxes - 24" Deep',
            'Jumbo Bin Boxes - 18" Deep',
            'Stackable Bin Boxes - 12" Deep',
            'Stackable Bin Boxes - 18" Deep',
            'Octagon Bulk Bins',
            'Large Bin Floor Display',
        ];
        $bin_sub_categories = Subcategory::query();
        foreach($bin_category_names as $bin_category_name){
            $bin_sub_categories->orWhere('name', $bin_category_name);
        }
        $bin_sub_categories = $bin_sub_categories->select('id','name')->distinct()->get();
        foreach ($bin_sub_categories as $bin_sub_category) {
            $bin_sub_category->parent_category = $main_bin_category->id;
            $bin_sub_category->save();
        }

        $data = Category::with('subcategories:id,parent_category,name')->select('id','name')->where('id', $main_bin_category->id)->get();

        $categories = [];
        foreach ($data as $category) {
            $categories[$category->id] = $category->name;
        }

        return  $data;
    }
}
