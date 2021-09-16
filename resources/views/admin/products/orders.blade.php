@extends('admin.products.prolayout')
@section('activeOrders')
    active
@endsection

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

     
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Orders here</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
        <h5><a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a></h5>
    </div>

     <div class="scroll">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone  </th>
            <th>Address  </th>
            <th>Product Name  </th>
            <th>Stock Unit  </th>
            <th>Quantity  </th>
            <th>Price  </th>
            <th>Total  </th>
       
            <th>Transaction  </th>
            <th>Method  </th>
          
           
            <th width="280px">Action</th>
        </tr>
        @if(isset($orders))

    {{-- {{dd($orders)}} --}}
        @foreach ($orders as $key => $order)
        @foreach ($order as $item)
            
    
      
     
       
            

        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $item->name }}</td>
        
           
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone}}</td>
            <td>{{ $item->addressC }}</td>
            <td>{{ $item->product_name }}</td>
            <td>{{ $item->sku }}</td>                         
            <td>{{ $item->quantity }}</td>                         
            <td>{{ $item->price }}</td>                         

            <td>{{ $item->total }}tk</td>
           
            <td>{{ $item->transaction_id }}</td>
            <td>{{ $item->payment }}</td>
      
            <td>
                <form action="{{ url('orderdel',$item->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                      
                       <input type="submit" class="btn btn-danger" value="delete">
                   </form>
      
            </td>
        </tr>
        @endforeach
        @endforeach
                
        @endif
    </table>
</div>
    @if(isset($orders))
    {{-- {!! $orders->links() !!} --}}
    @endif
    
  
        
@endsection