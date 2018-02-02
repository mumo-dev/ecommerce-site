<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
     public function index(Request $request){
        $products=[];
        if(!$request->category && !$request->search){
           $products = Product::with(['images','category'])->paginate(10);
        }else if($request->category){
            
            $category = Category::where('name',$request->category)->get();
           
            $products = Product::with(['images','category'])->where('category_id',$category->first()->id)->paginate(10);
        }else if($request->search){
            $products = Product::with(['images','category'])->where('name',$request->search)->paginate(10);
        }
        
        return response()->json($products);
     }
}
