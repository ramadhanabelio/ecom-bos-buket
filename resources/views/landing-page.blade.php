<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Bos Buket Bengkalis</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Bos Buket Bengkalis" class="me-3">
                <span>Bos Buket Bengkalis</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Produk</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Masuk</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Pesan Buket Spesial Anda!</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Pilih buket yang anda sukai, pemesanan buket minimal 2
                        hari sebelum pengabilan, lakukan pemesanan dan
                        bayar, lalu buket sudah ada ditangan anda</h2>
                    <div data-aos="fade-up" data-aos-delay="400" class="mt-5">
                        <a href="https://wa.me/6282284811590" class="btn-get-started">
                            <span>Pesan Melaui WhatsApp</span> <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Tentang Kami</h3>
                            <h2>Bos Buket Bengkalis</h2>
                            <p>
                                Kami spesialis buket unik: bunga, uang, jajan, dan lainnya. Pesan mudah via
                                web ini.
                                Caranya gampang:
                            </p>
                            <ul>
                                <li>Masuk ke aplikasi</li>
                                <li>Pilih produk</li>
                                <li>Checkout dan lakukan pembayaran</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('img/about.jpg') }}" class="img-fluid" alt="Tentang Bos Buket">
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Produk</h2>
                    <p>Daftar Produk</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @php
                                $categories = $products->pluck('category.name', 'category.id')->unique();
                            @endphp
                            @foreach ($categories as $id => $name)
                                <li data-filter=".filter-{{ Str::slug($name) }}">{{ $name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ Str::slug($product->category->name) }}">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid"
                                    alt="{{ $product->name }}">
                                <div class="portfolio-info">
                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ $product->category->name }}</p>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('storage/' . $product->image) }}"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="{{ $product->name }}"><i class="bi bi-plus"></i></a>
                                        <a href="#" title="More Details"><i class="bi bi-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center mb-4">
                            <img src="assets/img/logo.png" alt="">
                            <span>Bos Buket Bengkalis</span>
                        </a>
                        <p>Pesan buket bunga, uang, jajan dengan mudah.</p>
                        <div class="social-links mt-3">
                            <a href="https://instagram.com/bosbuket.bengkalis" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://wa.me/6282284811590" class="linkedin"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Bos Buket Bengkalis</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">Siti Aminah</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
