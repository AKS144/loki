<?php

namespace App;

use App\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
 {
    use HasFactory;
    protected $fillable = [
        'name',        
    ];

    public function subcategories()
    {
    	return $this->hasMany(SubCategory::class);
    }
}
