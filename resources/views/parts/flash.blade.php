
      <!-- Flash Sale Slide-->
      <div class="flash-sale-wrapper">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lightning me-1" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
</svg>Flash sale
            </h6>
            <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
            <ul class="sales-end-timer ps-0 d-flex align-items-center" data-countdown="2022/01/01 14:21:37">
              <li><span class="days">0</span>d</li>
              <li><span class="hours">0</span>h</li>
              <li><span class="minutes">0</span>m</li>
              <li><span class="seconds">0</span>s</li>
            </ul>
          </div>
          
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">
            @isset($flashsale)
              
            @foreach ($flashsale as $sale )

           

            <!-- Single Flash Sale Card-->
            <div class="card flash-sale-card">
              <div class="card-body"><a href="{{ url('addcart', $sale->id)}}"><img style="width:100%; height:150px"  src="{{ asset('featuredimg/'.$sale->fimage) }}" alt="flash sale image"><span class="product-title">{{ $sale->name }}</span>
                  <p class="sale-price">{{ $sale->price }}<span class="real-price">{{ $sale->oldprice }}tk</span></p><span class="progress-title">{{ $sale->alert}}% Sold Out</span>
                  <!-- Progress Bar-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                  </div></a></div>
            </div>
            @endforeach
            @endisset

           
          </div>
        </div>