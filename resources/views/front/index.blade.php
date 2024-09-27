   

     @extends('front.master')

     @section('title', 'Home Page')

     @section('content') 

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are Hexashop</h4>
                                <span>Awesome, clean &amp; creative HTML5 Template</span>
                                <div class="main-border-button">
                                    <a href="{{route('front.products')}}">Purchase Now!</a>
                                </div>
                            </div>
                            <img src="{{asset('assets/images/left-banner-image.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                           @foreach($categories as $cat) 
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>{{$cat->trans_name}}</h4>
                                            <span>Best Clothes For {{$cat->trans_name}}</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>{{$cat->trans_name}}</h4>
                                                <p>{{$cat->trans_description}}</p>
                                                <div class="main-border-button">
                                                    <a href="{{route('front.category', $cat->id)}}">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img height="295px;" style="object-fit: cover;" src="{{asset('images/'.$cat->image->path)}}">
                                    </div>
                                </div>
                            </div>
                           @endforeach 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    @foreach($categories as $cat)
    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>{{$cat->trans_name}}</h2>
                        <span>{{$cat->trans_description}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                           @foreach($cat->products()->latest('id')->limit(5)->get() as $product) 
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('front.single_product', $product->id)}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img style="object-fit:cover; height: 300px;" src="{{asset('images/'.$product->image->path)}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{Str::words($product->trans_name,3)}}</h4>
                                    <span>${{$product->price}}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                           @endforeach 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->
    @endforeach
    @endsection

   