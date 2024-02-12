<!DOCTYPE html><!--
    * CoreUI - Free Bootstrap Admin Template
    * @version v4.2.2
    * @link https://coreui.io/product/free-bootstrap-admin-template/
    * Copyright (c) 2023 creativeLabs Łukasz Holeczek
    * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
    --><!-- Breadcrumb-->
    <html lang="en">
      <head>
        <base href="./">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="author" content="Łukasz Holeczek">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <title>Dictionary </title>
        <link rel="stylesheet icon" href="../../assets/img/logo.png">
        <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Vendors styles-->
        {{Html::style('vendors/simplebar/css/simplebar.css')}}
        {{-- <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css"> --}}
        {{Html::style('css/vendors/simplebar.css')}}
        {{-- <link rel="stylesheet" href="css/vendors/simplebar.css"> --}}
        <!-- Main styles for this application-->
        {{Html::style('css/style.css')}}
        {{-- <link href="css/style.css" rel="stylesheet"> --}}
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        {{Html::style('css/examples.css')}}
        {{-- <link href="css/examples.css" rel="stylesheet"> --}}
        {{-- {{Html::style('vendors/@coreui/chartjs/css/coreui-chartjs.css')}} --}}
        {{-- {{Html::style('https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.2/dist/css/coreui.min.css')}} --}}

        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
        {{-- <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.2/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-H8oVKJOQVGGCdfFNM+9gLKN0xagtq9oiNLirmijheEuqD3kItTbTvoOGgxVKqNiB" crossorigin="anonymous"> --}}
        {{-- <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet"> --}}
      </head>
      <body>
        @guest
            <div class="container-fluid vh-100 " style="background-color: #1a202c;">
                <div class="row h-100 ">
                    <p class="text-light" style="width: 100%; height:100%; display:flex; justify-content: center;
                    align-items: center; font-size: 1.125rem;color: #a0aec0;" >404 | NOT FOUND </p>
                </div>
                
            </div>
        @else
        {{-- sidebar --}}
        <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
            <div class="sidebar-brand d-none d-md-flex">
                <h1 class="sidebar-brand-full">Dictionary</h1>
                <h1 class="sidebar-brand-narrow">D</h1>
            </div>
            <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                        </svg> 
                        Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span>
                    </a>
                </li>
                {{-- -Show md-scren- --}}
                <li class="nav-item d-block d-md-none">
                    <a class="nav-link" href="{{url('users')}}">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> 
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('words')}}">
                        <svg class="nav-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-translate"></use>
                        </svg> 
                        Words
                    </a>
                </li>
                  
            </ul>
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        </div>
        {{-- endsidebar --}}
        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
          <header class="header header-sticky mb-4">
            <div class="container-fluid">
              <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
              </button>
              <a class="header-brand me-auto d-md-none" href="{{route('dashboard')}}">
                <h3 class="mt-1"> Dictionary</h3>
                </a>
              <ul class="header-nav d-none me-auto d-md-flex">
                <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('users')}}">Users</a></li>
              </ul>
              <ul class="header-nav ms-3"> 
                {{-- <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                    </svg></a>
                
                </li> --}}
                <li class="nav-item dropdown text-center">
                    <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md"><img class="avatar-img my-profile" src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../assets/img/logo.jpg'}}" alt="Profile"></div>
                        <br> 
                        @guest
                            No User
                        @else
                        <span class="s small text-capitalize">{{ Auth::user()->name }}</span>
                            
                        @endguest
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                        </div><a class="dropdown-item" href="{{url('profile')}}">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            ><svg class="icon me-2">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                            </svg>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                  </div>
                </li>
              </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                         {{ parse_url(url()->current(), PHP_URL_PATH ) }}
                    </li>
                </ol>
              </nav>
            </div>
          </header>
          {{-- body --}}
          <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                        @yield('contant')
                    
            </div>
          </div>
          {{-- endbody --}}
        </div>
        @endguest
        <!-- CoreUI and necessary plugins-->
        {{Html::script('vendors/@coreui/coreui/js/coreui.bundle.min.js')}}
        {{-- <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script> --}}
        {{Html::script('vendors/simplebar/js/simplebar.min.js')}}
        {{-- <script src="vendors/simplebar/js/simplebar.min.js"></script> --}}
        <!-- Plugins and scripts required by this view-->
        {{Html::script('vendors/chart.js/js/chart.min.js')}}
        {{-- <script src="vendors/chart.js/js/chart.min.js"></script> --}}
        {{Html::script('vendors/@coreui/chartjs/js/coreui-chartjs.js')}}
        {{-- <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script> --}}
        {{Html::script('vendors/@coreui/utils/js/coreui-utils.js')}}
        {{-- <script src="vendors/@coreui/utils/js/coreui-utils.js"></script> --}}
        {{Html::script('js/main.js')}}
        {{-- <script src="js/main.js"></script> --}}



        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()
        </script>
        
    
      </body>
    </html>