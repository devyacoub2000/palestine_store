

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Add New Product </h1>
  
    @if(session('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
    @endif

 <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">
           <div class="col-md-6">
               <div class="mb-3">
               <label for="name_en"> English Name </label> 
               <input name="name_en" class="form-control @error('name_en') is-invalid @enderror" type="text" placeholder="English Name"  id="name_en" value="{{old('name_en', $product->name_en)}}">
               @error('name_en') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
           </div>
       
           <div class="col-md-6">
                <div class="mb-3">
               <label for="name_ar"> Arabic Name </label> 
               <input name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" type="text" placeholder="Arabic Name"  id="name_ar" value="{{old('name_ar', $product->name_ar)}}">
               @error('name_ar') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
           </div>
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
               <label for="image"> Image </label> 
               <input type="file" name="image" onchange="showImg(event)"  class="form-control @error('image') is-invalid @enderror" id="image" >
               @error('image') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
                <img src="" id="preview" width="80px">
         </div>
        </div>

        <div class="col-md-6">
              <div class="mb-3">
               <label for="galary"> Galary </label> 
               <input type="file" name="galary[]" multiple class="form-control @error('galary') is-invalid @enderror" id="galary" >
               @error('galary') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
         </div>
        </div>
        </div>

         <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
               <label for="description_en"> English Description </label> 
               <textarea  class="form-control @error('description_en') is-invalid @enderror" type="text" name="description_en" placeholder="English Description Category: " id="description_en" rows="4">
                    {{old('description_en', $product->description_en)}}
               </textarea>
               @error('description_en') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
            </div>
            </div>

             <div class="col-md-6">
                <div class="mb-3">
               <label for="description_ar"> Arabic Description </label> 
               <textarea  class="form-control @error('description_ar') is-invalid @enderror" type="text" name="description_ar" placeholder="Arabic Description Category: " id="description_ar" rows="4">
                    {{old('description_ar', $product->description_ar)}}
               </textarea>
               @error('description_ar') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
        </div>
            </div>
        </div>

        <div class="row">
             <div class="col-md-4">
            <div class="mb-3">
            <label for="price">Price</label>
            <input type="number"  id="price" name="price" class="form-control @error('price') is-invalid @enderror"
            placeholder="Price Product: " value="{{old('price')}}">
            
            @error('price') 
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
           </div>
           </div> 

           <div class="col-md-4">
             <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
            placeholder="quantity Product: " value="{{old('quantity')}}">
            
            @error('quantity') 
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
           </div>

           </div>


           <div class="col-md-4">
               <div class="mb-3">
            <label for="category">Category</label>
            <select id="quantity" name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{old('category_id')}}">
                @foreach ($categories as $category)
                     <option value="{{$category->id}}"> {{$category->trans_name}}</option>
                @endforeach 
            </select>    
            
            @error('category_id') 
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
           </div>
       </div>
        </div>
      

        <button class="btn btn-success"> <i class="fas fa-save"></i> Add </button>
 </form>

@endsection

@section('title', 'Add Product')

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
