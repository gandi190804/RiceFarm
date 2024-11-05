<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RiceFarm | Admin</title>
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
                        <li><a class="m-link active" href="/admin"><i
                                    class="icofont-home fs-5"></i><span>Home</span></a>
                        </li>
                        <li><a class="m-link" href="/adminarticles"><i
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
                                                <h2 class="fw-bold mb-0">Welcome, {{auth()->user()->username}}!</h2>
                                            </div>
                                        </div>
                                    </div> <!-- Row end  -->
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <div id="result2"></div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div
                                                        class="dropdown user-profile ml-2 ml-sm-3 d-flex flex-column zindex-popover">
                                                        <a class="nav-link dropdown-toggle pulse p-0" href="#"
                                                            role="button" data-bs-toggle="dropdown"
                                                            data-bs-display="static">
                                                            <img class="avatar lg rounded-circle img-thumbnail"
                                                                src="{{asset('assets/img/profile.jpg')}}"
                                                                alt="profile">
                                                        </a>
                                                        <div class="u-info mt-2">
                                                            <p class="mb-0 text-center line-height-sm"
                                                                style="margin-top: 10px;"><span class="font-weight-bold"
                                                                    style="color: white;">Admin</span></p>
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
        </div>
    </div>

    <!-- Jquery Core Js     -->
    <script src="/assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js -->
    <script src="/assets/bundles/apexcharts.bundle.js"></script>
    <script src="/assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="/assets/js/page/index.js"></script>
    <script src="/assets/js/page/template.js"></script>
    <!-- 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Jr7axGGkwvHRnNfoOzoVRFV3yOPHJEU&amp;callback=myMap">
</script>
<script>
    $('#myDataTable')
        .addClass('nowrap')
        .dataTable({
            responsive: true,
            columnDefs: [{
                targets: [-1, -3],
                className: 'dt-body-right'
            }]  
        });
</script> -->
</body>

</html>
