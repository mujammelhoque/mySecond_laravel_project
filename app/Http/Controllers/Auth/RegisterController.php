<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\SupplierProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // if (isset($data['shopname'])) {
          
        //     SupplierProfile::create([
        //         'fname' => $data['fname'],
        //         'email' => $data['email'],
        //         'shopname' => $data['shopname'],
        //         'cat_group' => $data['cat_group'],
        //         'phone' => $data['phone'],
        //         'address' => $data['address'],
             
        //     ]);
        //     return User::create([
        //         'fname' => $data['fname'],
        //         'username' => $data['username'],
        //         'email' => $data['email'],
        //         'password' => Hash::make($data['password']),
        //     ]);

        // }else{
            // dd($data);
            // exit;
        return User::create([
            'fname' => $data['fname'],
            'username' => $data['username'],
            'access' => $data['access']??"0",
            'email' => $data['email'],
            'shopname' => $data['shopname']??"",
            'district_id' => $data['district_id']??"",
            'subdist_id' => $data['subdist_id']??"",
            'union_id' => $data['union_id']??"",
            'cat_group' => $data['cat_group']??"",
            'phone' => $data['phone'],
            'currentaddr' => $data['currentaddr'],
            'password' => Hash::make($data['password']),
            'is_admin' => $data['is_admin']??"0",
        ]);
    //}
       
   
    }
}
