<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Order;
use App\Models\slider;
use App\Models\Category;
use App\Models\Sub_Category;
USE DB;
use Image; //Intervention Image
// use Illuminate\Support\Facades\Storage; //Laravel Filesystem

class AdminCrud extends Controller
{
    //
    // public function crIndex()
    // {
    //     $sliders = slider::latest()->paginate(2);
    //     $products = Product::latest()->paginate(5);
    
    //     return view('admin.products.index',compact('products','sliders'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    
   
//    ---------------------
public function crOrder(){

    
    $orders = Order::paginate(20)->where('prowoner_id',auth::id())->groupBy('username_id');

    return view('admin.products.orders',compact('orders'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
}
//    ---------------------
public function crCreate()
{
    $categories = Category::all();
    return view('admin.products.upload',compact('categories'));
}
// -------------------------

public function crStore(Request $request)
{
    $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'quantity' => 'required',
    //     'title' => 'required',
            'cat_id' => 'required',
            'price' => 'required',
    //     // 'oldprice' => 'nullable',
      'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);

    //  $data= $request->all();

    // Feature image .start
    if ( $request->hasfile('fimage')) {
        $ffimg = $request->file('fimage');
        $featureimg = date('YmdHis').mt_rand(1000, 9999).".".$ffimg->extension();
        // $image->move(public_path().'/images/', $featureimg);
        //
        $filePath = public_path('/featuredimg');
        
        $img = Image::make($ffimg->path());

        $img->resize(300, 300, function ($const) {
          $const->aspectRatio();
      })->save($filePath.'/'.$featureimg);
      
      $filePath = public_path('/orginalimages');
      
      $ffimg->move($filePath, $featureimg);
        //
    }
    
    if($request->hasfile('image'))
    {
        $image = $request->file('image');
       foreach($image as $file)
       {
     
          $name = time(). mt_rand(100000, 999999).'.'.$file->extension();
        //   $imm =  $file->move(public_path().'/image/', $name);
        $filePath = public_path('/images');
        
          $img = Image::make($file->path());

          $img->resize(500, 500, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$name);

        $filePath = public_path('/orginalimages');
      
        $file->move($filePath, $name);
        //   $img->save($imm);
          $data[] = $name;  
       }
    }
            $image=json_encode($data);

     Product::create([
         'name'          =>$request->name,
         'desc'          =>$request->desc,
         'sku'           =>$request->sku,
         'title'         =>$request->title,
         'fimage'         =>$featureimg,
         'image'         =>$image,
         'attr'          =>$request->attr,
         'cat_id'        =>$request->cat_id,
         'subcat_id'     =>$request->subcat_id,
         'price'         =>$request->price,
         'oldprice'      =>$request->oldprice,
         'quantity'      =>$request->quantity,
         'qtytext'      =>$request->qtytext,
         'username_id'      =>\Auth::id(),
         'sku'      =>$request->sku,
         'alert'        =>$request->alert,
         'status'        =>$request->status,
         'discount'      =>$request->discount,
        
     ]);
 
    return back()
   ->with('success','Product created successfully.');
}
// --------------------------
public function crShow(Product $product)
{
    return view('admin.products.show',compact('product'));
}

// --------------------------
// public function crEdit(Product $product)
//     {
//         return view('admin.products.edit',compact('product'));
//     }
    // ---------------------------

    // public function crUpdate(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required'
    //     ]);
  
    //     $input = $request->all();
  
    //     if ($image = $request->file('image')) {
    //         $destinationPath = 'image/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['image'] = "$profileImage";
    //     }else{
    //         unset($input['image']);
    //     }
          
    //     $product->update($input);
    
    //     return redirect()->route('admin.products.index')
    //                     ->with('success','Product updated successfully');
    // }
    //------------------------
    public function crDestroy($id)
    {
        $user = Product::findOrFail($id);
        
        $image = '/image/'.$user->image;
        $path = str_replace('\\','/',public_path());

        if (file_exists($path.$image)) {
           unlink($path.$image);
           $user->delete();
           return back();
        }
        else{
            $user->delete();
            return back();
        }
        
        }
     

        
    //  admin slider   ---------------**--------------------
    //  admin slider   ---------------**--------------
    //  admin slider   ---------------**-------
     
    public function sliderform()
    {
        return view('admin.products.sliderform');
    }




    public function sliderstore(Request $request)
    {
        
        // $request->validate([
        //     'title1' => 'required',
        //     // 'oldprice' => 'nullable',
        //     'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image1')) {
            $destinationPath = 'banner/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image1'] = "$profileImage";
        }
        if ($image = $request->file('image2')) {
            $destinationPath = 'banner/';
            $profileImage = date('YmdHi') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image2'] = "$profileImage";
        }
        if ($image = $request->file('image3')) {
            $destinationPath = 'banner/';
            $profileImage = date('Ymdis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image3'] = "$profileImage";
        }
    
        slider::create($input);
        return back()
        ->with('success',' Slider Created successfully');
    }

