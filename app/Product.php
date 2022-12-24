<?php

namespace App;

use App\Category;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category_id'       
    ];

    public function categories()
    {
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategories()
    {
    	return $this->belongsTo(SubCategory::class,'sub_categories_id','id');
    }
}
