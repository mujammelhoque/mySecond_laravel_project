@extends('admin.products.prolayout')
@section('activeShowcategory')
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
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('catdel') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>





    <div class="row d-flex justify-content-between">
        <div class="col-7">
        
          <h3 class="text-center">Category table</h3>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">title</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @isset($categories)
                    @foreach ($categories as $category)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{$category->name}}</td>
                      <td>{{$category->title}}</td>
                      <td><div style="display: inline-block"><form action="{{ url('categorydelete',$category->id) }}" method="post">
                        
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></div> 
                    <a class="btn btn-primary" href="{{url('editcategory',$category->id)}}">Edit</a>
                  </td>
                  
                    </tr>
                        
                    @endforeach
                        
                    @endisset
                   

                 
                  </tbody>
                
              </table>
        </div>
        <div class="col-4">
          <div class="alert alert-success" role="alert">
      
          <h3 class="text-center">Sub Category table</h3>
        
            <table class="table table-dark table-striped">
                 <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                    
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @isset($subcategories)
                    @foreach ($subcategories as $subcategory)
                    <tr>
                      <th scope="row">1</th>
                      <td>{{$subcategory->name}}</td>
            
                      <td><div style="display: inline-block"><form action="{{ url('subcatdelete',$subcategory->id) }}" method="post">
                        
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></div> 
                    <a class="btn btn-primary" href="{{ url('editsubcategory',$subcategory->id) }}">Edit</a>
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
