    

    @extends('front.master')
    @section('title', 'Category')
    @section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{$category->trans_name}}</h2>
                        <span>{{$category->trans_description}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products ({{$category->products->count()}})</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($products as $product) 
                 @include('front.parts.item')
                @endforeach
             {{$products->links()}}
                
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
    @endsection
  