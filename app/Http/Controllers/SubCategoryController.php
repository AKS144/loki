<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller {

    public function __construct() 
    {
        $this->middleware( 'auth' );
    }

    public function index() 
    {
        //
    }

    public function create() 
    {
        //
    }

    public function store( Request $request ) 
    {
        $category = new SubCategory();
        $category->name = $request->name;
        $category->save();
    }

    public function show( SubCategory $subCategory ) 
    {
        //
    }

    public function edit( SubCategory $subCategory ) 
    {
        //
    }

    public function update( Request $request, $id ) 
    {
        $category = SubCategory::find( $id );
        $category->name = $request->name;
        $category->save();
    }

    public function destroy( SubCategory $subCategory ) 
    {
        //
    }
}
