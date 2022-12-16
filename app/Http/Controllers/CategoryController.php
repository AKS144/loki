<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller 
{

    public function __construct() 
    {
        $this->middleware( 'auth' );
    }


    public function index() 
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('category.index',compact('category'));        
    }

    public function create() 
    {
        return view('category.create');
    }


    public function store(Request $request ) 
    {
        // $category = new Category();
        // $category->name = $request->name;
        // $category->save();

        // create user 
        $validator = Validator::make($request->all(), [            
            'name'          =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',    

        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        try
        {           
            // $category = Category::create([
            //    'name'     => $request->name,                      
            // ]);

            $category               =   new Category();
            $category->name         =   $request->name;                 
            $category->save();
            //dd($category);

        
            if($category){ 
                return redirect('category')->with('success', 'New category created!');
            }else{
                return redirect('category')->with('error', 'Failed to create new category! Try again.');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }



    public function show(Category $category) 
    {
        //
    }



    public function edit(Category $category) 
    {
        return view('category.edit',compact('category'));

    }



    public function update(Request $request, $id) 
    {
        // $category = Category::find($id);
        // $category->name = $request->name;
        // $category->save();

        //update user info
        $validator = Validator::make($request->all(), [
                //'id'       => 'required',
                'name'       =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',    
         
        ]);
                        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
    
        try{                
            $category = Category::find($id);
    
            $update = $category->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
    
            return redirect()->route('category.index')->with('success', 'Category information updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
    
        }
    }



    public function destroy(Category $category) 
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Category has been deleted successfully');
    }
}
