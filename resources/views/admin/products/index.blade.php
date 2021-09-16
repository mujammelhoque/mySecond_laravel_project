@extends('admin.products.prolayout')

@section('dashbord')
<a class="nav-link" href="{{url('admin/home')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
@endsection


@section('UploadProduct')
<a class="nav-link " href="{{ url('crCreate') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Upload Product</span>
</a>
@endsection


@section('CreateCategory')
<a class="nav-link " href="{{ url('crCategory') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Create Category</span>
</a>
@endsection


@section('CreateLocation')
<a class="nav-link " href="{{ url('district') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Create Location </span>
</a>
@endsection


@section('ShowOrders')
<a class="nav-link " href="{{ url('crOrder') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Show Orders  </span>
</a>
@endsection


@section('ShowCategories')
<a class="nav-link " href="{{ url('categoryview') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Show Categories  </span>
</a>
@endsection


@section('ShowLocations')
<a class="nav-link " href="{{ url('locationview') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Show Locations  </span>
</a>
@endsection
@section('agentRegister')
<a class="nav-link " href="{{ url('agentform') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Agent Register  </span>
</a>
@endsection
@section('dashboard')
    Super Admin
@endsection

     @section('style')
   
     @endsection
@section('content')

<!-- Content Row -->
                    <div class="row">

                       <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                       <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="{{url('supplierrequest')}}">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> --}}
                                        </div>
                               
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <!-- Content Row -->





    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    {{-- alert for uploaded product S--}}
    @if (session('status'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif
    {{-- alert for uploaded product E--}}
     <div class="scroll" >
    <table class="table table-striped table-bordered">
        <tr class="bg-dark text-light">
            <th>No</th>
            <th>Featured Image</th>
            <th>Images</th>
            <th>Name</th>
            <th>Sku</th>
            <th>Status</th>
            <th>New Price</th>
            <th>Old Price</th>
            <th>Category</th>
            <th>Attribute</th>
            <th width="280px">Action</th>
        </tr>
        @isset($products)
            
       
       
     
        
    @foreach ($products as $product)
           
    <?php
    $img =  $product['image'];
    $images = json_decode($img );
 //  print_r($images);
 //   exit;
    ?>
    <tr>
    <td class="bg-info text-light">{{ ++$i }}</td>

    <td >
        <img src="{{asset('featuredimg/'.$product->fimage)}}" width="50px">
    </td>
    <td width="250px">
        @foreach ($images as $img )
        <img src="{{ asset('images/'.$img) }}" width="50px">
        @endforeach
    </td>
    
    <td>{{ $product->name }}</td>
    <td>{{ $product->sku }}</td>
    <td>
            @if ($product->status==1)
                In Stock
                @else Out of Stock
            @endif
    </td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->oldprice }}</td>
    {{-- <td>{{ $product->category_id }}</td> --}}
    <td>{{ App\Models\Category::find($product->cat_id)->name ?? ''}}</td>

    <td>
        @if ($product->attr==1)
            Flash sale 
            @elseif ($product->attr==2) 
            Top products
            @elseif ($product->attr==3) 
            Popular
            @elseif ($product->attr==4) 
            Weekend offers
            @else
            no attr
        @endif
</td>
        
            <td>
                <form action="{{ url('crDestroy',$product->id) }}" method="post">
                   
                    {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
      --}}
                    
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr class="bg-success"><td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td></tr>
       
    </table>
</div>
    
    {!! $products->links() !!}
    @endisset
    <hr> <hr>
    <div class="row">
        <div class="col-lg-12 margin-tb ">
            <h2 class="text-center">Admin Slider Control</h2>
            <div class="pull-left">
                {{-- <h2>admin slider control</h2> --}}
            </div>
            <div class="pull-right ">
                <a class="btn btn-success " href="{{ url('/sliderform') }}"> Add New Slider</a>
            </div>
        </div>
    </div>
    
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <div class="scroll" >
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image1  </th>
            <th>Image2  </th>
            <th>Image3  </th>
          
           
            <th width="280px">Action</th>
        </tr>
        @if($sliders)
        @foreach ($sliders as $key=> $slider)
        <tr>
            <td>{{ ++$i }}</td>
         
            <td>{{ $slider->title }}</td>
            <td>{{ $slider->description }}</td>
            <td><img src="/image/{{ $slider->image1}}" width="100px"></td>  
            <td><img src="/image/{{ $slider->image2}}" width="100px"></td>  
            <td><img src="/image/{{ $slider->image3}}" width="100px"></td>  
           
            <td>
                <form action="{{ url('sliderdelete',$slider->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                      
                       <input type="submit" class="btn btn-danger" value="delete">
                   </form>
      
            </td>
        </tr>
        @endforeach
        @endif
    </table>
    </div>
    
    {!! $sliders->links() !!}

@endsection
 