
<style type="text/css">
    .stars li div{
        display: flex;
        justify-content: center;
    }
</style>

<div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{route('front.single_product', $product->id)}}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img height="300px" style="object-fit: cover;" src="{{$product->Img_Path}}" alt="">
                        </div>

                        <div class="down-content">
                            <h4><a href="">{{$product->trans_name}}</a></h4>
                            <span>${{$product->price}}</span>
                            <ul class="stars">        
                                 
                 @foreach($product->reviews()->limit(3)->latest('id')->get() as $review)
               
                 <li>       
                    <div>
                        <p>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->star)
                                    <div class="star">
                                       <span style="color:gold;">&#9733;</span> 
                                    </div> <!-- Filled star -->
                                @else
                                    <div class="star">
                                      <span>&#9734;</span>
                                    </div>  <!-- Empty star -->
                                @endif
                            @endfor
                        </p>
                    </div>
                     </li>
                     
                     @endforeach
                       
                             
                            </ul>
                        </div>
                    </div>
                </div>


























