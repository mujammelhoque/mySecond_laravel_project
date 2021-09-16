@extends('pages.layout')
@include('parts.header')
@section('onepage')

 <!-- /.row -->
 <div class="row">
    @if(isset($posts))
        
    
 @foreach ($posts as $product )
     <div class="col-md-3 text-center col-sm-4 col-xs-6">
        <div class="thumbnail product-box">
            <img src="{{ asset('image/'.$product->image) }}" alt="">
            <div class="caption">
                <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                <h4 class="product-price">{{ $product->price}} <del class="product-old-price">{{ $product->oldprice }} tk</del></h4>
                    {{-- <p><a href="#">Ptional dismiss button </a></p>
                    <p>Ptional dismiss button in tional dismiss button in   </p> --}}
                    <p><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-success" role="button">Add To Cart</a> <a href="{{ url('mainview/'.$product->id) }}" class="btn btn-primary" role="button">See Details</a></p>
            </div>
        </div>
     </div>
     @endforeach
     @else 
    <div>
        <h2>No product found</h2>
    </div>
     @endif
 </div>
  @if(isset($posts))
 {!! $posts->links() !!}
 @endif 


</div>
    
@endsection