    // public function sliderindex()
    // {
    //     $sliders = slider::all();
    //     return view('admin.products.index', compact('sliders') )
    //     ->with('i', (request()->input('page', 1) - 1) * 5);;
    // }

    public function sliderdelete($id)
    {
        $sdelete = slider::findOrFail($id);
        
        $image = '/image/'.$sdelete->image1;
        $image2 = '/image/'.$sdelete->image2;
        $image3 = '/image/'.$sdelete->image3;
        $path = str_replace('\\','/',public_path());

        if (file_exists($path.$image)) {
           unlink($path.$image);
           $sdelete->delete();
           
        }
        if (file_exists($path.$image2)) {
           unlink($path.$image2);
           $sdelete->delete();
           
        }
        if (file_exists($path.$image3)) {
           unlink($path.$image3);
           $sdelete->delete();
           
        }
        else{
            $sdelete->delete();
            return back();
        }
           
    }


    public function crComment(){

        $comments= Comment::latest()->paginate(10);
        return view('admin.products.comment',compact('comments'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function comdel($id){

        $cdel = Comment::findOrFail($id);
        $cdel->delete();
        return back();

    }
    public function orderdel($id){

        $cdel = Order::findOrFail($id);
        $cdel->delete();
        return back();

    }

    public function categoryform(){
        $categories = Category::all();
        return view('admin.category.categoryform', compact('categories'));
    }
   
    public function categoryview(){
        $categories = Category::all();
        $subcategories = Sub_Category::all();
        return view('admin.category.categoryview', compact('categories','subcategories'));
    }
   

    public function crCatStore(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //          'title' => 'nullable',
       
    //  ]);
       
        
  
        Category::create($request->all());
        return back()
        ->with('success','Category Created successfully');
    

    }

  
    public function subcategorystore(Request $request){
        // return view('admin.category');
        //  dd($request->all());
  
         Sub_Category::create($request->all());
        return back()
        ->with('success',' Sub Category Created successfully');
        // echo "i am succsess";

    }

    
    Public function editcategory($id){
    
        $edit = Category::find($id);
        return view('admin.category.editcategory', compact('edit'));
    }
    
    // Public function catupdate($id){
    
    //     return view('admin.category.editcategory', compact('edit'));
    // }



    public function catupdate(Request $request, $id)
    {
        // dd('yes');
        $updateData = $request->validate([
            'name' => 'required',
            'title' => 'required',
            
        ]);
        Category::whereId($id)->update($updateData);
        return back()->with('success', 'Category has been updated');
    }

    public function subcatupdate(Request $request, $id)
    {
        // dd('yes');
        $updateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            
        ]);
        Sub_Category::whereId($id)->update($updateData);
        return back()->with('success', 'Student has been updated');
    }



    Public function editsubcategory($id){
        $catall = Category::all();
        $subedit = Sub_Category::find($id);
        return view('admin.category.editcategory',compact('subedit','catall'));
    }

    public function categorydelete($id){
       $del= Category::findOrFail($id);
       $del->delete();
       return back()
       ->with('catdel','Category deleted successfully');


    }
    public function subcatdelete($id){
       $del= Sub_Category::findOrFail($id);
       $del->delete();
       return back()
       ->with('catdel','Sub Category deleted successfully');


    }



}


