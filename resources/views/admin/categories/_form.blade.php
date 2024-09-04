
       <div class="row">
           <div class="col-md-6">
               <div class="mb-3">
               <label for="name_en"> English Name </label> 
               <input name="name_en" class="form-control @error('name_en') is-invalid @enderror" type="text" placeholder="English Name"  id="name_en" value="{{old('name_en', $category->name_en)}}">
               @error('name_en') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
           </div>
       
           <div class="col-md-6">
                <div class="mb-3">
               <label for="name_ar"> Arabic Name </label> 
               <input name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" type="text" placeholder="Arabic Name"  id="name_ar" value="{{old('name_ar', $category->name_ar)}}">
               @error('name_ar') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
       </div>
             </div>


         <div class="mb-3">
               <label for="image"> Image </label> 
               <input type="file" name="image" onchange="showImg(event);" class="form-control @error('image') is-invalid @enderror" id="image" >
               @error('image') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
               @php 
                  $url = '';
                  if($category->image) {
                     $url = $category->img_path; 
                  }

               @endphp
               <img src="{{$url}}" id="preview" width="80px">
         </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
               <label for="description_en"> English Description </label> 
               <textarea  class="form-control @error('description_en') is-invalid @enderror" type="text" name="description_en" placeholder="English Description Category: " id="description_en" rows="4">
                    {{old('description_en', $category->description_en)}}
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
                    {{old('description_ar', $category->description_ar)}}
               </textarea>
               @error('description_ar') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
        </div>
            </div>
        </div>










