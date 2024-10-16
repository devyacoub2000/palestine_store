

@extends('admin.master')

@section('css')
    
     <style type="text/css">
     	.prev-img {
     		width: 200px;
     		height: 200px;
     		border-radius: 50%;
     		object-fit: cover;
     		border: 1px dashed #b8b8b8;
     		padding: 5px;
     		cursor: pointer;
     		transition: all 0.3s ease;
     	}
     	.prev-img:hover {
     		opacity: 0.8;
     	}

        .prev-change-photo {
		    display: flex;
		    position: fixed;
		    left: 0;
		    top: 0;
		    height: 100%;
		    width: 100%;
		    justify-content: center;
		    background: #413e3e57;
		    z-index: 9999;
		    align-items: center;
		    backdrop-filter: blur(8px);
		    display: none;
		}

		.prev-change-photo img {
		    border-radius: 50%;
		    width: 300px;
		    height: 300px;
		    object-fit: cover;
		}

		.password-wrapper {
			position: relative;
		}
		.password-wrapper i {
			position: absolute;
			right: 8px;
			top: 45px;
			cursor: pointer;
		}
     
     	</style>


@endsection

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Profile Page </h1>
 
  @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
		{{session('msg')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	   </div>
  @endif
 <form method="POST" action="{{route('admin.profile_data')}}" enctype="multipart/form-data">
   @csrf
   @method('put')

   <div class="prev-change-photo">
           
           <img src="http://via.placeholder.com/300x300">    
   </div>

   <div class="row">
   	  <div class="col-md-3">
   	  	   @php 
              if($admin->image) {
                	$src= asset('images/'.$admin->image->path);
              } else {
              	    $src = 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name;
              }
   	  	   @endphp
   	  	    <div class="text-center">
	   	  	   <img class="prev-img" id="prev_img" src="{{$src}}">
	   	  	   <br>
	           <label for="image" class="mt-2 btn btn-sm btn-dark"> Edit Photo</label>
	   	  	   <input onchange="return showImg(event);" type="file" name="image" id="image" style="display:none;"> 
   	  	    </div>
   	  </div>

   	
   	  <div class="col-md-9">
             
	          <div class="mb-3">
	          	  <label for="name">Name</label>
	          	  <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name', $admin->name)}}">
	          	    @error('name') 
                          
                          <small class="invalid-feedback"> {{$message}}</small>
                         
	          	    @enderror
	          </div>

	          <div class="mb-3">
	          	  <label for="email">Email</label>
	          	  <input class="form-control" type="email" value="{{old('email', $admin->email)}}" disabled>

	          </div>

              <div class="mb-3">
	          	  <label for="current_password">Current Password</label>
	          	  <input id="current" class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" >
	          	    @error('current_password') 
                          
                          <small class="invalid-feedback"> {{$message}}</small>
                         
	          	    @enderror
	          </div>

	          <div class="mb-3">
	          	  	<label for="password">New Password</label>
	          	    <input  class="form-control new @error('password') is-invalid @enderror" type="password" name="password" disabled>

	          	      @error('password') 
                          
                          <small class="invalid-feedback"> {{$message}}</small>
                         
	                   @enderror	
	          
	          </div>
	          

	           <div class="mb-3">
	          	  <label for="password_confirmation">Confirm Password</label>
	          	  <input  class="form-control new @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" disabled>
	          	    @error('password_confirmation')                           
                          <small class="invalid-feedback"> {{$message}}</small>
	          	    @enderror
	            </div>
              
	          <button class="btn btn-success"> <i class="fas fa-save"></i> Save</button>
   	  </div>

   </div>


 </form>

@endsection

@section('js') 
   
    <script type="text/javascript">
    	function showImg(e) {

    		const [file] = e.target.files;
            if(file) {
               prev_img.src = URL.createObjectURL(file);
            }

    	}

    	$('.prev-img').click(function() { 

    		let url = $(this).attr('src');
    		$('.prev-change-photo img').attr('src', url)
    		$('.prev-change-photo').css('display', 'flex') 
    	});

    	$('.prev-change-photo').click(function() {
         
            $('.prev-change-photo').hide()

    	});

    	$('#current').blur(function() {
           
            $.ajax({ 
                 url: '{{route("admin.check_password")}}',
                 type: "POST",
                 data:{
                 	_token: '{{ csrf_token() }}',
                 	password: $('#current').val()
                 },

                 success: function(res) {
                 	 if(res == true) {
                 	 	$('.new').prop('disabled', false);
                 	 	$('#current').removeClass('is-invalid')
                 	 	$('#current').addClass('is-valid')
                 	 } else {
	                 	 	$('.new').prop('disabled', true);
	                 	 	$('.new').val();
	                 	 	$('#current').removeClass('is-valid')
	                 	 	$('#current').addClass('is-invalid')
                 	 }
              }
            });



    	});

    </script>

@endsection

@section('title', 'Dashboard')
