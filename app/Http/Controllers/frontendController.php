<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_category;
USE DB;

class frontendController extends Controller
{
    //

    public function index()
    {
    //    $products = Product::where('category_id', 4)
    //                         ->get();
    //    $products2 = Product::where('category_id', 3)
    //                         ->get();
    //    $products3 = Product::where('category_id', 1)
    //                         ->get();
    //    $products4 = Product::where('category_id', 2)
    //                         ->get();
    //    return view('index', compact('products', 'products2', 'products3','products4') );
       return view('index' );
    }

 //   
}
