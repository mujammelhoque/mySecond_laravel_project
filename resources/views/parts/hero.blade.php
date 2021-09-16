<div class="container">
    <div class="pt-3">
      <!-- Hero Slides-->
      <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-hero-slide" style="background-image: url('{{ asset('banner/'.$sliders[0]->image1) }}'); width:100%;height:300px">
          <div class="slide-content h-100 d-flex align-items-center">
            <div class="slide-text">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">{{$sliders[0]->title1}}</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">{{$sliders[0]->desc1}}</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
            </div>
          </div>
        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide" style="background-image: url('{{ asset('banner/'.$sliders[0]->image2) }}'); width:100%;height:300px" >
          <div class="slide-content h-100 d-flex align-items-center">
            <div class="slide-text">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">{{$sliders[0]->title2}}</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">{{$sliders[0]->desc2}}</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-duration="1000ms">Buy Now</a>
            </div>
          </div>
        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide" style="background-image: url('{{ asset('banner/'.$sliders[0]->image3) }}'); width:100%;height:300px">
          <div class="slide-content h-100 d-flex align-items-center">
            <div class="slide-text">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">{{$sliders[0]->title2}}</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">{{$sliders[0]->desc3}}</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  