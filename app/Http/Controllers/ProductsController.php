<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Review;
use Auth;

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

     public function show($id){
         $product = Product::with(['images','category'])->find($id);
         
        return view('index',compact('product'));
     }

     public function getReviews($product_id){
         $reviews = Review::with(['user'])->where('product_id',$product_id)->latest()->get();

         return response()->json($reviews);

     }

     public function postReview(Request $request,$product_id){
         $review = new Review();
        
         $review->review = $request->review;
         $review->product_id = $product_id;
         $review->user_id = $request->user_id;
        //  dd($review);
         $review->save();
        
         $res = Review::with(['user'])->find($review->id);
         if($review){
            return response()->json(
                $res
            );
         }
    }
        
     
}
