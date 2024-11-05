<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title  -->
    <title>RiceFarm | Pencatatan Keuangan</title>
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
                                    <h4 class="sub-title" style="color: #49A760;">Ayo Catat</h4>
                                    <h1 class="judul"
                                        style="color: #000; font-weight: bold; margin-bottom: 20px; padding-bottom: 20px;">
                                        KeuanganMu!</h1>
                                </div>
                            </div>
                            <div class="col-md-12"
                                style="margin-bottom: 10px; display: flex; justify-content: flex-end;">
                                <ul class="nav1" style="margin-right: 5px; padding: 0;">
                                    <a href="/incomes">
                                        <span class="login-button" style="color: #49A760; border: none;">
                                            <i class="fas fa-plus-circle fa-2x"></i>
                                        </span>
                                    </a>
                                </ul>
                                <ul class="nav1" style="margin: 0; padding: 0;">
                                    <a href="/outcomes">
                                        <span class="login-button" style="color: red; border: none;">
                                            <i class="fas fa-minus-circle fa-2x"></i>
                                        </span>
                                    </a>
                                </ul>

                            </div>
                            <div class="row g-3 mb-3">
                                <div id="result2"></div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="myDataTable" class="table table-hover align-middle mb-0"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Tipe</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Pemasukkan</th>
                                                    <th>Pengeluaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (auth()->check()) {
                                                    $username = auth()->user()->username;
                                                }

                                                $cUrl = curl_init();

                                                $options = array(
                                                    CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/getFinancialsByUsername?username=' . $username,
                                                    CURLOPT_CUSTOMREQUEST => 'GET',
                                                    CURLOPT_RETURNTRANSFER => true
                                                );

                                                curl_setopt_array($cUrl, $options);

                                                $response = curl_exec($cUrl);

                                                $data = json_decode($response);

                                                curl_close($cUrl);
                                                // Pastikan $data diinisialisasi dan diisi dengan data yang benar sebelum loop
                                                foreach ($data as $row) :
                                                    echo '<tr><td>';

                                                    // Periksa apakah $row adalah objek atau array dan akses 'pengeluaran' dengan benar
                                                    if (is_object($row) && $row->pengeluaran == 0) {
                                                        echo '<span class="login-button" style="color: #49A760; border: none;"><i class="fas fa-plus-circle"></i></span>';
                                                    } elseif (is_array($row) && $row['pengeluaran'] == 0) {
                                                        echo '<span class="login-button" style="color: #49A760; border: none;"><i class="fas fa-plus-circle"></i></span>';
                                                    } else {
                                                        echo '<span class="login-button" style="color: red; border: none;"><i class="fas fa-minus-circle"></i></span>';
                                                    }

                                                    echo '</td>
                                                        <td>' . (empty($row->tanggal) ? '' : $row->tanggal) . '</td>
                                                        <td>' . (empty($row->keterangan) ? '' : $row->keterangan) . '</td>
                                                        <td>' . (empty($row->pemasukan) ? 'Rp. 0' : 'Rp. ' . $row->pemasukan) . '</td>
                                                        <td>' . (empty($row->pengeluaran) ? 'Rp. 0' : 'Rp. ' . $row->pengeluaran) . '</td>
                                                    </tr>';
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End homepage -->

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
