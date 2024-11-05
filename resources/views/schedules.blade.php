<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title  -->
    <title>RiceFarm | Penjadwalan</title>
    <link rel="shortcut icon" href="assets/img/logo tanpa bg.png" type="image/x-icon">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/lib/bootstrap.min.css" rel="stylesheet">

    <!-- LIB -->
    <link href="assets/lib/animate.css" rel="stylesheet">
    <link href="assets/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/lib/validnavs.css" rel="stylesheet">

    <!-- CSS -->
    <link href="assets/css/lihatjadwal.css" rel="stylesheet">

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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fi fi-bs-book-spells">Penjadwalan</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/addschedulinges">Buat Penjadwalan</a></li>
                                <li><a href="/schedules">Lihat Penjadwalan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fi fi-bs-book-spells">Pencatatan</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/financials">Catat Keuangan</a></li>
                            </ul>
                        </li>
                        <li class="nav1">
                            <a href="/articles" class="dropdown-toggle" data-toggle="dropdown"><span class="fi fi-bs-book-spells">
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
                            <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('assets/img/profile.jpg')}}" alt="profile">
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
    <!-- Start Blog -->
    <div class="blog-area full-blog blog-standard default-padding" style="background-color: #A7C4BC;">
        <div class="container">
            <div class="row">
                <div class="blog-content col-xl-10 offset-xl-1 col-md-12">
                    <div class="blog-item-box" style="background-color: #fff; border-radius: 10px; box-shadow: 5px 5px 10px rgba(255, 255, 255, 0.5);">
                        <!-- Single Item -->
                        <?php
                        if (auth()->check()) {
                            $username = auth()->user()->username;
                        }

                        $cUrl = curl_init();

                        $options = array(
                            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/getPenjadwalanByUsername?username=' . $username,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_RETURNTRANSFER => TRUE,
                        );

                        curl_setopt_array($cUrl, $options);

                        $response = curl_exec($cUrl);

                        // Check for cURL errors
                        if (curl_errno($cUrl)) {
                            echo 'Curl error: ' . curl_error($cUrl);
                            // Handle the error as needed
                        } else {
                            $data = json_decode($response);

                            // Check if JSON decoding was successful
                            if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
                                echo 'Error decoding JSON: ' . json_last_error_msg();
                                // Handle the error as needed
                            } else {
                                curl_close($cUrl);
                                $startDate = (empty($row->tanggal) ? '' : $row->tanggal);

                                // Calculate dates for each phase based on the start date
                                $dates = [
                                    'Pembuatan Benih' => date('d M Y', strtotime($startDate . ' + 0 days')),
                                    'Penirisan Benih' => date('d M Y', strtotime($startDate . ' + 1 days')),
                                    'Penaburan Bibit' => date('d M Y', strtotime($startDate . ' + 3 days')),
                                    'Pemindahan Bibit' => date('d M Y', strtotime($startDate . ' + 18 days')),
                                    'Pemupukan Fase 1' => date('d M Y', strtotime($startDate . ' + 25 days')),
                                    'Pembersihan Lahan' => date('d M Y', strtotime($startDate . ' + 26 days')),
                                    'Pestisida & Vitamin Fase 1' => date('d M Y', strtotime($startDate . ' + 27 days')),
                                    'Pemupukan Fase 2' => date('d M Y', strtotime($startDate . ' + 33 days')),
                                    'Pestisida & Vitamin Fase 2' => date('d M Y', strtotime($startDate . ' + 40 days')),
                                    'Pestisida & Vitamin Fase 3' => date('d M Y', strtotime($startDate . ' + 47 days')),
                                    'Pestisida & Vitamin Fase 4' => date('d M Y', strtotime($startDate . ' + 54 days')),
                                    'Panen Musim Hujan' => date('d M Y', strtotime($startDate . ' + 115 days')),
                                    'Panen Musim Kemarau' => date('d M Y', strtotime($startDate . ' + 110 days')),
                                ];

                                foreach ($data as $row) {
                                    echo '
                                        <div class="item">
                                            <div class="info" style="margin-top: 5px;">
                                                <div class="meta">
                                                    <ul>
                                                        <li style="margin-top: 10px; margin-bottom: 15px;">
                                                            <a href="#"><i class="fas fa-user-circle" style="margin-right: 10px;" id="tgljadwal"></i>' . $row->tanggal . '</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h2 class="title">' . $row->namaPenjadwalan . '</h2>
                                                <hr>
                                                <div class="col p-2 mb-2" style="background-color: #F8F8F8; margin-top: 25px; border-radius: 5px;">
                                                Jenis padi : ' . (empty($row->jenisPadi) ? '' : $row->jenisPadi) . '
                                                </div>
                                                <div class="col p-2 mb-2" style="background-color: #F8F8F8; margin-top: 10px; border-radius: 5px;">
                                                    Luas lahan : ' . (empty($row->luasLahan) ? '' : $row->luasLahan) . '
                                                </div>
                                                <div class="col p-2 mb-2" style="background-color: #F8F8F8; margin-top: 10px; border-radius: 5px;">
                                                    Musim : ' . (empty($row->musim) ? '' : $row->musim) . '
                                                </div>';

                                    foreach ($dates as $phase => $date) {
                                        echo '
                                                    <div class="col p-2 mb-2" style="background-color: #F8F8F8; margin-top: 10px; border-radius: 5px;">
                                                        ' . $phase . ' : ' . $date . '
                                                    </div>';
                                    }

                                        echo '
                                                    <div class="col p-2 mb-2" style="background-color: #F8F8F8; margin-top: 10px; border-radius: 5px;">
                                                        Catatan : ' . (empty($row->catatan) ? '' : $row->catatan) . '
                                                    </div>
                                                    <a class="btn mt-10 btn-md btn-theme animation" href="' . route('delete-Penjadwalan', ['id' => $row->_id]) . '" style="margin-top: 25px; background-color: #b20000; text-align: center; float: right;">Hapus</a>
                                                </div>
                                            </div>';
                                }   
                            }
                        }
                        ?>
                    </div>
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

</body>

</html>