

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">{{__('admin.all_products')}} </h1>

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
 	 	<th>{{__('admin.image')}}</th>
 	 	<th>{{__('admin.name')}}</th>
 	 	<th>${{__('admin.price')}}</th>
 	 	<th>{{__('admin.quantity')}}</th>
 	 	<th>{{__('admin.category')}}</th>
 	 	<th>{{__('admin.action')}}</th>
 	 </tr>
      @forelse($products as $product)
 	 <tr>
 	 	<td> {{$loop->iteration}}</td>
 	 	<td> <img width="200" src="{{$product->img_path}}"></td>
 	 	<td>{{$product->trans_name}}</td>
 	 	<td>{{$product->price}}</td>
 	 	<td>{{$product->quantity}}</td>
 	 	<td>{{$product->category->trans_name}}</td>
 	 	<td>
            
 	 		<a class="btn btn-sm btn-primary" href="{{route('admin.products.edit', $product->id)}}"> <i class="fas fa-edit"></i> </a>

 	 		<form class="d-inline" action="{{route('admin.products.destroy', $product->id)}}" method="POST">
 	 			@csrf
 	 			@method('DELETE')

 	 			<button onclick="return confirm('Are You Sure ?!')" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>

 	 		</form>
 	 		
 	 	</td>
 	 </tr>
 	  @empty
 	   <tr>
 	   	  <td colspan="10" class="text-center"> No Data Found </td>
 	   </tr>

 	  @endforelse

 </table>

 {{$products->links()}}
@endsection

@section('title', 'All Products')

