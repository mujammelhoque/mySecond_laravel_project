<div class="product-catagories-wrapper py-2">
<div class="container">
  <div class="product-catagories">
    <div class="row g-2">
      @foreach ($categories as $category )
      <div class="col-3"><a class="shadow-sm" href="{{ url('catshow/'.$category->id) }}"><img src="img/product/5.png" alt="">{{ $category->name }}</a></div>
      @endforeach
   
    </div>
  </div>
</div>
</div>
     