@extends('admin.products.prolayout')

@section('dashbord')
<a class="nav-link" href="{{url('supplier/home')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
@endsection


@section('UploadProduct')
<a class="nav-link " href="{{ url('supplierupload') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Upload Product</span>
</a>
@endsection



@section('ShowOrders')
<a class="nav-link " href="{{ url('/supplier-orders/table') }}" >
    <i class="fas fa-fw fa-file"></i>
    <span>Show Orders  </span>
</a>
@endsection


@section('dashboard')
    Supplier Admin
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
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
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
    
    {!! $products->links() !!}
    @endisset
    
@endsection
 