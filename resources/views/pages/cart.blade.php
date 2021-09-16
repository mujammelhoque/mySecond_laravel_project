@extends('layout-user.userlayout')
  
@section('content')
<div class="container mt-5">

<div class="cart-wrapper-area py-3">
		
    <div class="cart-table card mb-3">
      <div class="table-responsive card-body">
    {{-- <div class="card">
        <div class="card-body"> --}}
<table id="cart" class="table mb-0">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

            @php  $total += $details['price'] * $details['quantity'] @endphp
            @php
                $qty= App\Models\Product::find($id)->quantity;
        //    dd($qty);
            @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{asset('featuredimg/'.$details['fimage']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }} </h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $details['price'] }} tk</td>
                    <td  data-th="Quantity">

                        <?php 
                        
                        
                        // $details['quantity']=3
                             if ($details['quantity']<=$qty)
                                $details['quantity']=$qty;
                             
                                 
                            
                            ?>
                        {{-- @if ({{ $details['quantity'] }}<5)
                        {{ $details['quantity'] }}=5
                        @endif --}}
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control my-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} tk</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total {{ $total }} tk</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a class="btn btn-success" href="{{url('/example2')}}">Checkout</a>
               
            </td>
        </tr>
    </tfoot>
</table>
</div>
{{-- </div>
</div> --}}
{{-- blew cart div --}}
</div>
</div>
</div>
@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection
