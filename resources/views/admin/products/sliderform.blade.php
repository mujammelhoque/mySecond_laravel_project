@extends('admin.products.prolayout')
  
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Slider</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
        </div>
    </div>
</div>
     
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
     
<form action="{{ url('/sliderstore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image 1</strong>
                <input type="file" name="image1" class="form-control" placeholder="Insert image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title 1:</strong>
                <input type="text" name="title1" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong> Short Description 1:</strong>
                <textarea name="desc1" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image 2</strong>
                <input type="file" name="image2" class="form-control" placeholder="Insert image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title 2:</strong>
                <input type="text" name="title2" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong>Short Description 2:</strong>
                <textarea name="desc2" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image 3</strong>
                <input type="file" name="image3" class="form-control" placeholder="Insert image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title 3:</strong>
                <input type="text" name="title3" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong>Short Description 3:</strong>
                <textarea name="desc3" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{-- <input type="text" name="status"  placeholder="write 0 or 1"> --}}
                <select name="status" class="form-control">
                    <option value="-1">Choose one..</option>
                    <option value="1">Active</option>
                    <option value="-1">Inactive</option>

                </select>
            </div>
        </div>

       

       
        
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3 mb-4">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>


@endsection
