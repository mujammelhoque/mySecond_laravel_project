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
                <h2>Supplier Request</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

     <div class="scroll">
    <table class="table table-bordered ">
        <tr class="bg-dark text-white">
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone  </th>
            <th>Address  </th>
            <th>Category Group </th>
            <th>Request  </th>
            <th>Action  </th>
        </tr>
        @if(isset($request))

    {{-- {{dd($orders)}} --}}
      
        @foreach ($request as $item)
            
    
      
     
       
            

        <tr>
            {{-- <td>{{ ++$i }}</td> --}}
            <td>{{ $item->fname }}</td>
            <td>{{ $item->username }}</td>
        
           
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone}}</td>
            <td>{{ $item->currentaddr }}</td>
            <td>{{ $item->cat_group }}</td>
            {{-- <td>{{ $item->image }}</td>                         
            <td>{{ $item->logo }}</td>                          --}}
            <td>
                @php
                    if($item->is_admin ==0){
                        echo 'Request Pending';
                    }
                    elseif ($item->is_admin ==2) {
                      echo "Approved";
                    }
                    else {
                        echo 'db problem contact developer';
                    }   
                @endphp
                </td>                         

         
            <td>
               <a class="btn btn-success mb-2 " href="{{url('approving',$item->id)}}">Approve</a> 
               <a class="btn btn-danger " href="{{url('repending',$item->id)}}">Remove</a> 
                      
                     
                  
      
            </td>
        </tr>
        @endforeach
    
                
        @endif
    </table>
</div>
    @if(isset($orders))
    {{-- {!! $orders->links() !!} --}}
    @endif
    
  
        
@endsection