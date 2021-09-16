<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\District;
use App\Models\Product;
use App\Models\Sub_District;
use Illuminate\Support\Facades\Auth;

use DB;
use Illuminate\Http\Request;


use App\Library\SslCommerz\SslCommerzNotification;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;

class SslCommerzPaymentController extends Controller
{

    // public function exampleEasyCheckout()
    // {
     
    //     return view('exampleEasycheckout');

    // }

    public function exampleHostedCheckout()
    {   
        $districts = District::all();
        return view('exampleHosted',compact('districts'));
    }

    // public function getdist(Request $request){
    //     // $subdist = Sub_District::find($id);
    //     dd("yes");
    //     $sub_district = DB::table("sub__districts")
	// 	->where("district_id",$request->district)
	// 	->pluck("name","id");
	// 	return response()->json($sub_district);


    // }
    public function getlocation(Request $request)
	{
     


		$subdistricts = DB::table("sub__districts")
		->where("district_id",$request->district)
		->pluck("name","id");
		return response()->json($subdistricts);
	
	}

public function servicecost(Request $request){
    $grosstotal = DB::table('districts')
    ->where("id",$request->district)
    ->pluck("service_cost","id");
    return response()->json($grosstotal);

}
public function unions(Request $request){
    $unions = DB::table('sub__districts')
    ->where("id",$request->district)
    ->pluck("name","id");
    return response()->json($unions);

}




    public function index(Request $request)
    {
        $request->validate([
           
        
           
           
            'addressC' => 'required',
         
            
        ]);

        $sessionCart=Session::get('cart');
        // $pname="";
        // $qnty="";
        // $price="";
        // $sku="";
        $uid = Auth::user()->id;
        $name = Auth::user()->fname;
        $email = Auth::user()->email;
        $phone = Auth::user()->phone;
        $addressU = Auth::user()->currentaddr;
     
        foreach($sessionCart as $key=>$value){

        
                        
            $qty= Product::find($key)->quantity;
            // $details['quantity']=3
                 if ($value['quantity']<=$qty){
                    $value['quantity']=$qty; 
                 }
                    
                //  dd($key);
            // $pname.=$value['name'].",";
            // $qnty.=$value['quantity'].",";
            // $price.=$value['price'].",";
            // $sku.=$value['sku'].",";
          
            // $qnty=$value['quantity'];
            // $price=$value['price'];
            Order::create([
                'prowoner_id'       =>$value['username_id'],
                //username_id in product table that is prowoner_id
                'username_id'       =>$uid??"no found userid",
                'name'              => $name??" No found usename",
                'email'             =>$email??"No found email",
                'phone'             =>$phone,
                'price'             =>$value['price'],
                'product_id'        =>$key,
                'district_id'       =>$request->district_id,
                'subdistrict_id'    =>$request->subdistrict_id,
                'union_id'          =>$request->union_id,
                'addressC'          =>$request->addressC??"No found current address",
                'addressU'          =>$addressU??"No found address user",
                'transaction_id'    =>$request->transaction_id??"no tid",
                'payment'           =>$request->payment,
                'product_name'      =>$value['name'],
                'quantity'          =>$value['quantity'],
                'sku'               =>$value['sku'],
                'total'             =>$request->total,
               
               
            ]);

        }   


      
//         $result = array_combine($sessionCart);
// dd($price);
            // $order->uid=$uid;
            // $order->pid=$pid;
            // $order->quantity=$qnty;
           
            // $order->save();
            // if (isset($request->email)) {
            //     $email=$request->email;
            // }else{
            //     $email=null;
            // }
            // if (isset($request->transaction_id)) {
            //     $transaction_id=$request->transaction_id;
            // }else{
            //     $email=null;
            // }

        // Order::create([
        //     'username_id'       =>$uid??"no found userid",
        //     'name'              => $name??" No found usename",
        //     'email'             =>$email??"No found email",
        //     'phone'             =>$phone,
        //     'price'             =>$price,
        //     'district_id'       =>$request->district_id,
        //     'subdistrict_id'    =>$request->subdistrict_id,
        //     'union_id'          =>$request->union_id,
        //     'addressC'          =>$request->addressC??"No found current address",
        //     'addressU'          =>$addressU??"No found address user",
        //     'transaction_id'    =>$request->transaction_id??"no tid",
        //     'payment'           =>$request->payment,
        //     'product_name'      =>$pname,
        //     'quantity'          =>$qnty,
        //     'sku'               =>$sku,
        //     'total'             =>$request->total,
           
           
        // ]);
        session::forget('cart');
        return redirect()->back()->with('success', 'Your order has successfully completed!');
     
     
    
   

        // $input = $request->all();
        // Order::create($input);

        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        // $post_data = array();
        // $post_data['total_amount'] = '10'; # You cant not pay less than 10
        // $post_data['currency'] = "BDT";
        // $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        // $post_data['cus_name'] = 'Customer Name';
        // $post_data['cus_email'] = 'customer@mail.com';
        // $post_data['cus_add1'] = 'Customer Address';
        // $post_data['cus_add2'] = "";
        // $post_data['cus_city'] = "";
        // $post_data['cus_state'] = "";
        // $post_data['cus_postcode'] = "";
        // $post_data['cus_country'] = "Bangladesh";
        // $post_data['cus_phone'] = '8801XXXXXXXXX';
        // $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        // $post_data['ship_name'] = "Store Test";
        // $post_data['ship_add1'] = "Dhaka";
        // $post_data['ship_add2'] = "Dhaka";
        // $post_data['ship_city'] = "Dhaka";
        // $post_data['ship_state'] = "Dhaka";
        // $post_data['ship_postcode'] = "1000";
        // $post_data['ship_phone'] = "";
        // $post_data['ship_country'] = "Bangladesh";

        // $post_data['shipping_method'] = "NO";
        // $post_data['product_name'] = "Computer";
        // $post_data['product_category'] = "Goods";
        // $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b'] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $post_data['total_amount'],
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);

