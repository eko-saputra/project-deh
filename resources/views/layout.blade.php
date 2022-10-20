<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', $title)</title>
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/logo_mini.png') }}" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
</head>

<body>
    <div class="container-scoller">
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                    <img src="{{asset('/assets/images/logo_mini.png')}}" width="25%" class="m-1">
                </div>
                <ul class="nav">
                    <li class="nav-item profile">
                        <div class="profile-desc">
                            <div class="profile-pic">
                                <div class="count-indicator">
                                    @yield('photo-user')
                                    <span class="count bg-success"></span>
                                </div>
                                <div class="profile-name">
                                    @yield('user')
                                    <span>APS User</span>
                                </div>
                            </div>
                            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                                <a href="{{url('pengaturan')}}" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Pengaturan Akun</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('password') }}" class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-onepassword  text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1 text-small">Ganti Password</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item nav-category">
                        <span class="nav-link">Menu</span>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-speedometer"></i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-account-box-outline"></i>
                            </span>
                            <span class="menu-title">Data Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="siswa">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('data-siswa') }}">Data Siswa</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('data-level') }}">Data Level</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#pembayaran" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-account-card-details"></i>
                            </span>
                            <span class="menu-title">Pembayaran</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="pembayaran">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{url('pembayaran')}}">Transaksi Pembayaran</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{url('data-pembayaran')}}">Data Pembayaran</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-library-books"></i>
                            </span>
                            <span class="menu-title">Laporan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="laporan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="">Laporan Pembayaran</a></li>
                                <li class="nav-item"> <a class="nav-link" href="">Laporan Tagihan</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#pengaturan" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-settings"></i>
                            </span>
                            <span class="menu-title">Pengaturan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="pengaturan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{url('data-spp')}}">Biaya SPP</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                <nav class="navbar p-0 fixed-top d-flex flex-row">
                    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('/assets/images/logo-mini.svg')}}" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100 border p-1">
                                <marquee class="text-success" style="font-size: 12px;">Selamat Datang Di <b>DUMAI ENGLISH HOUSE</b></marquee>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item dropdown d-none d-lg-block">
                                <a class="nav-link btn btn-success create-new-button" href="{{url('pembayaran')}}">+ Pembayaran SPP</a>
                            </li>
                            <li class="nav-item">
                                @yield('TA')
                                <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                                    <h6 class="p-3 mb-0">Projects</h6>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-file-outline text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Software Development</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-web text-info"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">UI Development</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-layers text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Software Testing</p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">See all projects</p>
                                </div> -->
                            </li>
                            <!-- <li class="nav-item nav-settings d-none d-lg-block">
                                <a class="nav-link" href="#">
                                    <i class="mdi mdi-view-grid"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown border-left">
                                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-email"></i>
                                    <span class="count bg-success"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                    <h6 class="p-3 mb-0">Messages</h6>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="{{ asset('/assets/images/faces/face4.jpg')}}" alt="image" class="rounded-circle profile-pic">
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                                            <p class="text-muted mb-0"> 1 Minutes ago </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                                            <p class="text-muted mb-0"> 15 Minutes ago </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                                            <p class="text-muted mb-0"> 18 Minutes ago </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">4 new messages</p>
                                </div>
                            </li>
                            <li class="nav-item dropdown border-left">
                                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <span class="count bg-danger"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                    <h6 class="p-3 mb-0">Notifications</h6>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-calendar text-success"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Event today</p>
                                            <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-settings text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Settings</p>
                                            <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-link-variant text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Launch Admin</p>
                                            <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <p class="p-3 mb-0 text-center">See all notifications</p>
                                </div>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                    <div class="navbar-profile">
                                        @yield('photo-user')
                                        <!-- <p class="mb-0 d-none d-sm-block navbar-profile-name">@yield('user')</p> -->
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item" href="{{ route('logout') }}">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1 text-light">Log out</p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                            <span class="mdi mdi-format-line-spacing"></span>
                        </button>
                    </div>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card corona-gradient-card">
                                    <div class="card-body py-0 px-0 px-sm-2">
                                        <div class="row align-items-center">
                                            <div class="col-3 col-sm-3 col-xl-2 text-center">
                                                <img src="{{ asset('/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                                            </div>
                                            <div class="col-3 col-sm-3 col-xl-4 p-0">
                                                <h4 class="mb-1 mb-sm-0">{{$title}}</h4>
                                                <p class="mb-0 font-weight-normal d-none d-sm-block"><i>{{$subtitle}}</i></p>
                                            </div>
                                            <div class="col-6 col-sm-6 col-xl-6 pl-0 text-right">
                                                <span>
                                                    @yield('tombol')

                                                    <!-- <a href="https://www.bootstrapdash.com/product/corona-admin-template/" class="btn btn-outline-light btn-rounded get-started-btn"><i class="mdi mdi-account-card-details"></i> Cetak Kartu</a> -->
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © ekosaputra88</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted"> kami<b>BISA!!!</b> </span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>

    <!-- plugins:js -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.tabelsiswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('data-siswa') }}",
                columns: [
                    {
                        data: 'siswa_id',
                        name: 'siswa_id'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'tgl_lahir',
                        name: 'tgl_lahir'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'sekolah_asal',
                        name: 'sekolah_asal'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
                "columnDefs": [{
                    "width": "5%",
                    "targets": 0
                }]
            });

            $('.tabellevel').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('data-level') }}",
                columns: [{
                        data: 'level_id',
                        name: 'level_id'
                    },
                    {
                        data: 'nama_level',
                        name: 'nama_level'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "columnDefs": [{
                    "width": "5%",
                    "targets": 0
                }]
            });

            $('.tabelspp').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('data-spp') }}",
                columns: [{
                        data: 'spp_id',
                        name: 'spp_id'
                    },
                    {
                        data: 'nominal',
                        name: 'nominal'
                    },
                    {
                        data: 'tahun_ajar',
                        name: 'tahun_ajar'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "columnDefs": [{
                    "width": "5%",
                    "targets": 0
                }]
            });

            $('.tabeldatapembayaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('data-pembayaran') }}",
                columns: [{
                        data: 'no_pendaftaran',
                        name: 'no_pendaftaran'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'nama_level',
                        name: 'nama_level'
                    },
                    {
                        data: 'bulan',
                        name: 'bulan'
                    },
                    {
                        data: 'tahun_ajar',
                        name: 'tahun_ajar'
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "columnDefs": [{
                    "width": "5%",
                    "targets": 0
                }]
            });
        });

        // PEMBAYARAN
        const tot = [];
        const bln = [];

        function caridataSiswa() {
            var gagal = document.getElementById("gagal");
            var noreg = document.getElementById("no-reg");
            var nama = document.getElementById("nama");
            var st = document.getElementById("status");
            var box = document.getElementById('box_hasil');
            var pt = document.getElementById('photo');
            gagal.style.display = "none";
            var tagihan = document.getElementById('tagihan');
            tagihan.innerHTML="";
            $.ajax({
                type: 'get',
                url: "{{url('cari-siswa')}}/" + hasil.value,
                success: function(data) {
                    if (data.length > 0) {
                        console.log(data);
                        gagal.style.display = "none";
                        box.style.display = "block";
                        noreg.innerText = data[0].no_pendaftaran;
                        nama.innerText = data[0].nama_lengkap;
                        var s = (data[0].status == 0) ? "Non Aktif" : "Aktif";
                        st.innerText = "(" + s + ")";

                        pt.src = "http://localhost:8000/storage/" + data[0].photo;
                    } else {
                        box.style.display = "none";
                        gagal.style.display = "block";
                    }
                },
            });

            $.ajax({
                type: 'get',
                url: "{{url('cari-tagihan')}}/" + hasil.value,
                success: function(data1) {
                    if (data1.length > 0) {
                        data1.forEach(function(e){
                            console.log(e.bulan);
                            var x = (e.status == 0) ? "danger" : "success";
                            var y = (e.status == 1) ? "disabled" : '';
                            $('#tagihan').append(`
                            <button class="btn btn-` + x + ` m-2" onclick="tes('` + e.bulan + `')" id="` + e.bulan + `">` + e.bulan + `</button>
                            `);
                        });
                    } else {
                        console.log('data kosong');
                    }
                },
            });
        }

        function tes(bulan) {
            var tb = document.getElementById('tb');
            var bs = document.getElementById('bs');
            var bayar = document.getElementById('bayar');
            var tbbayar = document.getElementById(bulan);
            console.log(bulan);


            // Ambil nominal SPP
            $.ajax({
                type: 'get',
                url: "{{url('nominal')}}",
                success: function(data) {
                    biaya = data[0].nominal;
                    tbbayar.setAttribute('disabled', 'disabled');
                    $('.rincian').append(`<div class="row" id="uji` + bulan + `">
                                                    <div class="col pt-1">
                                                        <h6>SPP (` + bulan + `)</h6>
                                                    </div>
                                                    <div class="col text-end pt-1">
                                                        <h6 class="text-danger">Rp ` + biaya + `</h6> 
                                                    </div> 
                                                    <div class="col">
                                                        <a onclick="test1('` + bulan + `')" id="close` + bulan + `" class="text-danger" style="cursor:pointer;"><i class="mdi mdi-close-circle-outline"></i></a>
                                                    </div> 
                                          </div>`);
                    tot.push($('.rincian').length);
                    bln.push(bulan);
                    const sum = tot.reduce((accumulator, value) => {
                        return accumulator + value;
                    }, 0);

                    bs.innerHTML = `<h4>Rp ` + sum * biaya + `</h4>`;
                    bayar.innerText = sum * biaya;
                    var tombol = document.getElementById('tombol');
                    tombol.style.display = "block";

                    // console.log(bln);

                },
            });
        }

        function ok() {
            // var bulan;
            var noreg = document.getElementById('no-reg').innerText;

            var bayar = document.getElementById('bayar').innerText;
            console.log(bayar);
            Swal.fire({
            title: 'Pembayaran sukses!',
            text: "Klik ok untuk review dan print bukti pembayaran.",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type: "POST",
                url: "{{url('pembayaran-action')}}",
                dataType: "json",
                data: {
                    'bln[]': bln,
                    noreg: noreg,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    // alert('Data SPP berhasil di bayar');
                    
                    // window.location = "{{url('cetak')}}/" + noreg + "/" + bln + "/" + bayar;
                    window.open("{{url('cetak')}}/" + noreg + "/" + bln + "/" + bayar, '_blank');
                    location.reload();
                },
            });

                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
            })
            
        }
        tb.innerHTML = `<h3>TOTAL BAYAR</h3>`;

        function test1(bulan) {
            var tbbayar = document.getElementById(bulan);
            var close = document.getElementById("close" + bulan);
            var uji = document.getElementById("uji" + bulan);
            var bs = document.getElementById('bs');
            var bayar = document.getElementById('bayar').innerText;

            tbbayar.removeAttribute('disabled');
            uji.remove();
            $.ajax({
                type: 'get',
                url: "{{url('nominal')}}",
                success: function(data) {
                    biaya = data[0].nominal;
                    console.log(tot.length);
                    var total = (tot.length * biaya) - biaya
                    bs.innerHTML = "<h4>Rp " + total + "</h4>";
                    tot.pop();
                    bulan = '';
                    if(total < 1){
                    var tombol = document.getElementById('tombol');
                    tombol.style.display = "none";
                    bs.innerHTML = "";
                    bayar.innerHTML = "";
                    }
                },
            });

        }

        var hasil = document.getElementById("noreg");
        hasil.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {

                caridataSiswa();

            }
        });
    </script>

    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/assets/js/misc.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/todolist.js') }}"></script>
    <!-- endinject -->


    <!-- Custom js for this page -->
    <script src="{{ asset('/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->

</body>

</html>