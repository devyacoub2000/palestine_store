

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">All Categories </h1>

   @if(session('msg'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
 	 	<th>{{__('admin.product_account')}}</th>
 	 	<th>{{__('admin.action')}}</th>
 	 </tr>
      @forelse($categories as $category)
 	 <tr>
 	 	<td> {{$loop->iteration}}</td>
 	 	<td>
 	 	  <!--  @if($category->image)
 	 	        <img width="200px" src="{{asset('images/'.$category->image->path)}}"> 
 	 	   @endif -->
           <img width="100px" src="{{$category->img_path}}">  	 	
       </td>
 	 	<td> {{$category->trans_name}}</td>
 	 	@if($category->products_count > 0)
 	 	<td> {{$category->products_count}}</td>
 	 	@else
 	 	<td> There is no Products  </td>
 	 	@endif
 	 	<td>
            
 	 		<a class="btn btn-sm btn-primary" href="{{route('admin.categories.edit', $category->id)}}"> <i class="fas fa-edit"></i> </a>

 	 		<form class="d-inline" action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
 	 			@csrf
 	 			@method('DELETE')

 	 			<button onclick="return confirm('Are You Sure ?!')" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>

 	 		</form>
 	 		
 	 	</td>
 	 </tr>
 	  @empty
 	   <tr>
 	   	  <td colspan="5" class="text-center"> No Data Found </td>
 	   </tr>

 	  @endforelse

 </table>

 {{$categories->links()}}
@endsection

@section('title', 'Dashboard')

