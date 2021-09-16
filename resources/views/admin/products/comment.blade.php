@extends('admin.products.prolayout')
     
@section('comment')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Comment</h2>
            </div>
            <div class="pull-right">
             <a class="btn btn-success" href="{{ url('/') }}">Site Home</a> 
            </div>
        </div>
    </div>
    
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Product Name</th>
            <th>Comment  </th>
            <th>Date  </th>
         
          
           
            <th width="280px">Action</th>
        </tr>
        @if(isset($comments))
            
       
        @foreach ($comments as $key=> $comment)
        <tr>
            <td>{{ ++$i }}</td>
         
            <td>{{ $comment->username }}</td>
            <td>{{ $comment->proname }}</td>
            <td>{{ $comment->comment }}</td>
            {{-- <td>{{ $comment->proname }}</td> --}}
        
       
           
            <td>
                <form action="{{ url('comdel',$comment->id) }}" method="post"> 
                        @csrf
                        @method('DELETE')
                      
                       <input type="submit" class="btn btn-danger" value="delete">
                   </form>
      
            </td>
        </tr>
        @endforeach
        @endif
    </table>
    
  
        
@endsection