@extends('admin.products.prolayout')
@section('activeClocation')
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
                        <h5 class="card-title">Create District</h5>
                    </div>
                    </div>
                    <div class="card-body">
             <form action="{{ url('/create-district') }}" method="Post" >
                @csrf
                <div class="form-group mb-3 ">
                    <label class="form-label">Name</label>
                    <input type="text" required name="name" class="form-control">
                  
                </div>
                <div class="form-group mb-3 ">
                    <label class="form-label">Service cost</label>
                    <input type="number" required name="service_cost" class="form-control">
                  
                </div>
             
         
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
             
             </form>
          </div>
    </div>
    {{-- ctategory form .End --}}

    {{-- subctategory form .start --}}
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        
                <div class="card shadow-none ">
                    <div class="card-header">
                        <h5 class="card-title">Create Sub District</h5>
                    </div>
                    </div>
                    <div class="card-body ">
             <form action="{{ url('/create-sub-district') }}" method="Post" >
                @csrf
                <div class="form-group mb-3 ">
                  

                  <label class="form-label">District name</label>
                  {{-- <input type="text" name="category_id" class="form-control"> --}}
                  <select name="district_id" class="form-control">
                      <option value="-1">choose a district</option>
     
                      @isset($districts)
                        
           @foreach ($districts as $district)
           <option value="{{$district->id}}">{{$district->name}}</option>
                        
                    @endforeach
                    @endisset

                  </select>
                
              </div>
              <div class="form-group mb-3 ">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
              
            </div>
             
                
             
         
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
             
             </form>
          </div>
    </div>
     {{-- subctategory form .End --}}

    {{-- union form .start --}}
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        
                <div class="card shadow-none ">
                    <div class="card-header">
                        <h5 class="card-title">Create Union/oward</h5>
                    </div>
                    </div>
                    <div class="card-body ">
             <form action="{{ url('/create-union') }}" method="Post" >
                @csrf
                <div class="form-group mb-3 ">
                  

                  <label class="form-label">Sub district name</label>
                  {{-- <input type="text" name="category_id" class="form-control"> --}}
                  <select name="subdist_id" class="form-control">
                      <option value="-1">choose a district</option>
     
                      @isset($subdists)
                        
           @foreach ($subdists as $subdist)
           <option value="{{$subdist->id}}">{{$subdist->name}}</option>
                        
                    @endforeach
                    @endisset

                  </select>
                
              </div>
              <div class="form-group mb-3 ">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
              
            </div>
             
                
             
         
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
             
             </form>
          </div>
    </div>
     {{-- union form .End --}}

      </div>
    
</div>

      @endsection
