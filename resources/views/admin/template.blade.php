<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('/assets/images/favicon-32x32.png" type="image/png')}}" />
  <!--plugins-->
    @include('admin.partials.css')
    <title>
        @lang("global.app.title")
    </title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-icon fs-3">
              <i class="bi bi-list"></i>
            </div>

            <div class="top-navbar-right ms-auto">
                <ul class="navbar-nav align-items-center">

                </ul>
            </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
            @include('admin.partials.sidebar')
       <!--end sidebar -->
       <!--start content-->
       <main class="page-content">
                {{-- <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
                    <div class="col"> --}}
                        @yield('content')
                    {{-- </div>
                </div> --}}
            </main>
  </div>
  <!--end wrapper-->


<!-- Bootstrap bundle JS -->
  @include('admin.partials.js')
  @yield('script')

</body>

</html>
