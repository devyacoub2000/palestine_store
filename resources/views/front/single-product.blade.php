
    

    @extends('front.master')
    
    @section('title', 'Product ' .$product->trans_name)


    @section('css')
     <style type="text/css">
        
          .rating {
            
                font-size: 30px; /* Size of the stars */
                display: flex;
            }

            .rating input {
                display: none; /* Hide the radio buttons */
            }

            .rating label {
                cursor: pointer;
                color: gray; /* Default color for empty stars */
            }

            .rating label:hover,
            .rating label:hover ~ label {
                color: gold; /* Change color on hover */
            }

            .rating input:checked ~ label {
                color: gold; /* Color for selected stars */
            }


     </style>
    @endsection
    @section('content')

    
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{$product->trans_name}}</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
  @endif        

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                   <img style="object-fit: cover;"  src="{{asset('images/'.$product->image->path)}}" alt="">
                    @if($product->galary)
                    @foreach($product->galary as $img)
                     <img style="object-fit: cover;" src="{{asset('images/'.$img->path)}}" alt="">
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{$product->trans_name}}</h4>

                    <span class="price" data-price="{{$product->price}}">${{$product->price}}
                    </span>
            <form action="{{route('front.store_rate', $product->id)}}" method="POST">
                @csrf
                 <div class="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="star" value="{{ $i }}" required>
                        <label class="star" for="star{{ $i }}" style="font-size: 30px;">&#9733;</label> 
                    @endfor
                </div>


                <label for="commnet">Review:</label>
                <textarea placeholder="Commnet here .." name="comment" id="commnet" required class="form-control mb-3"></textarea>

                <button type="submit" class="btn btn-primary"> Review</button>

            </form>
            <div id="responseMsg"></div> 



                    <h3>Average Rating: {{ $product->averageRating() }}</h3>

                    <span> {{$product->trans_description}} </span>
                   
                   
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>No. of Orders</h6>   
                            </div>
                            <div>
                            </div>

                                        
                      
                     <form action="{{route('front.mycart', $product->id)}}" method="POST">
                                @csrf
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" step="1" min="1" max="{{$product->quantity}}" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>

                        <div class="main-border-button"><button class="btn btn-info" >Add To Cart</button></div>
                     </form>
                     <   


                        <div class="total">
                            <h4>Total: $<b class="final">{{$product->price}}</b></h4>
                        </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
     
    @endsection

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script type="text/javascript">
                 // make rate using Ajax 
              
         $(document).ready(function() {

              document.getElementById('rate_product').addEventListener('submit', function(e) {
                    e.preventDefault();
               
                    var formData = new FormData(this);
                    var id = {{ $product->id }}; // تأكد من وجود $product

                    fetch(`/products/${id}/reviews`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // تأكد من إضافة CSRF Token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // عرض رسالة النجاح
                        document.getElementById('responseMsg').innerText = 'Rate Done ';
                        document.getElementById('responseMsg').style.color = 'green';
                    })
                    .catch(error => {
                        // عرض رسالة الخطأ
                        document.getElementById('responseMsg').innerText = 'error';
                        document.getElementById('responseMsg').style.color = 'red';
                    });
                });
         });     






















            </script>
            <script>
            function setRating(star) {
                const display = document.getElementById('display-star');
                display.innerHTML = ''; // Clear current display

                // Create filled stars
                for (let i = 1; i <= star; i++) {
                    display.innerHTML += '&#9733;'; // Filled star
                }

                // Create empty stars for the rest
                for (let i = star + 1; i <= 5; i++) {
                    display.innerHTML += '&#9734;'; // Empty star
                }
         }
            </script> 
         
         <script type="text/javascript">
             $('.buttons_added .minus').click(function() {                
                var quantity = parseInt($(this).parent().find('.qty').val());
                if(quantity > 1) {
                    $(this).parent().find('.qty').val(--quantity);
                }

                updateTotal();
         
             });

              $('.buttons_added .plus').click(function() {
                
                var quantity = parseInt($(this).parent().find('.qty').val());
                    $(this).parent().find('.qty').val(++quantity);

                updateTotal();

             });

              function updateTotal() {
                let price = $('span.price').data('price');
                var quantity = parseInt($('.qty').val());
                $('.final').text(price * quantity);
              }
         </script>

      
    @endsection














































































     
































































