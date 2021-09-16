<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;
use App\Models\Sub_District;
use App\Models\Product;
use App\Models\Order;

class AgentController extends Controller
{
    public function agentform(){
        return view('admin.agent.parts.agentform');
    }

    public function agentdistrict(Request $request)
	{
     
		$subdistricts = DB::table("sub__districts")
		->where("district_id",$request->district)
		->pluck("name","id");
		return response()->json($subdistricts);
	
	}

    public function agentunions(Request $request){
        $unions = DB::table('sub__districts')
        ->where("id",$request->district)
        ->pluck("name","id");
        return response()->json($unions);
    
    }



    public function agentindex()
    {
        $orders = Order::paginate(15)->where('union_id',Auth::user()->union_id)->groupBy('username_id');
        return view('admin.agent.agentindex',compact('orders'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        // $products = Product::where('username_id', Auth::id())->latest()->paginate(5);
        // return view('admin.agent.agentindex',compact('products'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }




}
