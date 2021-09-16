@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row  d-flex p-5 justify-content-between">
        
      <div col-sm-12 col-md-4>
        <div style="height:200px;   border: 5px solid rgb(69, 11, 230); border-radius: 50px;  " class="w-25 mb-2  bg-warning text-center">
            <a href="{{ url('customer') }}" class="btn btn-danger p-4 m-4" style=" border-radius: 20px;" ><h3>Customer Sing Up</h3> </a>
        </div>
    </div>

    <div col-sm-12 col-md-4>
        <div style="height:200px;   border: 5px solid rgb(118, 74, 238); border-radius: 50px;  " class="w-25  bg-primary text-center  mb-2 ">
            <a href="{{ route('register') }} " class="btn btn-dark p-4 m-4" style=" border-radius: 20px;" ><h3>Supplier Sing Up</h3> </a>
        </div>
        </div>

        {{-- <div col-sm-12 col-md-4>
        <div style="height:200px;   border: 5px solid hsl(145, 100%, 51%); border-radius: 50px;  " class="w-25  bg-danger text-center">
            <a href="" class="btn btn-primary p-4 m-4" style=" border-radius: 20px;" ><h3>Customer Account Create</h3> </a>
        </div>
        </div> --}}
      </div>
        {{-- <div><a href="" class="btn btn-success">Agent Account Create</a></div> --}}
     
     
       
</div>

<style>
    ll{
        margin-top: 
        ;
        border
    }
</style>

@endsection