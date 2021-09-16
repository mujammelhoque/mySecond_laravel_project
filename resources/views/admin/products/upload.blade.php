@extends('admin.products.prolayout')

@section('dashbord')
<a class="nav-link" href="{{url('admin/home')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
@endsection

@section('active-upload')
 active
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





@section('style')
<style>
    #hidden-panel {
	display: none;
}
</style>
    
@endsection

  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    @if ($message = Session::get('success'))
    <div class="alert alert-success  w-75">
        <p>{{ $message }}</p>
    </div>
    @endif

<div class="card text-light shadow-none " style="background-color:hsla(181, 52%, 28%, 0.637)">

{{-- ---------------- --}}
<div class="card-header bg-info text-light"><strong>Add new Product</strong></div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     {{-- --------------- --}}
     <div class="card-body">
<form action="{{ url('/crStore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
  
    
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>
                <div class="col-md-6">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                </div>
            </div>
      
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __(' Title') }}</label>
                <div class="col-md-6">
                    <input type="text" id="title" name="title" class="form-control" placeholder="short title" value="{{old('title')}}">
                </div>
            </div>

     
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __(' Decription') }}</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="description" id="description"  value="{{old('description')}}" ></textarea>
                </div>
            </div>
 

        

  
        
            <div class="form-group row">
                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __(' Category') }}</label>
                <div class="col-md-6">
                    <select name="cat_id" id="category" class="form-control" placeholder="Category">
                        <option value="-1">Select Category </option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            
            <div class="form-group row  ">
            
                <label for="subcategories" class="col-md-4 col-form-label text-md-right">{{ __(' Subcategory') }}</label>
                <div class="col-md-6">
                    <select name="subcat_id" id="subcategories" class="form-control">
                    </select>
                </div>
            </div>
        
    

      
     
            <div class="form-group row  ">
        
                <label for="travel" class="col-md-4 col-form-label text-md-right">{{ __(' Attribute') }}</label>
                <div class="col-md-6">
                    <select name="attr" class="form-control"  id="travel" onChange=showHide()>
                        <option value="-1">choose one..</option>
                        <option value="1">Flash Sale</option>
                        <option value="2">Top Products</option>
                        <option value="3">Weekly offers</option>
                        <option value="4">Featured Products</option>
                        <option value="5">Up Comming Products</option>

                    </select>

                </div>
            </div>
     
       
        <div class="form-group row   " id="hidden-panel">
            <label for="alert" class="col-md-4 col-form-label text-md-right">{{ __(' Alert for flash sale') }}</label>
            <div class="col-md-6">
                <input type="text" id="alert" name="alert" class="form-control" value="{{old('alert')}}" placeholder="if select flash sale attr">
            </div>
        </div>

        <div class="form-group row ">
            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __(' Quantity') }}</label>
            <div class="col-md-6">
                <input type="number" id="quantity" value="{{old('quantity')}}" name="quantity" class="form-control" >
            </div>
        </div>
      
    
            <div class="form-group row  ">
                <label for="qtytext" class="col-md-4 col-form-label text-md-right">{{ __(' Measure') }}</label>
                <div class="col-md-6">
                    <input type="text" id="qtytext" value="{{old('qtytext')}}" name="qtytext" class="form-control" >
                </div>
            </div>
      

            <div class="form-group row ">
                <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __(' Stock Unit') }}</label>
                <div class="col-md-6">
                    <input type="text" id="sku" name="sku" value="{{old('sku')}}" class="form-control" placeholder="stock unit">
                 </div>
            </div>

      
            <div class="form-group row  ">
                <label for="status"  class="col-md-4 col-form-label text-md-right">{{ __(' Status') }}</label>
                <div class="col-md-6">
              
                    <select name="status" id="status" class="form-control"  id="">
                        <option value="-1">choose one..</option>
                        <option value="1">In Stock</option>
                        <option value="2">Out of Stock</option>
                    </select>
                </div>
            </div>
        

       
        

            <div class="form-group row ">
                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __(' Price') }}</label>
                <div class="col-md-6">
                    <input type="number" id="price" name="price" value="{{old('price')}}" class="form-control" placeholder="price">
                </div>
            </div>
        

            <div class="form-group row ">
                <label for="oldprice" class="col-md-4 col-form-label text-md-right">{{ __(' Old Price') }}</label>
                <div class="col-md-6">
                    <input type="number" id="oldprice" name="oldprice" value="{{old('oldpriceu')}}" class="form-control" placeholder="Old price">
                </div>
            </div>
       

            <div class="form-group row">
                <label for="fimage" class="col-md-4 col-form-label text-md-right">{{ __('Single Image') }}</label>
                <div class="col-md-6">
                 <input type="file" id="fimage" name="fimage"  multiple class="form-control" placeholder="image">
                </div>
            </div>
       
       
            <div class="form-group row">
             
                <label for="morimage" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>
                <div class="col-md-6">
                    <input type="file" id="morimage" name="image[]" multiple class="form-control" placeholder="image">
                </div>
            </div>
   
        
            <div class="form-group row mb-0">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
     
</form>
</div>
</div>
</div>
</div>
</div>


<script type=text/javascript>
    $('#category').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('getState')}}?cat_id="+categoryID,
        success:function(res){        
        if(res){
          $("#subcategories").empty();
          $("#subcategories").append('<option>Select sub category</option>');
          $.each(res,function(key,value){
            $("#subcategories").append('<option value="'+key+'">'+value+'</option>');
          });
        
        }else{
          $("#subcategories").empty();
        }
        }
      });
    }else{
      $("#subcategories").empty();
 
    }   
    });

  </script>

  
  <script>
    function showHide() {
     let travelhistory = document.getElementById('travel')
     if (travelhistory.value == 1) {
         document.getElementById('hidden-panel').style.display = 'block'
     } else {
         document.getElementById('hidden-panel').style.display = 'none'
     }
 }
  </script>




@endsection
