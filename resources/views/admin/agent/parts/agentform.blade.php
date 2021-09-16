@extends('admin.products.prolayout')
@section('activeagentRegister')
    active
{{-- @endsection

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
 --}}




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-light"><strong>{{ __('Register') }}</strong></div>

                <div class="card-body bg-secondary text-white">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      {{-- <input type="hidden" name="is_admin" value="1">    --}}
                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname"  type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                        <?php $dists= App\Models\District::all() ;
                        ?>

                    <div class="form-group row">
                        <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('District Name') }}</label>

                        <div class="col-md-6">
                            <select  id="district"  class="form-control @error('district_id') is-invalid @enderror" name="district_id" value="{{ old('district_id') }}" required autocomplete="district_id" autofocus>
                                
                                <option value="-1">select one...</option>
                            @forelse ($dists as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                            @empty
                                <option value="-1">No category Found</option>
                            @endforelse
                                
                            </select>

                            @error('cat_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                <div class="form-group row">
                    <label for="subdist_id" class="col-md-4 col-form-label text-md-right">{{ __('Sub District') }}</label>

                    <div class="col-md-6">
                        <select  id="subdistricts"  class="form-control @error('subdist_id') is-invalid @enderror" name="subdist_id" value="{{ old('subdist_id') }}" required autocomplete="cat_group" autofocus>
{{--                                     
                            <option value="-1">select one...</option> --}}
                        {{-- @forelse ($cats as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @empty
                            <option value="-1">No category Found</option>
                        @endforelse--}}
                            
                        </select> 

                        @error('cat_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                    <div class="form-group row">
                        <label for="union_id" class="col-md-4 col-form-label text-md-right">{{ __('Union/oward') }}</label>

                        <div class="col-md-6">
                            <select  id="unions"  class="form-control @error('union_id') is-invalid @enderror" name="union_id" value="{{ old('union_id') }}" required autocomplete="union_id" autofocus>
                                
                                <option value="-1">select one...</option>
                            {{-- @forelse ($cats as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @empty
                                <option value="-1">No category Found</option>
                            @endforelse --}}
                                
                            </select>

                            @error('cat_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="currentaddr" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                       

                                <textarea id="currentaddr"  class="form-control @error('currentaddr') is-invalid @enderror" name="currentaddr" value="{{ old('currentaddr') }}" required autocomplete="currentaddr" autofocus ></textarea>

                                @error('currentaddr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <input type="hidden" name="is_admin" value="1">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type=text/javascript>
    $('#district').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('/getagentdistrict')}}?district="+categoryID,
        success:function(res){        
        if(res){
          $("#subdistricts").empty();
          $("#subdistricts").append('<option>Select one..</option>');
          $.each(res,function(key,value){
              
            $("#subdistricts").append('<option value="'+key+'">'+value+'</option>');
          });
        
        }else{
          $("#subdistricts").empty();
        }
        }
      });
    }else{
      $("#subdistricts").empty();
 
    }   
    });

  </script> 
{{-- 
<script type=text/javascript>

    $('.district').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('/service-cost')}}?district="+categoryID,
        success:function(res){        
        if(res){
          $("#grosstotal").empty();
        //   $("#grosstotal").append('<option>Select one..</option>');

          $.each(res,function(key,value){
              var a = value+{{$total}}
            $("#grosstotal").append(' <em class="text-danger">Your shipping charge </em><strong >'+value+' tk<strong> ','<input type="hidden" name="total" class="form-control" readonly value="'+a+'">');
          });
        
        }else{
          $("#grosstotal").empty();
        }
        }
      });
    }else{
      $("#grosstotal").empty();
 
    }   
    });

  </script>  --}}
  {{-- b.this for union selection --}}

<script type=text/javascript>

    $('#subdistricts').change(function(){
    var categoryID = $(this).val();  
    if(categoryID){
      $.ajax({
        type:"GET",
        url:"{{url('/agentunions')}}?district="+categoryID,
        success:function(res){        
        if(res){
          $("#unions").empty();
        //   $("#grosstotal").append('<option>Select one..</option>');

          $.each(res,function(key,value){
            $("#unions").append('<option value="'+key+'">'+value+'</option>');
          });
        
        }else{
          $("#unions").empty();
        }
        }
      });
    }else{
      $("#unions").empty();
 
    }   
    });

  </script>  



@endsection
