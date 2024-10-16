<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title', env('APP_NAME')) </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('back/css/sb-admin-2.min.css')}}" rel="stylesheet">
@yield('css')

 <style type="text/css">
      
       .colors {
         width: 100px;
         position: fixed;
         right: -60px;
         top: 100px;
         display: flex;
         transition: all 0.3s ease;
       }
       .colors.open {
         right: 0px;
       }
       .colors button {
           width: 40px;
           height: 40px;
           border: 0px;
           background: #d9d9d9;
       }
       .colors ul {
         list-style: none;
         display: flex;
         margin: 0;
         padding: 0;
         flex-wrap: wrap;
         background: #e4e4e4;
         width: 60px;
         justify-content: center;
         padding: 5px 0px;
       }
       .colors ul li {
         width: 20px;
         height:  20px;
         margin: 3px; 
         cursor: pointer;   
       }

       .img-profile {
          object-fit: cover;
       }

 </style>

   @if(App::getlocale() == 'ar') 
   
      <style>

        .topbar .dropdown .dropdown-menu  {
            right: -60%;
        }
         body {
            direction: rtl;
            text-align: right;
         }
         .colors { 
            right: unset;
            left: -60px;
         }
         .colors.open {
            right: unset;
            left: 0px;
         }
         .sidebar {
            padding: 0px;
         }
         .sidebar .nav-item .nav-link {
                text-align: right;      
        }
        .sidebar .nav-item .nav-link[data-toggle=collapse]::after {  
            float: left;
            transform: rotate(180deg);
        }
        .ml-auto, .mx-auto {
             margin-left:  unset !important;
             margin-right: auto !important;
        }
    </style>
   
   @endif

</head>

<body id="page-top">


     <div class="colors">
         <button> <i class="fas fa-cog"></i></button>
        
         <ul>
             <li class="bg-gradient-primary"></li>
             <li class="bg-gradient-dark"></li>
             <li class="bg-gradient-success"></li>
             <li class="bg-gradient-info"></li>
             <li class="bg-gradient-warning"></li>
             <li class="bg-gradient-danger"></li>
         </ul>
         
     </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

          @include('admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                 <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <i class="fas fa-globe"></i> {{__('admin.langs')}}  </span>
                            
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                         @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                         <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item"> 
                          {{ $properties['native'] }}
                          </a>
                          @endforeach
                      
                          
                    </li>




                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @php 
                                   $count =  Auth::user()->unreadnotifications->count(); 
                                @endphp
                                 @if($count != 0) 
                                <span class="badge badge-danger badge-counter">
                                     @php
                                      if($count > 5) {
                                        echo $count . '+'; 
                                      } else {
                                        echo $count;
                                      }
                                      @endphp
                                    
                                </span>
                                @endif
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications Center
                                </h6>
                                @foreach(Auth::user()->notifications()->take(5)->get() as $item) 
                                <a class="dropdown-item d-flex align-items-center {{$item->read_at ? '' : 'bg-light'}}" href="{{$item->data['url']}}?id={{$item->id}}">
                                    <div>
                                        <div class="small text-gray-500">{{$item->created_at->format('F, D Y')}}</div>
                                        <span class="font-weight-bold">{{$item->data['msg']}}</span>
                                    </div>
                                </a>
                                @endforeach
                               
                                <a class="dropdown-item text-center small text-gray-500" href="{{route('admin.notifications')}}">Show All Alerts</a>
                            </div>
                        </li>



                     

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{Auth::user()->name}}
                                </span>

                               @php 
                                  if(Auth::user()->image) {
                                    $src= asset('images/'.Auth::user()->image->path);
                                  }else {
                                    $src = 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name;
                                  }
                               @endphp
                                <img class="img-profile rounded-circle"
                                    src="{{$src}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('admin.profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                
                                
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal"> 
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>{{__('admin.out')}}
                                    </a>
                              
                              
                            </div>
                        </li>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{route('logout')}}" method="POST"> 
                      @csrf
                      <button class="btn btn-primary"> {{__('admin.out')}} </button>

                    </form>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('back/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('back/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('back/js/sb-admin-2.min.js')}}"></script>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    @yield('js')

    <script type="text/javascript">
         
          document.querySelector('.colors button').onclick = () => {
            
              document.querySelector('.colors').classList.toggle('open');
          } 

          document.querySelectorAll('.colors ul li').forEach(el => {
               el.onclick = () => {
                let cl =  el.classList[0];
                document.querySelector('#sidebar_color').className = '';
                document.querySelector('#sidebar_color').classList.add(cl);
                localStorage.setItem('cl', cl);
              }

          });

          let oldclass = localStorage.getItem('cl')??'bg-gradient-primary';
          document.querySelector('#sidebar_color').classList.add(oldclass);

        
             
                       
           
          

    </script>
</body>

</html>