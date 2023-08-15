<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    @include('admin.partials.css')

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

    <title>Snacked - Bootstrap 5 Admin Template</title>
</head>

<body>

  <!--start wrapper-->
    <div class="wrapper">

       <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">
                    <div class="card shadow rounded-0 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/error/login-img.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title">Sign In</h5>
                                    <p class="card-text mb-5">Silahkan Login untuk dapatkan Akses   </p>
                                    @if ($password_wrong = Session::get('password_wrong'))
                                        <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $password_wrong }}</strong>
                                        </div>
                                    @endif
                                    <form class="form-body" action="{{ route('admin.auth.login') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Username</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="lni lni-user"></i></div>
                                                    <input type="text" class="form-control radius-30 ps-5" id="inputEmailAddress" placeholder="Username" name="name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Enter Password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

       <!--end page main-->

    </div>
  <!--end wrapper-->


  <!--plugins-->
  {{-- <script src="{{ asset('assets/js/jquery.min.js"></script>
  <script src="{{ asset('assets/js/pace.min.js"></script> --}}
  @include('admin.partials.js')


</body>

</html>
