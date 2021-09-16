<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Pyment-form</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        #hidden-panel {
	display: none;
}

/* body {
	font-family: 'Montserrat', sans-serif;
} */

/* div {
	padding: 5px;
	margin: 5px;
} */
/* 
input,
select,
option {
	padding: 5px;
} */

/* select {
	width: 100px;
} */
        
    </style>
</head>
<body class="bg-light">
<div class="container">

    <div class="py-5 text-center">
   

<div><a class="btn btn-primary" href="{{url("/")}}">Home</a></div>
        <h2>Address</h2>

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
        @elseif(session('failed'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('failed') }}
        </div>
        @endif
       
       
    </div>

    <div class="row">
        {{-- .cart --}}
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ count((array) session('cart')) }}</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product Name</h6>
                        {{-- <small class="text-muted">Brief description</small> --}}
                    </div>
                    <span class="text-muted"> Quantity</span><span>Price</span>
                </li>
               
                 
                 @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                <?php 
                        
                $qty= App\Models\Product::find($id)->quantity;
                // $details['quantity']=3
                     if ($details['quantity']<=$qty)
                        $details['quantity']=$qty;     
                    ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><a href="#">{{ $details['name'] }}</a></h6>
                        {{-- <small class="text-muted">Brief description</small> --}}
                    </div>
                    <span class="text-muted">{{ $details['quantity'] }}x</span><span>{{ $details['price'] }}tk</span>
                </li>
               
                @endforeach
                @endif
                <?php $total = 0 ?>
                @foreach((array) session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                 @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    
                    <h5>Total (BDT)</h5>
                    <small>{{ count((array) session('cart')) }} Item(s) selected</small> 
                    <strong>{{ $total }}TK</strong>
                </li>
                {{-- <li class="list-group-item d-flex justify-content-between">
                    
                    <h5>Bikash/Roket/Nogad</h5>
                   
                    <strong>01645-254877</strong>
                </li> --}}
               
            </ul>
            {{-- @php
                $dd = session('cart');
                // $dda=$dd[0];
                dd($dd[3]['name']);
            @endphp --}}
            <h4 class="d-flex  align-items-center text-center
             mb-3">
                Your Payment
            </h4>
            <h6><span class=""><strong>Home service Dhaka:</strong> 60tk</span></h6>
            <h6><span class=""><strong>Home service others district:</strong> 400tk</span></h6>
            <h4>
            <span class="badge badge-secondary badge-pill">Bikash Payment:</span>
            <span class="badge badge-success badge-pill">01645-254877</span>
            </h4>
        </div>
        {{-- ./cart --}}
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token" /> --}}
                @csrf
                {{-- <input type="hidden" value="{{ $total }}" name="total" /> --}}

               

                <div class=" mb-3">
                    <label for="">District</label>
                    <select name="district_id"  class="district form-control" id="district" required>
                        <option value="-1">Choose...</option>
                        @isset($districts)
                        @foreach ($districts as $dist)
                            <option value="{{$dist->id}}">{{$dist->name}}</option>
                        @endforeach
                        @endisset

                    </select>
                    
                    <span id="grosstotal">
                    </span>
                </div>
                {{-- <div class="mb-3">
                  
              
                </div> --}}

                <div class=" mb-3">
                    <label for="subdistricts">Upazala/Thana</label>
                    <select name="subdistrict_id" id="subdistricts"  class="form-control">
                        

                    </select>
                </div>
                <div class=" mb-3">
                    <label for="unions">Union/woard</label>
                    <select name="union_id" id="unions"  class="form-control">
                        

                    </select>
                </div>



                <div class="row">
                    
                    <div class="col-md-12 mb-3">
                        <label for="seeAnotherFieldGroup">Payment Method</label>
                        <select name="payment" class="custom-select d-block w-100" id="travel" onChange=showHide() required>
                            <option value="">Choose...</option>
                            <option value="Cash-On-Delivery">Cash On Delivery</option>
                            
                            <option value="Bkash">Bkash</option>
                            {{-- <option value="Roket">Roket</option>
                            <option value="Nogad">Nogad</option> --}}
                        </select>
                        {{-- <div class="invalid-feedback">
                            Valid customer name is required.
                        </div> --}}
                    </div>
                    <div class="col-md-12 mb-3" id="hidden-panel">
                        <label for="tid">Transaction Id if you pay by Bkash</label>
                        <input type="text" name="transaction_id" class="form-control" id="tid" 
                                value="{{ old('') }}" placeholder="write your payment id">
                        {{-- <div class="invalid-feedback">
                            Valid customer name is required.
                        </div> --}}
                    </div>
                </div>


                
                <div class="mb-3">
                    <label for="address">Nearest Location</label>
                    <input type="text" name="addressC" value="{{ old('address') }}" class="form-control" id="address" placeholder="Write your address"
                           required>
                </div>

                <hr class="mb-4">
                
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2021 Paykari.com</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    


<script type=text/javascript>
    $('#district').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('/getlocation')}}?district="+categoryID,
        success:function(res){        
        if(res){
          $("#subdistricts").empty();
          $("#subdistricts").append('<option>Select one..</option>');
          $.each(res,function(key,value){
            $("#subdistricts").append('<option value="'+key+'">'+value+'</option>');
          });
        
        }else{
          $("#subdistricts").empty();
        }
        }
      });
    }else{
      $("#subdistricts").empty();
 
    }   
    });

  </script> 

<script type=text/javascript>

    $('.district').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('/service-cost')}}?district="+categoryID,
        success:function(res){        
        if(res){
          $("#grosstotal").empty();
        //   $("#grosstotal").append('<option>Select one..</option>');

          $.each(res,function(key,value){
              var a = value+{{$total}}
            $("#grosstotal").append(' <em class="text-danger">Your shipping charge </em><strong >'+value+' tk<strong> ','<input type="hidden" name="total" class="form-control" readonly value="'+a+'">');
          });
        
        }else{
          $("#grosstotal").empty();
        }
        }
      });
    }else{
      $("#grosstotal").empty();
 
    }   
    });

  </script> 
  {{-- b.this for union selection --}}

<script type=text/javascript>

    $('#subdistricts').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('/unions')}}?district="+categoryID,
        success:function(res){        
        if(res){
          $("#unions").empty();
        //   $("#grosstotal").append('<option>Select one..</option>');

          $.each(res,function(key,value){
            $("#unions").append('<option value="'+key+'">'+value+'</option>');
          });
        
        }else{
          $("#unions").empty();
        }
        }
      });
    }else{
      $("#unions").empty();
 
    }   
    });

  </script>  
{{-- $.each( obj, function( key, value ) {
     <input type="text" name="total" value="" class="form-control" >
    alert( key + ": " + value );
  }); --}}


{{-- for dive hide show use javascript .start --}}
<script>
    function showHide() {
     let travelhistory = document.getElementById('travel')
     if (travelhistory.value == "Bkash") {
         document.getElementById('hidden-panel').style.display = 'block'
     } else {
         document.getElementById('hidden-panel').style.display = 'none'
     }
 }
  </script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script> --}}
    
            
        </body>
</html>
