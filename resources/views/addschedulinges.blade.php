<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title  -->
    <title>RiceFarm | Penjadwalan</title>
    <link rel="shortcut icon" href="/assets/img/logo tanpa bg.png" type="image/x-icon">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/lib/bootstrap.min.css" rel="stylesheet">

    <!-- LIB -->
    <link href="assets/lib/animate.css" rel="stylesheet">
    <link href="assets/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/lib/validnavs.css" rel="stylesheet">

    <!-- CSS -->
    <link href="/assets/css/jadwal.css" rel="stylesheet">

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
                        <img src="\assets/img/logo tanpa bg.png" class="logo" alt="Logo" height="300px">
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
                        @guest
                        <!-- Tampilkan tombol Daftar jika pengguna belum login -->
                        <li class="nav1" style="left: 320px;">
                            <a href="/register"><span class="signup-button">Daftar</span></a>
                        </li>
                        @endguest

                        @auth
                        <!-- Tidak menampilkan tombol Daftar jika pengguna sudah login -->
                        @else
                        <!-- Tampilkan tombol login jika pengguna belum login -->
                        <li class="nav1" style="left: 300px;">
                            <a href="/login"><span class="login-button">Masuk</span></a>
                        </li>
                        @endauth
                    </ul>

                </div>
                <div class="navright" style="right: 0; justify-content: end">
                    @if(auth()->check())
                    <!-- Tombol profil hanya muncul jika pengguna sudah login -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/userprofile">
                            <img class="avatar lg rounded-circle img-thumbnail"
                                src="{{asset('assets/img/profile.jpg')}}" alt="profile">
                        </a>
                    </div>
                    @endif
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
    <!-- End Header -->

    <!-- HOME PAGE -->
    <div class="navigation-circle text-light text-center banner-style-three-area zoom-effect overflow-hidden">
        <div class="contact-area bg-gray default-padding" style="background-color: #A7C4BC;">
            <div class="container">
                <div class="row align-center">
                    <div class="col-tact-style-one">
                        <div class="contact-form-style-one">
                            <h4 class="sub-title" style="color: #49A760;">Ayo Buat</h4>
                            <h1 class="judul"
                                style="color: #000; font-weight: bold; margin-bottom: 20px; padding-bottom: 20px;">
                                PenjadwalanMu!</h1>
                            <form action="/save-Penjadwalan" method='POST' enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="namaPenjadwalan" name="namaPenjadwalan"
                                                placeholder="Nama penjadwalan" type="text" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="tanggal" name="tanggal"
                                                placeholder="Tanggal  mulai" type="date" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="jenisPadi" name="jenisPadi"
                                                placeholder="Jenis padi" type="text" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="luasLahan" name="luasLahan"
                                                placeholder="Luas lahan" type="number" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="musim" name="musim" placeholder="Musim"
                                                type="text" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" id="catatan" name="catatan"
                                                placeholder="Catatan" type="text" style="padding-bottom: 100px;">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col-lg-12">
                                        <button type="submit"
                                            style="background-color: #1f4e3d; display: inline-block; padding: 10px 20px; color: #fff; text-decoration: none; border-radius: 4px;">Simpan</button>
                                    </div>
                                </div>
                                <form>
                                    <div class="col-lg-12 alert-notification">
                                        <div id="message" class="alert-msg"></div>
                                    </div>
                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HOMEPAGE -->

    <!-- Start Footer  -->
    <footer class="bg-dark text-light" style="background-image: url(assets/img/shape/brush-down.png);">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">

                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-6 item">
                        <div class="footer-item about">
                            <img class="logo" src="\assets/img/logo tanpa bg.png" alt="Logo" style="height: 300px;">
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
    <script src="\assets/js/jquery-3.6.0.min.js"></script>
    <script src="\assets/js/bootstrap.bundle.min.js"></script>
    <script src="\assets/js/jquery.appear.js"></script>
    <script src="\assets/js/jquery.easing.min.js"></script>
    <script src="\assets/js/jquery.magnific-popup.min.js"></script>
    <script src="\assets/js/modernizr.custom.13711.js"></script>
    <script src="\assets/js/swiper-bundle.min.js"></script>
    <script src="\assets/js/wow.min.js"></script>
    <script src="\assets/js/progress-bar.min.js"></script>
    <script src="\assets/js/circle-progress.js"></script>
    <script src="\assets/js/isotope.pkgd.min.js"></script>
    <script src="\assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="\assets/js/jquery.nice-select.min.js"></script>
    <script src="\assets/js/count-to.js"></script>
    <script src="\assets/js/jquery.scrolla.min.js"></script>
    <script src="\assets/js/YTPlayer.min.js"></script>
    <script src="\assets/js/TweenMax.min.js"></script>
    <script src="\assets/js/loopcounter.js"></script>
    <script src="\assets/js/validnavs.js"></script>
    <script src="\assets/js/main.js"></script>


</body>

</html>
