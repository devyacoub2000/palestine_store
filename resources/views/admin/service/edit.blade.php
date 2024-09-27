

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Edit Service </h1>

 <form action="{{route('admin.service.update', $service->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                 <div class="mb-3">
                    <label for="name_en"> Name English </label>  
                    <input type="text" name="name_en" placeholder="Name English: " class="form-control @error('name_en') is-invalid @enderror" id="name_en" value="{{old('name_en', $service->name_en)}}">   
                    @error('name_en') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>

            <div class="col-md-6">
                 <div class="mb-3">
                    <label for="name_ar"> Name Arabic </label>  
                    <input type="text" name="name_ar" placeholder="Name Arabic: " class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" value="{{old('name_ar', $service->name_ar)}}">   
                    @error('name_ar') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>


            <div class="col-md-6">
                 <div class="mb-3">
                    <label for="body_en"> Description English </label>  
                    <textarea rows="4"  name="body_en" id="body_en" class="form-control @error('body_en') is-invalid @enderror" placeholder="Description English: ">
                        {{old('body_en', $service->body_en)}}
                    </textarea>
                     
                    @error('body_en') 
                     <small class="invalid-feedback"> {{$message}} </small>
                    @enderror  
                 </div>
            </div>


              <div class="col-md-6">
                 <div class="mb-3">
                    <label for="body_ar"> Description Arabic </label>  
                    <textarea rows="4"  name="body_ar" id="body_ar" class="form-control @error('body_ar') is-invalid @enderror" placeholder="Description Arabic: ">
                        {{old('body_ar', $service->body_ar)}}
                    </textarea>
                     
                    @error('body_ar') 
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
               if($service->image) {
                 $url = $service->Image_Path;
               } 
             @endphp
             <img src="{{$url}}" id="preview" width="80px">
        </div>
        

        <button class="btn btn-success"> <i class="fas fa-edit"></i> Save </button>
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
