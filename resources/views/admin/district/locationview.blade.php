@extends('admin.products.prolayout')
@section('activeShowlocation')
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


 <div class="container mt-4">
      
  <h3 class="text-center">Location table</h3>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>





    <div class="row d-flex justify-content-between">
        <div class="col-7">
    
     
            <table class="table table-success table-striped">
              <h3 class="text-center bg-secondary text-light">District table</h3>
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Service Cost</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @isset($locations)
                    @foreach ($locations as $location)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{$location->name}}</td>
                      <td>{{$location->service_cost}}</td>
                      <td><div style="display: inline-block"><form action="{{ url('deletedist',$location->id) }}" method="post">
                        
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></div> 
                    <a class="btn btn-primary" href="{{url('edit-location-form',$location->id)}}">Edit</a>
                  </td>
                  
                    </tr>
                        
                    @endforeach
                        
                    @endisset
                   

                 
                  </tbody>
                
              </table>
        </div>
        <div class="col-5">
          <div class="alert alert-success" role="alert">
      
          <h3 class="text-center">Sub district table</h3>
        
            <table class="table table-dark table-striped">
                 <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Parent</th>
                    
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @isset($sublocations)
                    @foreach ($sublocations as $sublocation)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{$sublocation->name}}</td>
                      <td>{{  App\Models\District::find($sublocation->district_id)->name }}</td>
            
                      <td><div style="display: inline-block "><form  action="{{ url('deletesubdist',$sublocation->id) }}" method="post">
                        
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></div> 
                    <a class="btn btn-primary " href="{{ url('sublocation-edit-form',$sublocation->id) }}">Edit</a>
                  </td>
                  
                    </tr>
                        
                    @endforeach
                        
                    @endisset
                   

                 
                  </tbody>
              </table>
        </div>
      </div>
     
</div>

      @endsection
