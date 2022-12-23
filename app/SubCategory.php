<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category_id'       
    ];

    public function categories()
    {
    	return $this->belongsTo('App/Category');
    }
}
