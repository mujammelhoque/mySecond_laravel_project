@extends('layout-user.userlayout')

@section('content')

<div class="page-content-wrapper">
    @include('parts.hero')
      <!-- Product Catagories-->
     
      

      <!-- Top Products-->
      <div class="top-products-area pb-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Catagory Products</h6>
          </div>
          <div class="row g-3">
            
            <!-- Single Top Product Card-->
            @forelse ($subcatproducts as $product)
                
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span><a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="{{url('view-product',$product->id)}}"><img class="mb-2" style="width:100%; height:220px" src="{{ asset('featuredimg/'.$product->fimage) }}" alt=""></a><a class="product-title d-block" href="{{url('view-product',$product->id)}}">{{$product->name}}</a>
                  <p class="sale-price">{{$product->price}}<span>{{$product->oldprice}}</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm" href="{{ url('addcart', $product->id) }}"><i class="lni lni-cart"></i></a>
                </div>
              </div>
            </div>

            @empty
                
            @endforelse
  
            <!-- Single Top Product Card-->
            
          </div >
          <div class="mt-5">
            @isset($catproducts)
              
          
            {!! $catproducts->links() !!}
            @endisset
          </div>
        
        </div>
      
    
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    
    


    

@endsection