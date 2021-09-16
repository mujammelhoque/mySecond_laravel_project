<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\slider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function logout(Request $request) {
    //     Auth::logout();
    //     return redirect('/home');
    //   }


    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

// public function supplierindex()
// {
//     return view('supplieradmin.supplierindex');
// }

// public function superAdmin()
// {
//     return view('superadmin');
// }

public function crIndex()
{
    $sliders = slider::latest()->paginate(2);
    $products = Product::latest()->paginate(5);

    return view('admin.products.index',compact('products','sliders'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}


// public function crIndex()
// {
//     $sliders = slider::latest()->paginate(2);
//     $products = Product::latest()->paginate(5);

//     return view('admin.products.index',compact('products','sliders'))
//         ->with('i', (request()->input('page', 1) - 1) * 5);
// }


}
