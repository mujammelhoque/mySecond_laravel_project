
        <div class="container">
          <!--.text-center.mt-3-->
          <!--a.btn.btn-warning.btn-sm(href="flash-sale.html") View All-->
        </div>
      </div>
      <!-- Top Products-->
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Top Products</h6><a class="btn btn-danger btn-sm" href="#">View All</a>
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            @isset($topproducts)
            @foreach ($topproducts as $product )
         
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span>
                <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                <a class="product-thumbnail d-block" href="{{url('view-product',$product->id)}}">
                    <img class="mb-2" style="width:100%; height:160px" src="{{ asset('featuredimg/'.$product->fimage) }}" alt=""></a>
                    <a class="product-title d-block" href="{{url('view-product',$product->id)}}">
                        <span class="text-primary text-decoration-underline">{{ $product->name }}</span><br>
                        <span  style="color:#C71585">Min Order:</span> {{ $product->quantity }}  {{ $product->qtytext }}<br><small class="text-secondary">{{$product->title}}</small></a>
                  <p class="sale-price">{{ $product->price}}<span>{{ $product->oldprice }} tk</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i></div><a class="btn btn-success btn-sm" href="{{ url('addcart', $product->id) }}">
                  <i class="lni lni-cart"></i></a>
                </div>
              </div>
            </div>

            @endforeach
            {{-- {{ route('add.to.cart', $product->id) }} --}}
          
            @endisset

      
          </div>
        </div>
      </div>
      <!-- Cool Facts Area-->
      {{-- <div class="cta-area">
        <div class="container">
          <div class="cta-text p-4 p-lg-5" style="background-image: url({{ asset('assets/img/bg-img/24.jpg') }})">
            <h4>Winter Sale 50% Off</h4>
            <p>Suha is a multipurpose, creative &amp; <br>modern mobile template.</p><a class="btn btn-danger" href="#">Shop Today</a>
          </div>
        </div>
      </div> --}}
      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Weekly Best Sellers</h6><a class="btn btn-success btn-sm" href="#">View All</a>
          </div>
          <div class="row g-3">
          

             
            <!-- Single Weekly Product Card-->
            @isset($weeklyoffers)
            @foreach ($weeklyoffers as $weekly)
            <div class="col-12 col-md-4">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><span class="badge badge-primary">Sale</span>
                  <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                  <a class="product-thumbnail d-block" href="{{url('view-product',$weekly->id)}}">
                      <img style="width:100%; height:150px"  src="{{ asset('featuredimg/'.$weekly->fimage) }}" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block" href="{{url('view-product',$weekly->id)}}">
                      <span class="text-danger text-decoration-underline">{{$weekly->name}}</span><br>
                      <small style="color:#008000">Min Order: {{ $weekly->quantity }} {{ $weekly->qtytext }}</small> <br><small class="text-secondary ">{{$weekly->title}}</small></a>
                    <p class="sale-price"><i class="lni"> ৳</i>{{ $weekly->price}}<span>৳{{ $weekly->oldprice}}</span></p>
                    {{-- <div class="product-rating"><i class="lni lni-star-filled"></i>4.82 (125)</div> --}}
                    <a class="btn btn-danger btn-sm" href="{{ url('addcart', $weekly->id) }}"><i class="me-1 lni lni-cart"></i>Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach 
            @endisset 
           
           

          </div>
        </div>
      </div> 
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Recent Products</h6><a class="btn btn-danger btn-sm" href="#">View All</a>
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->
            @isset($recents)
            @foreach ($recents as $product )
         
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body"><span class="badge badge-success">Sale</span>
                <a class="wishlist-btn" href="#"><i class="lni lni-heart"></i></a>
                <a class="product-thumbnail d-block" href="{{url('view-product',$product->id)}}">
                    <img class="mb-2" style="width:100%; height:150px"  src="{{ asset('featuredimg/'.$product->fimage) }}" alt=""> </a>
                <a class="product-title d-block" href="{{url('view-product',$product->id)}}">
                    <span class="text-primary text-decoration-underline" >{{ $product->name }}</span><br>
                     <small style="color:#C71585">Min Order: {{ $product->quantity }} {{ $product->qtytext }}</small> <br><small>{{$product->title}}</small></a>
                  <p class="sale-price">{{ $product->price}}<span>{{ $product->oldprice }} tk</span></p>
                  <div class="product-rating"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i></div>
                  <a class="btn btn-success btn-sm" href="{{ url('addcart', $product->id) }}">
                  <i class="lni lni-cart"></i></a>
                </div>
              </div>
            </div>

            @endforeach
            {{-- {{ route('add.to.cart', $product->id) }} --}}
          
            @endisset

      
          </div>
        </div>
      </div>

      <!-- Discount Coupon Card-->
      <div class="container">
        <div class="card discount-coupon-card border-0">
          <div class="card-body">
            <div class="coupon-text-wrap d-flex align-items-center p-3">
              <h5 class="text-white pe-3 mb-0">Get 20% <br> discount</h5>
              <p class="text-white ps-3 mb-0">To get discount, enter the<strong class="px-1">GET20</strong>code on the checkout page.</p>
            </div>
          </div>
        </div>
      </div>

      
      <!-- Featured Products Wrapper-->
      <div class="featured-products-wrapper py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Featured Products</h6><a class="btn btn-warning btn-sm" href="#">View All</a>
          </div>
          <div class="row g-3">
            <!-- Featured Product Card-->
            @isset($featured)
            @foreach ($featured as $product )
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card featured-product-card">
                <div class="card-body"><span class="badge badge-warning custom-badge"><i class="lni lni-star"></i></span>
                  <div class="product-thumbnail-side"><a class="wishlist-btn" href="#">
                      <i class="lni lni-heart"></i></a><a class="product-thumbnail d-block" href="{{url('view-product',$product->id)}}">
                          <img style="width:100%; height:160px"  src="{{ asset('featuredimg/'.$product->fimage) }}" alt=""></a></div>
                  <div class="product-description"><a class="product-title d-block text-decoration-underline" href="{{url('view-product',$product->id)}}">{{ $product->name }}<br>
                   <small style="color:#C71585">Min Order: {{ $product->quantity }} {{ $product->qtytext }}</small> <br><small class="text-secondary">{{ $product->title }}</small></a>
                    <p class="sale-price">{{ $product->price}}<span>{{ $product->oldprice}}tk</span><span> 
                    <a class="btn btn-danger btn-sm" href="{{ url('addcart', $product->id) }}"><i class="me-1 lni lni-cart"></i>Buy Now</a></span></p>
                  </div>
                  
                </div>
              </div>
            </div>
            @endforeach
         
          
            @endisset

            <!-- Featured Product Card-->
            
          </div>
        </div>
      </div>


      <!-- Flash Sale Slide-->
    <div class="flash-sale-wrapper">
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          <h6>Up Comming</h6><a class="btn btn-success btn-sm" href="#">View All</a>
        </div>
        <div class="section-heading d-flex align-items-center justify-content-between">
          {{-- <h6 class="me-1 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lightning me-1" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
</svg>Up comming
          </h6> --}}
          <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
          {{-- <ul class="sales-end-timer ps-0 d-flex align-items-center" data-countdown="2022/01/01 14:21:37">
            <li><span class="days">0</span>d</li>
            <li><span class="hours">0</span>h</li>
            <li><span class="minutes">0</span>m</li>
            <li><span class="seconds">0</span>s</li>
          </ul>
        </div>
         --}}
      
        
        <!-- Flash Sale Slide-->
        <div class="flash-sale-slide owl-carousel">
          @isset($upcomming)
            
          @foreach ($upcomming as $sale )

         

          <!-- Single Flash Sale Card-->
          <div class="card flash-sale-card">
            <div class="card-body"><a href="{{ url('addcart', $product->id)}}">
                <img style="width:100%; height:120px"  src="{{ asset('featuredimg/'.$sale->fimage) }}" alt="flash sale image"><span class="product-title">{{ $sale->name }}<br><small class="text-secondary">{{ $sale->title }}</small></span>
                <p class="sale-price">{{ $sale->price }}<span class="real-price">{{ $sale->oldprice }}tk</span></p>
                <!-- Progress Bar-->
               </a></div>
          </div>
          @endforeach
          @endisset

       
        </div>
      </div>