        // $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        // $payment_options = $sslc->makePayment($post_data, 'hosted');

        // if (!is_array($payment_options)) {
        //     print_r($payment_options);
        //     $payment_options = array();
        // }

    }
    public function regifirststep(){
        return view('auth.regifirststep.regifirststep');
    }
    public function customerform(){
        return view('auth.customerform');
    }

    // public function payViaAjax(Request $request)
    // {

    //     # Here you have to receive all the order data to initate the payment.
    //     # Lets your oder trnsaction informations are saving in a table called "orders"
    //     # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

    //     $post_data = array();
    //     $post_data['total_amount'] = '10'; # You cant not pay less than 10
    //     $post_data['currency'] = "BDT";
    //     $post_data['tran_id'] = uniqid(); // tran_id must be unique

    //     # CUSTOMER INFORMATION
    //     $post_data['cus_name'] = 'Customer Name';
    //     $post_data['cus_email'] = 'customer@mail.com';
    //     $post_data['cus_add1'] = 'Customer Address';
    //     $post_data['cus_add2'] = "";
    //     $post_data['cus_city'] = "";
    //     $post_data['cus_state'] = "";
    //     $post_data['cus_postcode'] = "";
    //     $post_data['cus_country'] = "Bangladesh";
    //     $post_data['cus_phone'] = '8801XXXXXXXXX';
    //     $post_data['cus_fax'] = "";

    //     # SHIPMENT INFORMATION
    //     $post_data['ship_name'] = "Store Test";
    //     $post_data['ship_add1'] = "Dhaka";
    //     $post_data['ship_add2'] = "Dhaka";
    //     $post_data['ship_city'] = "Dhaka";
    //     $post_data['ship_state'] = "Dhaka";
    //     $post_data['ship_postcode'] = "1000";
    //     $post_data['ship_phone'] = "";
    //     $post_data['ship_country'] = "Bangladesh";

    //     $post_data['shipping_method'] = "NO";
    //     $post_data['product_name'] = "Computer";
    //     $post_data['product_category'] = "Goods";
    //     $post_data['product_profile'] = "physical-goods";

    //     # OPTIONAL PARAMETERS
    //     $post_data['value_a'] = "ref001";
    //     $post_data['value_b'] = "ref002";
    //     $post_data['value_c'] = "ref003";
    //     $post_data['value_d'] = "ref004";


    //     #Before  going to initiate the payment order status need to update as Pending.
    //     $update_product = DB::table('orders')
    //         ->where('transaction_id', $post_data['tran_id'])
    //         ->updateOrInsert([
    //             'name' => $post_data['cus_name'],
    //             'email' => $post_data['cus_email'],
    //             'phone' => $post_data['cus_phone'],
    //             'amount' => $post_data['total_amount'],
    //             'status' => 'Pending',
    //             'address' => $post_data['cus_add1'],
    //             'transaction_id' => $post_data['tran_id'],
    //             'currency' => $post_data['currency']
    //         ]);

    //     $sslc = new SslCommerzNotification();
    //     # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    //     $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

    //     if (!is_array($payment_options)) {
    //         print_r($payment_options);
    //         $payment_options = array();
    //     }

    // }

    // public function success(Request $request)
    // {
    //     echo "Transaction is Successful";

    //     $tran_id = $request->input('tran_id');
    //     $amount = $request->input('amount');
    //     $currency = $request->input('currency');

    //     $sslc = new SslCommerzNotification();

    //     #Check order status in order tabel against the transaction id or order id.
    //     $order_detials = DB::table('orders')
    //         ->where('transaction_id', $tran_id)
    //         ->select('transaction_id', 'status', 'currency', 'amount')->first();

    //     if ($order_detials->status == 'Pending') {
    //         $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

    //         if ($validation == TRUE) {
    //             /*
    //             That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
    //             in order table as Processing or Complete.
    //             Here you can also sent sms or email for successfull transaction to customer
    //             */
    //             $update_product = DB::table('orders')
    //                 ->where('transaction_id', $tran_id)
    //                 ->update(['status' => 'Processing']);

    //             echo "<br >Transaction is successfully Completed";
    //         } else {
    //             /*
    //             That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
    //             Here you need to update order status as Failed in order table.
    //             */
    //             $update_product = DB::table('orders')
    //                 ->where('transaction_id', $tran_id)
    //                 ->update(['status' => 'Failed']);
    //             echo "validation Fail";
    //         }
    //     } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
    //         /*
    //          That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
    //          */
    //         echo "Transaction is successfully Completed";
    //     } else {
    //         #That means something wrong happened. You can redirect customer to your product page.
    //         echo "Invalid Transaction";
    //     }


    // }


}
