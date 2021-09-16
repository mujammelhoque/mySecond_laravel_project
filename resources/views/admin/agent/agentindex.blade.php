@extends('admin.products.prolayout')
     

@section('dashbord')
<a class="nav-link" href="{{url('admin/agent')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
@endsection

@section('dashboard')
    Agent Admin
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
    
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
   @php
        // dd($orders);
   @endphp
     
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
            <td>
                
        
               
            </td>
            <td >
                  
           
                
               </td>
            <td>
                
             
              </td>
            <td>
               
            </td>

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
    @if(isset($orders))
    {{-- {!! $orders->links() !!} --}}
    @endif
    
  
        
@endsection