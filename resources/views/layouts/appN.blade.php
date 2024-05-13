{{-- appN.blade.php --}}
<!doctype html>
<html lang="en" data-bs-theme="light" data-color-theme="Blue_Theme" coupert-item="9AF8D9A4E502F3784AD24272D81F0381"
    data-boxed-layout="boxed" data-card="shadow">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo.jpg') }}" />
    <title>{{ config('app.name', 'ACIA') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">
    @yield('css')
    @vite(['resources/css/app.css', 'resources/js/appN.js'])

</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside id="left-sidebar" class="left-sidebar with-vertical">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html"
                        class="brand-logos text-nowrap logo-img d-flex align-items-center mb-3 mb-md-0 me-md-auto">
                        <img class="me-2" src="{{ asset('assets/images/logos/logo.jpg') }}" width="32"
                            alt="" />
                        <span class="hide-menu fs-6">Province</span>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav" class="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Acceuil</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('log') }}" aria-expanded="false"
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Des Réunions</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('reuniones.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Liste Réunions</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('reuniones.create') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Ajouter Réunions</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('divisiones.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Information Des Salle</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('reuniones.calendar') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <span class="hide-menu">Calendrier</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('settings.index') }}">
                                <span>
                                    <i class="ti ti-settings"></i> 
                                </span>
                                <span class="hide-menu">Paramètres</span>
                            </a>
                        </li>                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div id="body-wrapper" class="body-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link navbar-togglers sidebartoggler nav-icon-hover-bg rounded-circle ms-n3"
                                id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        {{-- <li class="nav-item d-none d-lg-block">
            <a class="nav-link nav-icon-hover-bg rounded-circle" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="ti ti-search"></i>
            </a>
          </li> --}}

                    </ul>
                    <div class="navbar-collapse justify-content-end px-0 navbarNav" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="{{ route('profil') }}"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>

                                        <a href="{{ route('logout') }}"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block"
                                            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container">

                @yield('content')

            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const burger = document.querySelector(".navbar-togglers");
            const nav = document.querySelector("#left-sidebar");
            const headers = document.querySelector(".navbar-nav");
            const content = document.querySelector(".body-wrapper");

            // Retrieve the state from localStorage on page load
            const isShrunk = localStorage.getItem("isShrunk") === "true";

            // Apply the initial state
            if (isShrunk) {
                document.body.classList.add("shrunk");
                nav.classList.add("shrunk");
                headers.classList.add("shrunk");
                content.classList.add("shrunk");
            }

            burger.addEventListener("click", () => {
                // Toggle the shrunk class
                document.body.classList.toggle("shrunk");
                nav.classList.toggle("shrunk");
                headers.classList.toggle("shrunk");
                content.classList.toggle("shrunk");

            });
        });
    </script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')

</body>

</html>
