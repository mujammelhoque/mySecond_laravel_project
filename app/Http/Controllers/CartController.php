<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
    //  */
    // public function index()
    // {
    //     $products = Product::all();
    //     return view('products', compact('products'));
    // }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
      
        return view('pages.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $product->quantity,
                "price" => $product->price,
                "sku" => $product->sku,
                "fimage" => $product->fimage,
                "username_id" => $product->username_id,
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        // dd($request);
        // $qty= App\Models\Product::find($id)->quantity;
        // if ($details['quantity']<=$qty)
        //    $details['quantity']=$qty;

        if($request->id && $request->quantity){
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

         

            session()->put('cart', $cart);

            // $m=$cart[$request->id];
            //  $qty= Product::find($m)->quantity;
            // if ( $cart[$request->id]["quantity"]<=$qty){
            //     $cart[$request->id]["quantity"]=$qty;
            //     session()->put('cart', $cart);
            // }
         

            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
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
}
