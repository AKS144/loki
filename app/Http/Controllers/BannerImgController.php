<?php

namespace App\Http\Controllers;

use App\BannerImg;
use Illuminate\Http\Request;

class BannerImgController extends Controller {

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
        $category = new BannerImg();
        $category->name = $request->name;
        $category->save();
    }

    public function show( BannerImg $bannerImg ) 
    {
        //
    }

    public function edit( BannerImg $bannerImg ) 
    {
        //
    }

    public function update( Request $request, $id ) 
    {
        $category = BannerImg::find( $id );
        $category->name = $request->name;
        $category->save();
    }

    public function destroy( BannerImg $bannerImg ) 
    {
        //
    }
}
