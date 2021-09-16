 
 @extends('layout-user.userlayout')

  @section('content')

  <div class="page-content-wrapper">

    @include('parts.hero')
    @include('parts.category')
    @include('parts.flash');
    @include('parts.productall')
  </div>
  <!-- Internet Connection Status-->
  <div class="internet-connection-status" id="internetStatus"></div>
  @endsection


  
    
    