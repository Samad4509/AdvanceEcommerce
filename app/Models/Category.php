<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $message2, $category,$image, $imageName, $directory, $imageUrl;
    
    public static function imageUpload($request){


        self::$image = $request->file('image');
        self::$imageName =  rand(1,999).'.'.self::$image->getClientOriginalName();
        self::$directory = 'uploads/category-image/';
        self::$image->move(self::$directory,self::$imageName);
        return self::$directory.self::$imageName;

    }

    public static function saveCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->image = self::imageUpload($request);
        self::$category->save();
    }
    public static function updateCategory($request,$id){
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        if($request->file('image')){
            if (file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
            self::$category->image = self::imageUpload($request);
        }
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function  deleteCategory($id){
        self::$category = Category::find($id);
        self::$category->delete();
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public static function categoryFeaturedStatus($id){
        self::$category =  Category::find($id);

        if (self::$category->status == 1)
        {
            self::$category->status = 0;
            self::$message2 = 'Product Status Inactive';
        }
        else {
            self::$category->status = 1;
            self::$message2 = 'Product Status Active';
        }
        self::$category->save();
        return self::$message2;
    }
}





