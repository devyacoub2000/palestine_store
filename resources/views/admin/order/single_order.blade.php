

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Orders Details </h1>

   @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
		{{session('msg')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	   </div>
  @endif 
 <table class="table table-bordered table-hover">
 	 <tr class="bg-dark text-white">
 	 	<th>#</th> 
 	 	<th>{{__('admin.name')}}</th>
 	 	<th>{{__('admin.product')}}</th>
 	 	<th>{{__('admin.price')}}</th>
 	 	<th>{{__('admin.quantity')}}</th>
 	 	<th>{{__('admin.total')}}</th>
 	 </tr>
 	 @foreach($order->order_details as $order)
     <tr>
     	<td>{{$loop->iteration}}</td>
     	<td>{{$order->user->name}}</td>
     	<td>{{$order->product->trans_name}}</td>
     	<td>{{$order->price}}</td>
     	<td>{{$order->quantity}}</td>
     	<td>{{$order->total}}</td>
     </tr> 
     @endforeach
      
       <td colspan="6"> Final Total:  ${{$order->order->total}} </td>
      </table>

@endsection

@section('title', 'Dashboard')

