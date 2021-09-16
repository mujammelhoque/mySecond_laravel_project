<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\slider;
use App\Models\Category;
use App\Models\Sub_Category;
USE DB;



class ProductController extends Controller
{
    // public function store(Request $request)
    // {
        
    //     $request->validate([
    //         'name' => 'required',
    //         'title' => 'required',
    //         'category_id' => 'required',
    //         'subcategory_id' => 'required',
    //         'price' => 'required',
    //         // 'oldprice' => 'nullable',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
  
    //     $input = $request->all();
  
    //     if ($image = $request->file('image')) {
    //         $destinationPath = 'image/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['image'] = "$profileImage";
    //     }
    
    //     Product::create($input);
    //     return redirect()->to('/');
    // }



    public function cart()
    {
        return view('pages.cartview');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function getState(Request $request)
	{
		$subcategories = DB::table("sub__categories")
		->where("category_id",$request->cat_id)
		->pluck("name","id");
		return response()->json($subcategories);
	}


    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formindex()
    {
        $categories = Category::all();
        //  $subcategories =Sub_Category::all();
      
         return view('admin.products.upload', compact('categories'));
    }


    public function index()
    {
        // $sliders = slider::all();
       $sliders             = slider::orderBy('id', 'DESC')->get();
       $categories          = Category::all();
       $flashsale           = Product::where('attr', 1)
                                   ->where('status', '=', 1)
                                   ->orderBy('id', 'DESC')
                                   ->limit(10)
                                   ->get();

       $topproducts            = Product::query()
                                   ->join('orders', 'orders.product_id', '=', 'products.id')
                                   ->selectRaw('products.*, SUM(orders.quantity) AS quantity_sold')
                                   ->groupBy(['products.id']) // should group by primary key
                                   ->orderByDesc('quantity_sold')
                                   ->take(2) // 20 best-selling products
                                   ->get();
                           




    //    $topproducts         = Product::where('attr', 2)
    //                                ->where('status', '=', 1)
    //                                ->orderBy('id', 'DESC')
    //                                ->limit(8)
    //                                ->get();
       $weeklyoffers        = Product::where('attr', 3)
                                   ->where('status', '=', 1)
                                   ->orderBy('id', 'DESC')
                                   ->limit(6)
                                   ->get();
       $recents             = Product::orderBy('id', 'DESC')
                                   ->limit(8)
                                   ->get();
       $featured            = Product::where('attr', 4)
                                   ->where('status', '=', 1)
                                   ->orderBy('id', 'DESC')
                                   ->limit(8)
                                   ->get();                          
       $upcomming            = Product::where('attr', '=', 5)
                                   ->where('status', '=', 1)
                                   ->orderBy('id', 'DESC')
                                   ->limit(10)
                                   ->get();                          
    //    $products2       = Product::where('cat_id', 3)
    //                                ->get();
    //    $products3       = Product::where('cat_id', 1)
    //                                ->get();
    //    $products4       = Product::where('cat_id', 2)
    //                                ->get();
    //    $products8       = Product::where('cat_id', 8)
    //                                ->orderBy('id', 'DESC')
    //                                ->paginate(8);
 
       return view('index', compact('sliders','categories','flashsale','topproducts','weeklyoffers', 
       'recents', 'featured','upcomming') );
    }

    public function showall(){
        return view('pages.products');
    }
    public function catshow($id){
        $subcats =          Sub_Category::where('category_id', $id)
                            ->get();
        $sliders =          slider::orderBy('id', 'DESC')
                            ->get();
        $catproducts=          Product::where('cat_id', $id)
                            ->where('status', '=', 1)
                            ->orderBy('id', 'DESC')
                            ->paginate(10);               
        return view('pages.catshow', compact('sliders','subcats','catproducts'));
    }
    public function subcatshow($id){
        // $subcats =          Sub_Category::where('category_id', $id)
        //                     ->get();
        $sliders =           slider::orderBy('id', 'DESC')
                             ->get();
        $subcatproducts=        Product::where('subcat_id', $id)
                            ->where('status', 1)
                            ->orderBy('id', 'DESC')
                            ->paginate(10);               
        return view('pages.subcatshow', compact('sliders','subcatproducts'));
    }

    public function product_view($id)
    {
    //    $products = Product::all();
    // $getcomment =Comment::latest()->paginate(6); 
    $productview = Product::find($id);
    // $info = $singlePro->name;
    // $getcomment = Comment::latest()->where('proname', '=', $info)->paginate(5);
    //same another query for comment has in onePageController
    //    return view('pages.mainview', compact('singlePro','getcomment'));
    return view('pages.productview', compact('productview'));
    }


    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->image,
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
    




    }

