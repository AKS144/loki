<?php

namespace App\Http\Controllers;

use Exception;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller {

    public function __construct() 
    {
        $this->middleware( 'auth' );
    }

    public function index() 
    {
        $product = Product::orderBy('id', 'DESC')->get();
        return view('products.index',compact('product'));    
    }

    public function create() 
    {
        return view('products.create');        
    }

    public function store( Request $request ) 
    {
        // $products               =   new Product();
        // $products->name         =   $request->name;
        // $products->image        =   $request->image;
        // $products->description  =   $request->description;
        // $products->save();

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

            $products               =   new Product();
            $products->name         =   $request->name;
            $products->image        =   $request->image;
            $products->description  =   $request->description;   
            $products->category_id	=  $request->category_id;
            $products->sub_categories_id   = $request->sub_categories_id;   
            $products->save();
            //dd($category);
        
            if($products){ 
                return redirect('products')->with('success', 'New category created!');
            }else{
                return redirect('products')->with('error', 'Failed to create new category! Try again.');
            }

        }catch (Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function show( Product $product ) 
    {
        
    }

    public function edit( Product $product ) 
    {
        //
    }

    public function update( Request $request, $id ) 
    {
        $products               =   Product::find( $id );
        $products->name         =   $request->name;
        $products->image        =   $request->image;
        $products->description  =   $request->description;
        $products->save();
    }

    public function destroy( Product $product ) 
    {
        //
    }
}
