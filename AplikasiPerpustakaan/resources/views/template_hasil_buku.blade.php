<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IryadPedia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('assets_jayus/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('assets_jayus/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets_jayus/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('assets_jayus/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('assets_jayus/css/style.cs') }}s" rel="stylesheet">
</head>

<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="/" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">IryadPedia</h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="{{ route('pencarian') }}" class="nav-item nav-link {{ request()->is('pencarian') ? 'active' : '' }}">
                    <i class="fa-solid fa-book"></i> Semua Buku
                </a>
                <a href="{{ route('rekomendasi') }}" class="nav-item nav-link {{ request()->is('rekomendasi') ? 'active' : '' }}">
                    <i class="fa-solid fa-check"></i> Rekomendasi
                </a>
                <div class="nav-item dropdown">
                    @php
                        $isCategoryActive = request()->is('kategori*');
                    @endphp
                    <a href="#" class="nav-link dropdown-toggle {{ $isCategoryActive ? 'active' : '' }}" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-list-ul"></i> Kategori
                    </a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ url('/kategori/novel') }}" class="dropdown-item {{ request()->is('kategori/novel') ? 'active' : '' }}">Novel</a>
                        <a href="{{ url('/kategori/komik') }}" class="dropdown-item {{ request()->is('kategori/komik') ? 'active' : '' }}">Komik</a>
                        <a href="{{ url('/kategori/majalah') }}" class="dropdown-item {{ request()->is('kategori/majalah') ? 'active' : '' }}">Majalah</a>
                        <a href="{{ url('/kategori/cerpen') }}" class="dropdown-item {{ request()->is('kategori/cerpen') ? 'active' : '' }}">Cerita Pendek</a>
                        <a href="{{ url('/kategori/dongeng') }}" class="dropdown-item {{ request()->is('kategori/dongeng') ? 'active' : '' }}">Dongeng</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>

            <a href="#" class="sidebar-toggler flex-shrink-0 ">
                <i class="fa fa-bars"></i>
            </a>
            @yield('search')
        </nav>
        <!-- Navbar End -->


        <!-- Content Start -->
        @yield('content')
        <!-- Content End -->

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('assets_jayus/lib/chart/chart.min.js') }}"></script>
<script src="{{ url('assets_jayus/lib/easing/easing.min.js') }}"></script>
<script src="{{ url('assets_jayus/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ url('assets_jayus/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets_jayus/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ url('assets_jayus/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ url('assets_jayus/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="https://kit.fontawesome.com/0d5f99646b.js" crossorigin="anonymous"></script>

<!-- Template Javascript -->
<script src="{{ url('assets_jayus/js/main.js') }}"></script>
</body>

</html>
