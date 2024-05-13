<!doctype html>
<html lang="en"  data-bs-theme="light" data-color-theme="Blue_Theme" coupert-item="9AF8D9A4E502F3784AD24272D81F0381" data-boxed-layout="boxed" data-card="shadow">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>


  
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
  <title>{{ config('app.name', 'ACIA') }}</title>


  <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">

  @yield('css')

  @vite([ 'resources/css/app.css','resources/js/appN.js'])

  
</head>


<body>

  <!--  Body Wrapper -->
  <div>

 
  <!--  Main wrapper -->
  <div>

    <!--  Header End -->
    <div class="" style="padding: 20px">

        @yield('content')
       
      </div>
    </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1"  aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content rounded-1">
        <div class="modal-header border-bottom">
          <input type="search" class="form-control fs-3 me-2" placeholder="Search here" id="search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          <a href="#" data-bs-dismiss="modal" class="lh-1">
            <i class="ti ti-x fs-5 ms-3"></i>
          </a>

        
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

        // // Update the state in localStorage
        // const newState = document.body.classList.contains("shrunk");
        // localStorage.setItem("isShrunk", newState);
      });
    });
  </script>







 
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

  @yield('scripts')
 
</body>

</html>