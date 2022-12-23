<?php

namespace App\Http\Controllers;

use Exception;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller {

    public function __construct() 
    {
        $this->middleware( 'auth' );
    }

    public function index() 
    {
        $subcategory = SubCategory::orderBy('id', 'DESC')->get();
        return view('subcategory.index',compact('subcategory'));  
    }

    public function create() 
    {
        //$category = Category::where('name', 'asc')->get();
        $category = Category::all()->pluck('name', 'id'); //dd($category);
        return view('subcategory.create',compact('category'));        
    }

    public function store( Request $request ) 
    {
        // $category = new SubCategory();
        // $category->name = $request->name;
        // $category->save();

        $validator = Validator::make($request->all(), [            
            'name'   =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',    
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        try
        {           
            // $category = Category::create([
            //    'name'     => $request->name,                      
            // ]);

            $subcategory               =   new SubCategory();
            $subcategory->name         =   $request->name;
            $subcategory->category_id  =   $request->category_id;        
            $subcategory->save();
            //dd($subcategory);
        
            if($subcategory)
            { 
                return redirect('subcategory')->with('success', 'New category created!');
            }else{
                return redirect('subcategory')->with('error', 'Failed to create new category! Try again.');
            }

        }catch (Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
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
