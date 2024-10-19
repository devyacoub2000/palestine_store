

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">All Orders </h1>

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
 	 	<th>{{__('admin.total')}}</th>
 	 	<th>Created At</th>
 	 	<th>{{__('admin.action')}}</th>
 	 </tr>
       @forelse($orders as $order)
 	     <tr> 
 	     	<td>{{$loop->iteration}}</td>
 	     	<td> {{$order->user->name}} </td>
 	     	<td> ${{$order->total}}</td>
            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
 	     	<td>
 	     	   <a class="btn btn-info" href="{{route('admin.single_order', $order->id)}}">
                        <i class="fas fa-eye"></i>
 	     	    </a>	   
 	     	</td>
 	     </tr>
 	  @empty
 	   <tr>
 	   	  <td colspan="5" class="text-center"> No Data Found </td>
 	   </tr>

 	  @endforelse

 </table>

 {{$orders->links()}}
@endsection

@section('title', 'Dashboard')

