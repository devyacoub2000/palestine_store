

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800"> {{__('admin.edit_category')}} </h1>
 <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
        @csrf
        @method('put')

        @include('admin.categories._form')
        
        <button class="btn btn-success"> <i class="fas fa-edit"></i> {{__('admin.edit')}} </button>
 </form>

@endsection

@section('title', 'Edit Category')

