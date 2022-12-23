<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
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
}
