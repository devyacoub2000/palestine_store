

@extends('admin.master')

@section('content')
	 <h1 class="h3 mb-4 text-gray-800">All Notifications</h1>
	 <div class="list-group">
	  @foreach(Auth::user()->notifications as $item)	
	  <a href="#" class="list-group-item list-group-item-action {{$item->read_at ? '' : 'bg-light' }}" aria-current="true">
	    {{$item->data['msg']}}
	  </a>
	  @endforeach
	</div>
@endsection

@section('title', 'All Notifications')

