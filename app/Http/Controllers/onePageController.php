<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class onePageController extends Controller
{
    //
     
    public function onepage($id){
        // $Products = Product::where('category_id', '>', 100)->take(10)->get();
        $products = Product::latest()->where('category_id', '=', $id)->paginate(10);
//   $Products = Product:where('category_id',$id)->get();
      return view('pages.onepage',compact('products'));

       //for one page simillar ProductController index method ; coped there
        

}

// public function search(Request $request){
//     $re = $request[0];
//     $data = Product::where('name','LIKE','%'.$re.'%')
//     ->orWhere('email','LIKE','%'.$re.'%')
//     ->get();
//     return view('pages.search',compact('data'));
// }

public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $posts = Product::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('title', 'LIKE', "%{$search}%")
        ->paginate(10);

    // Return the search view with the resluts compacted
    return view('pages.search', compact('posts'));
}

Public function comment(Request $request){
        
        $request->validate([
           'comment' => 'required',
            'username' => 'required',
            'proname' => 'required',
 
      ]);
  


   $info = $request['proname'];
    $inputhidden = $request['prdid'];
    Comment::create($request->all(), ['except' => ['prdid'] ]);
    $getcomment =Comment::latest()->where('proname', '=', $info)->paginate(5); 
 
      $getcomment = Comment::latest()->where('proname', '=', $info)->paginate(5);
    //same another query for comment has in ProductController
    $singlePro = Product::find($inputhidden);
    
   
    return view('pages.mainview', compact('singlePro','getcomment'));


}
    // close class
}
