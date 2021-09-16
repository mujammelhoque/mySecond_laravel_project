@extends('admin.products.prolayout')
@section('activeCcategory')
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

 <div class="container">
     <div style="margin-top: 20px"></div>
     @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
             @endif
        <div class="row">
          {{-- {{dd($categories)}} --}}

            {{-- ctategory form .Start --}}
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                
              
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title">Create Category</h5>
                    </div>
                    </div>
                    <div class="card-body">
             <form action="{{ url('/categorystore') }}" method="Post" >
                @csrf
                <div class="form-group mb-3 ">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                  
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control">
                  
                </div>
             
         
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
             
             </form>
          </div>
    </div>
    {{-- ctategory form .End --}}

    {{-- subctategory form .start --}}
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        
                <div class="card shadow-none ">
                    <div class="card-header">
                        <h5 class="card-title">Create Sub Category</h5>
                    </div>
                    </div>
                    <div class="card-body ">
             <form action="{{ url('/subcategorystore') }}" method="Post" >
                @csrf
                <div class="form-group mb-3 ">
                  <label class="form-label">Category name</label>
                  {{-- <input type="text" name="category_id" class="form-control"> --}}
                  <select name="category_id" class="form-control">
                    <option value="-1">choose category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                        
                    @endforeach

                  </select>
                
              </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                  
                </div>
                
             
         
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
             
             </form>
          </div>
    </div>
     {{-- subctategory form .End --}}

      </div>
      <div class="text-center" style="margin-top: 20px">
        <a class="btn btn-secondary" href="{{url('/crdex')}}"> Back</a>
    </div>
</div>

      @endsection
