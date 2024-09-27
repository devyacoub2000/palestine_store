

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800"> Edit Team </h1>

 <form action="{{route('admin.team.update', $team->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                 <div class="mb-3">
                    <label for="name_en"> Name English </label>  
                    <input type="text" name="name_en" placeholder="Name English: " class="form-control @error('name_en') is-invalid @enderror" id="name_en" value="{{old('name_en', $team->name_en)}}">   
                    @error('name_en') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>

            <div class="col-md-6">
                 <div class="mb-3">
                    <label for="name_ar"> Name Arabic </label>  
                    <input type="text" name="name_ar" placeholder="Name Arabic: " class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" value="{{old('name_ar', $team->name_ar)}}">   
                    @error('name_ar') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>


            <div class="col-md-6">
                 <div class="mb-3">
                    <label for="special_en"> Special English </label>  
                    <input type="text" name="special_en" placeholder="Special English: " class="form-control @error('special_en') is-invalid @enderror" id="special_en" value="{{old('special_en', $team->special_en)}}">   
                    @error('special_en') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>


             <div class="col-md-6">
                 <div class="mb-3">
                    <label for="special_ar"> Special Arabic </label>  
                    <input type="text" name="special_ar" placeholder="Special Arabic: " class="form-control @error('special_ar') is-invalid @enderror" id="special_ar" value="{{old('special_ar', $team->special_ar)}}">   
                    @error('special_ar') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>
        </div>

        <div class="mb-3">
             <input onchange="showImg(event)" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
             @error('image') 
                <small class="invalid-feedback"> {{$message}} </small>
             @enderror
             @php 
                $url = ''; 
               if($team->image) {
                  $url = $team->Image_Path; 
               }
             @endphp
             <img src="{{$url}}" id="preview" width="80px">
        </div>
        

        <button class="btn btn-success"> <i class="fas fa-edit"></i> save </button>
 </form>

@endsection

@section('title', 'Add Team')

 @section('js')
     <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
 @endsection
