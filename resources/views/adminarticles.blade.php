<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RiceFarm | Artikel Admin</title>
    <link rel="shortcut icon" href="/assets/img/logo tanpa bg.png" type="image/x-icon">

    <!-- plugin css file  -->
    <link rel="stylesheet" href="/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="/assets/plugin/datatables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="/assets/css/ebazar.style.min.css">

    <!-- plugin css file  -->
    <link rel="stylesheet" href="/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="/assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="/assets/css/ebazar.style.min.css">

</head>

<body style="background-color: #F2E9E4;">
    <div id="ebazar-layout" class="theme-monalisa">

        <!-- Main body area: Flex container for sidebar and content -->
        <div class="main d-flex">

            <!-- Sidebar on the left -->
            <div class="sidebar px-4 py-4 py-md-4 me-0 gradient">
                <div class="d-flex flex-column h-100">
                    <!-- Header Profile -->
                    <div
                        class="dropdown user-profile ml-2 ml-sm-3 d-flex flex-column align-items-center zindex-popover">
                        <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown"
                            data-bs-display="static">
                            <img class="avatar lg rounded-circle img-thumbnail"
                                src="{{asset('assets/img/profile.jpg')}}" alt="profile">
                        </a>
                        <div class="u-info mt-2">
                            <p class="mb-0 text-center line-height-sm" style="margin-top: 10px;"><span
                                    class="font-weight-bold" style="color: white;">{{auth()->user()->username}}</span>
                            </p>
                        </div>
                    </div>

                    <!-- Sidebar content -->
                    <ul class="menu-list flex-grow-1 mt-3">
                        <li><a class="m-link" href="/admin"><i class="icofont-home fs-5"></i><span>Home</span></a>
                        </li>
                        <li><a class="m-link active" href="/adminarticles"><i
                                    class="icofont-folder fs-5"></i><span>Artikel</span></a></li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                            <!-- <a href=""><span class="login-button">Logout</span></a> -->
                        </form>
                    </ul>
                    <!-- Sidebar collapse button -->

                    <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                        <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                    </button>
                </div>
            </div>
            <!-- Content area on the right -->
            <div class="main px-lg-4 px-md-4 container-xl" style="margin-top: 100px;">
                <div class="rol-md-6">
                    <div class="card" style="border-radius: 10px; box-shadow: 1px 5px 5px rgba(1, 3, 2, 0.1);">
                        <div class="card-body">
                            <div class="body d-flex py-3">
                                <div class="container-xxl">
                                    <div class="row align-items-center">
                                        <div class="border-0 mb-4">
                                            <div
                                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                                <h3 class="fw-bold mb-0">Data Artikel</h3>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#modal-report"
                                                    class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                                                        class="icofont-plus-circle me-2 fs-6"></i>Tambah Artikel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <div id="result2"></div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <table id="myDataTable" class="table table-hover align-middle mb-0"
                                                        style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Judul Artikel</th>
                                                                <th>Isi Artikel</th>
                                                                <th>Gambar Artikel</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $cUrl = curl_init();

                                                            $options = array(
                                                                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/getArtikel',
                                                                CURLOPT_CUSTOMREQUEST => 'GET',
                                                                CURLOPT_RETURNTRANSFER => TRUE
                                                            );

                                                            curl_setopt_array($cUrl, $options);

                                                            $response = curl_exec($cUrl);

                                                            $data = json_decode($response);

                                                            curl_close($cUrl);
                                                            foreach ($artikel as $row) :
                                                                echo '<tr>
                                                                <td>';
                                                                if (!empty($row->tanggal)) {
                                                                    if (is_string($row->tanggal)) {
                                                                        echo $row->tanggal;
                                                                    } else {
                                                                        echo 'Invalid date data'; // Or handle the case where $row->tgl_publikasi is an object
                                                                    }
                                                                }
                                                                echo '<td>' . (empty($row->judul) ? '' : $row->judul) . '</td>';

                                                                if (is_object($row) || is_array($row)) {
                                                                    echo '<td>' . (empty($row->isi) ? '' : substr($row->isi, 0, 200)) . '</td>';
                                                                } else {
                                                                    echo '<td>$row is not an object or array: ' . gettype($row) . '</td>';
                                                                }


                                                                echo '<td>';
                                                                if (!empty($row->gambar)) {
                                                                    if (is_string($row->gambar)) {
                                                                        // Pastikan URL gambar dibangun dengan benar
                                                                        echo '<img src="/assets/img/artikel/' . htmlspecialchars($row->gambar) . '" width="100" height="100">';
                                                                    } else {
                                                                        echo 'Invalid image data'; // Atau tangani kasus di mana $row->gambar bukan string
                                                                    }
                                                                }

                                                                echo '<td>
                                                                <a href="javascript:void(0);" class="btn btn-primary btn-sm edit" data-id="' . $row->_id .
                                                                    '"><i class="icofont-edit text-success"></i></a>
                                                                </td>
                                                                <td>
                                                                <form action="' . route('delete', ['id' => $row->_id]) . '" method="POST">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                                                    <button type="submit"  class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin akan menghapus data?\')"><i
                                                                class="icofont-ui-delete text-danger"></i></button>
                                                                </form>
                                                                </td>';
                                                                '</tr>';
                                                            endforeach;

                                                            if (empty($data)) {
                                                                echo '<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>';
                                                            }
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
            </div>
        </div>
    </div>

    <!-- Modal tambah data artikel -->
    <form action="{{route('addarticle')}}" method="POST" class="contact-form contact-form"
        enctype="multipart/form-data">
        @csrf
        <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="result"></div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input class="form-control" name="tanggal" id="tanggal" type="text"
                                placeholder="Tanggal Artikel" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" name="judul" id="judul_artikel"
                                placeholder="Judul Artikel" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea class="form-control" name="isi" id="isi_artikel" placeholder="Isi Artikel"
                                rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar" accept="image*/" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary" onclick="">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal update artikel -->
    <form action="" method="POST" class="contact-form" enctype="multipart/form-data" id="formUpdate">
        @method('PUT')
        @csrf
        <div class="modal modal-blur fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="result"></div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" id="tanggal_artikel">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" name="judul" id="judul">
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi Artikel</label>
                            <textarea class="form-control" name="isi" id="isi" placeholder="Isi Artikel" rows="4"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <img id="currentImage" src="" alt="Current Image" style="max-width: 100%; height: auto;" />
                            <input type="file" class="form-control" name="gambar">
                            <input type="hidden" name="gambarlama" id="gambarlama">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Jquery Core Js -->
    <script src="/assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="/assets/bundles/apexcharts.bundle.js"></script>
    <script src="/assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/assets/js/page/index.js"></script>
    <script src="/assets/js/page/template.js"></script>

    <script>
        $(document).ready(function () {
            $('.edit').click(function () {
                var id = $(this).data('id');
                console.log(id);

                $.ajax({
                    url: 'https://asia-south1.gcp.data.mongodb-api.com/app/application-0-oiyyq/endpoint/getArtikelById?id=' +
                        id,
                    type: 'GET',
                    success: function (res) {
                        var data = res[0];
                        // console.log(data);return
                        $('#modal-update').modal('show');

                        $('#id').val(data._id);
                        $('#tanggal_artikel').val(data.tanggal);
                        $('#judul').val(data.judul);
                        $('#isi').val(data.isi);
                        $('#currentImage').attr('src',
                            "{{ asset('assets/img/artikel') }}/" + data.gambar
                        ); // Set the source of the image
                        $('#gambarlama').val(data
                            .gambar); // Set the value of the hidden input

                        var updateAction = "{{ route('update', ':id') }}".replace(':id',
                            data._id);
                        $('#formUpdate').attr('action', updateAction);
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
