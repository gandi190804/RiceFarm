<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title  -->
    <title>RiceFarm | User Profile</title>
    <link rel="shortcut icon" href="assets/img/logo tanpa bg.png" type="image/x-icon">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/lib/bootstrap.min.css" rel="stylesheet">

    <!-- LIB -->
    <link href="assets/lib/animate.css" rel="stylesheet">
    <link href="assets/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/lib/validnavs.css" rel="stylesheet">

    <!-- CSS -->
    <link href="assets/css/catatan.css" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css">


</head>

<body>
    <!-- Preloader Start -->
    <div class="se-pre-con"></div>

    <!-- Header -->
    <header>
        <!-- Navigation -->
        <nav class="navbar mobile-sidenav inc-shape navbar-common navbar-sticky navbar-default validnavs">
            <div class="container-full d-flex justify-content-between align-items-center">
                <!-- Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/img/logo tanpa bg.png" class="logo" alt="Logo" height="300px">
                    </a>
                </div>
                <!-- Collect the nav links -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>

                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav1">
                            <a href="/" class="dropdown-toggle" data-toggle="dropdown"><span class="fi fi-br-home">
                                    Home</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="fi fi-bs-book-spells">Penjadwalan</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/addschedulinges">Buat Penjadwalan</a></li>
                                <li><a href="/schedules">Lihat Penjadwalan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="fi fi-bs-book-spells">Pencatatan</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/financials">Catat Keuangan</a></li>
                            </ul>
                        </li>
                        <li class="nav1">
                            <a href="/articles" class="dropdown-toggle" data-toggle="dropdown"><span
                                    class="fi fi-bs-book-spells">
                                    Artikel</span></a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="container mt-5"> -->
                <div class="navright" style="right: 0; justify-content: end">
                </div>
            </div>
            </div>
            <!-- /.navbar-collapse -->
            <div class="attr-right">
            </div>
            <!-- Main Nav -->
            </div>
            <!-- Overlay screen for menu -->
            <div class="overlay-screen"></div>
            <!-- End Overlay screen for menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->

    <!-- Home page -->
    <div class="navigation-circle text-light text-center banner-style-three-area zoom-effect overflow-hidden">
        <div class="contact-area bg-gray default-padding"
            style="background-color: #A7C4BC; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
            <div class=" container">
                <div class="row align-center">
                    <div class="col-tact-style-one">
                        <div class="contact-form-style-one">
                            <div class="row align-items-center">
                                <div class="border-0 mb-4">
                                    <h1 class="judul"
                                        style="color: #000; font-weight: bold; margin-bottom: 20px; padding-bottom: 20px;">
                                        Halo, {{auth()->user()->username}}!
                                    </h1>
                                    <div
                                        class="dropdown user-profile ml-2 ml-sm-3 d-flex flex-column align-items-center zindex-popover">
                                        <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
                                            data-bs-toggle="dropdown" data-bs-display="static">
                                            <img class="avatar lg rounded-circle img-thumbnail"
                                                src="{{asset('assets/img/profile.jpg')}}" alt="profile"
                                                style="width: 40%; height: 40%; margin-top: 10px;">
                                        </a>
                                    </div>
                                    <div class="container mt-5" style="padding-left: 150px; padding-right: 150px;">
                                        <h2>User Profile</h2>
                                        <form id="userProfileForm">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="text-align: left;">Email</th>
                                                        <td style="text-align: left;">{{auth()->user()->email}}</td>
                                                        <td>
                                                            <ul class="nav1" style="padding: 0; margin-left: 70%;">
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" style="text-align: left;">Username</th>
                                                        <td style="text-align: left;">{{auth()->user()->username}}</td>
                                                        <td>
                                                            <ul class="nav1" style="padding: 0; margin-left: 70%;">
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" style="text-align: left;">Password</th>
                                                        <td style="text-align: left;">{{auth()->user()->password}}</td>
                                                        <td>
                                                            <ul class="nav1" style="padding: 0;  margin-left: 70%;">
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-primary" id="saveChangesBtn"
                                                data-bs-toggle="modal" data-bs-target="#modal-report"
                                                class="btn btn-primary py-2 px-5 btn-set-task w-sm-100">
                                                Edit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @if(auth()->check())
                                <li style="left: 300px;">
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button class="logout-button" style="top: -25px; background-color: red;">
                                            <a style="color: white;">Keluar</a>
                                        </button>
                                    </form>
                                </li>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End homepage -->

    <!-- Modal update user -->
    <form action="{{ route('updateUser') }}" method="POST" class="contact-form contact-form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="result"></div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ auth()->user()->email}}">
                            <input type="hidden" id="id" name="id" value="{{auth()->user()->id}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                value="{{ auth()->user()->username}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password"
                                value="{{ auth()->user()->password}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button wire:click="updateUser" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Start Footer  -->
    <footer class="bg-dark text-light" style="background-image: url(assets/img/shape/brush-down.png);">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">

                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 item">
                        <div class="footer-item about">
                            <img class="logo" src="assets/img/logo tanpa bg.png" alt="Logo" style="height: 300px;">
                        </div>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 item">
                        <div class="footer-item link">
                            <h4 class="widget-title">Tautan Cepat</h4>
                            <ul>
                                <li>
                                    <a href="/">Utama</a>
                                </li>
                                <li>
                                    <a href="/addschedulinges">Buat Penjadwalan Penanaman</a>
                                </li>
                                <li>
                                    <a href="/schedules">Lihat Penjadwalan Penanaman</a>
                                </li>
                                <li>
                                    <a href="/financials">Buat Pencatatan Keuangan</a>
                                </li>
                                <li>
                                    <a href="/articles">Artikel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <p>&copy; 2023. RiceFarm. Seluruh Hak Cipta.</p>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
        </div>
        <div class="shape-right-bottom">
            <img src="assets/img/shape/1.png" alt="Image Not Found">
        </div>
        <div class="shape-left-bottom">
            <img src="assets/img/shape/2.png" alt="Image Not Found">
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/circle-progress.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/jquery.scrolla.min.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/loopcounter.js"></script>
    <script src="assets/js/validnavs.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function () {
            $('.edit').click(function () {
                var id = $(this).data('id');

                // Cetak nilai id ke konsol log
                console.log(id);

                $.ajax({
                    url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/getUserById?id=' +
                        id,
                    type: 'GET',
                    success: function (res) {
                        var data = res[0]; // Use 'res' instead of 'data'
                        $('#modal-report').modal('show');

                        $('#id').val(data._id);
                        $('#email').val(data.email);
                        $('#username').val(data.username);
                        $('#password').val(data.password);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });
        });

    </script>

</body>

</html>
