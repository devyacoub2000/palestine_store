<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title> @yield('title', env('APP_NAME')) </title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/templatemo-hexashop.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    @yield('css')

    <style type="text/css">
        #products .item .down-content h4 a {
            color: inherit;
        }
    </style>

    @if(app()->currentLocale() == 'ar') 
        <style type="text/css">
            body {
                direction: rtl;
                text-align: right;
            }
           .header-area .main-nav .logo  {
              float: right;
           } 

          .header-area .main-nav .nav {
            float: left;
          } 
          .header-area .main-nav .nav li a  {
            letter-spacing: 0px;
          }
        </style>
    @endif
    
    </head>

    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{asset('assets/images/logo.png')}}">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{route('front.index')}}" 
                                {{request()->routeIs('front.index') ? 'class=active' : ''}}>  
                               {{ __('front.home')}} 
                            </a>
                            </li>

                            <li class="scroll-to-section"><a href="{{route('front.about')}}" {{request()->routeIs('front.about') ? 'class=active' : ''}} >
                               {{ __('front.about')}} 
                                
                            </a>
                            </li>

                            <li class="scroll-to-section"><a href="{{route('front.products')}}" {{request()->routeIs('front.products') ? 'class=active' : ''}} >
                               {{ __('front.products')}} 
                                
                            </a></li>
                            @auth
                            <li class="scroll-to-section"><a href="{{route('front.mycart')}}" {{request()->routeIs('front.mycart') ? 'class=active' : ''}} >
                               {{ __('admin.cart')}} [{{$carts->Count()}}]
                                
                            </a></li>
                            @endauth
                            
                            
                            <li class="submenu">
                                <a href="javascript:;">
                                  {{ __('front.cat')}}    
                                </a>
                                <ul>
                                    @foreach(\App\Models\Category::latest('id')->get() as $item) 
                                     <li>
                                    <a href="{{route('front.category', $item->id)}}">{{$item->trans_name}}</a>
                                     </li>
                                    @endforeach
                                    
                                </ul>
                            </li>
                           
                            <li class="scroll-to-section"><a href="{{route('front.contact')}}" {{request()->routeIs('front.contact') ? 'class=active' : ''}}>
                               {{ __('front.contact')}} 
                             </a></li>
                             @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties) 
                             @if(app()->getLocale() != $localeCode) 
                                <li class="scroll-to-section"><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                   {{ $properties['native'] }} 
                               </a>
                               </li>
                             @endif

                            @endforeach

                            @guest
                            <li class="scroll-to-section">
                                <a href="{{route('login')}}">
                                    Login
                                </a>
                            </li>
                            @endguest

                            @auth
                            <li class="scroll-to-section">
                                <form method="post" action="{{route('logout')}}">
                                     @csrf
                                     <button class="btn btn-danger"> Logout</button>
                                </form>
                            </li>
                            @endauth
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
        
        @yield('content')

    <!-- ***** Kids Area Ends ***** -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="{{asset('assets/images/white-logo.png')}}" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li>
                            <li><a href="#">hexashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>

                        <br>Distributed By: <a href="https://themewagon.com" target="_blank" title="free & premium responsive templates">ThemeWagon</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/js/accordions.js')}}"></script>
    <script src="{{asset('assets/js/datepicker.js')}}"></script>
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/imgfix.min.js')}}"></script> 
    <script src="{{asset('assets/js/slick.js')}}"></script> 
    <script src="{{asset('assets/js/lightbox.js')}}"></script> 
    <script src="{{asset('assets/js/isotope.js')}}"></script> 
    
    <!-- Global Init -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

    @yield('js')

  </body>
</html>