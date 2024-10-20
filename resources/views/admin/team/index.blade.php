

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800"> {{__('admin.all_teams')}} </h1>

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
 	 	<th>{{__('admin.special')}}</th>
 	 	<th>{{__('admin.action')}}</th>
 	 </tr>
      @forelse($teams as $team)
 	 <tr>
 	 	<td> {{$loop->iteration}}</td>
 	 	<td>
           <img width="100px" src="{{$team->Image_Path}}">  	 	
          </td>

            <td>  {{$team->trans_name}} </td>
            <td>  {{$team->trans_special}} </td>
            <td>
 	 		<a class="btn btn-sm btn-primary" href="{{route('admin.team.edit', $team->id)}}"> <i class="fas fa-edit"></i> </a>

 	 		<form class="d-inline" action="{{route('admin.team.destroy', $team->id)}}" method="POST">
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

 {{$teams->links()}}
@endsection

@section('title', 'Dashboard')

