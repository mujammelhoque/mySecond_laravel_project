<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SupplierProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function supplierindex()
    {
        $products = Product::where('username_id', Auth::id())->latest()->paginate(5);
        return view('supplieradmin.supplierindex',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 

    public function supplierorders(){
        $orders = Order::paginate(15)->where('prowoner_id',auth::id())->groupBy('username_id');
        return view('supplieradmin.parts.supplierorders',compact('orders'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function supplierupload(){
        $categories = Category::where('name',Auth::user()->cat_group)->get();
        return view('supplieradmin.parts.supplierupload',compact('categories'));
    }

    public function supplierrequest(){
        $request = User::where('access',2)->get();
        return view('admin.products.supplierrequest', compact('request'));
    }


    public function repending($id){
        $updateD =['is_admin' => '0'];
        User::whereId($id)->update($updateD);
        return back();
    }
    public function approving($id){
        $updateD =['is_admin' => '2'];
        User::whereId($id)->update($updateD);
        return back();
    }
   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierProduct  $supplierProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierProduct $supplierProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierProduct  $supplierProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierProduct $supplierProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierProduct  $supplierProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierProduct $supplierProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierProduct  $supplierProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierProduct $supplierProduct)
    {
        //
    }
}
