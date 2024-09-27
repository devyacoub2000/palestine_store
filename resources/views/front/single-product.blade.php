
    

    @extends('front.master')
    
    @section('title', 'Product ' .$product->trans_name)
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
                    <span class="price" data-price="{{$product->price}}">${{$product->price}}</span>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span> {{$product->trans_description}} </span>
                   
                    <div class="quantity-content">
                        <div class="left-content">
                           
                            <h6>No. of Orders</h6>
                            
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <h4>Total: $<b class="final">{{$product->price}}</b></h4>
                        <div class="main-border-button"><a href="#">Add To Cart</a></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
     
    @endsection

    @section('js') 
         
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
     