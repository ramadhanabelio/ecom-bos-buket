<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Bos Buket Bengkalis | @yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo POLBENG" class="me-3" />
                <span class="d-none d-lg-block">Bos Buket Bengkalis</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('img/logo.png') }}" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a>
                    <!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @auth
                            @if (auth()->user()->role === 'user')
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profiles') }}">
                                        <i class="bi bi-person"></i>
                                        <span>Profil</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                            @endif
                        @endauth
                        <li>
                            <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Keluar</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- Dashboard -->
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : 'collapsed' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-house{{ Route::is('admin.dashboard') ? '-fill' : '' }}"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('user.dashboard') ? 'active' : 'collapsed' }}"
                        href="{{ route('user.dashboard') }}">
                        <i class="bi bi-house{{ Route::is('user.dashboard') ? '-fill' : '' }}"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role === 'admin')
                <!-- Manajemen Pesanan -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.orders.*') ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                        href="#ordersMenu">
                        <i class="bi bi-receipt{{ Route::is('admin.orders.*') ? '-fill' : '' }}"></i>
                        <span>Manajemen Pesanan</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ Route::is('admin.orders.*') ? 'show' : '' }}" id="ordersMenu">
                        <ul class="nav-content">
                            <li>
                                <a href="{{ route('admin.orders.index') }}"
                                    class="{{ Route::is('admin.orders.index') ? 'active' : '' }}">
                                    <i class="bi bi-list"></i>
                                    <span>Daftar Pesanan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Manajemen Produk -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.products.*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" href="#productsMenu">
                        <i class="bi bi-box{{ Route::is('admin.products.*') ? '-fill' : '' }}"></i>
                        <span>Manajemen Produk</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ Route::is('admin.products.*') ? 'show' : '' }}" id="productsMenu">
                        <ul class="nav-content">
                            <li>
                                <a href="{{ route('admin.products.index') }}"
                                    class="{{ Route::is('admin.products.index') ? 'active' : '' }}">
                                    <i class="bi bi-list"></i>
                                    <span>Daftar Produk</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.products.create') }}"
                                    class="{{ Route::is('admin.products.create') ? 'active' : '' }}">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah Produk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Manajemen Kategori -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.categories.*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" href="#categoriesMenu">
                        <i class="bi bi-grid{{ Route::is('admin.categories.*') ? '-fill' : '' }}"></i>
                        <span>Manajemen Kategori</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ Route::is('admin.categories.*') ? 'show' : '' }}" id="categoriesMenu">
                        <ul class="nav-content">
                            <li>
                                <a href="{{ route('admin.categories.index') }}"
                                    class="{{ Route::is('admin.categories.index') ? 'active' : '' }}">
                                    <i class="bi bi-list"></i>
                                    <span>Daftar Kategori</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.categories.create') }}"
                                    class="{{ Route::is('admin.categories.create') ? 'active' : '' }}">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Manajemen Rekening -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.bank-accounts.*') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" href="#bank-accountsMenu">
                        <i class="bi bi-bank2{{ Route::is('admin.bank-accounts.*') ? '' : '' }}"></i>
                        <span>Manajemen Rekening</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ Route::is('admin.bank-accounts.*') ? 'show' : '' }}"
                        id="bank-accountsMenu">
                        <ul class="nav-content">
                            <li>
                                <a href="{{ route('admin.bank-accounts.index') }}"
                                    class="{{ Route::is('admin.bank-accounts.index') ? 'active' : '' }}">
                                    <i class="bi bi-list"></i>
                                    <span>Daftar Rekening</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.bank-accounts.create') }}"
                                    class="{{ Route::is('admin.bank-accounts.create') ? 'active' : '' }}">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah Rekening</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Manajemen Pelanggan -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.users.*') ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                        href="#usersMenu">
                        <i class="bi bi-people{{ Route::is('admin.users.*') ? '-fill' : '' }}"></i>
                        <span>Manajemen Pelanggan</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse {{ Route::is('admin.users.*') ? 'show' : '' }}" id="usersMenu">
                        <ul class="nav-content">
                            <li>
                                <a href="{{ route('admin.users.index') }}"
                                    class="{{ Route::is('admin.users.index') ? 'active' : '' }}">
                                    <i class="bi bi-list"></i>
                                    <span>Daftar Pelanggan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.create') }}"
                                    class="{{ Route::is('admin.users.create') ? 'active' : '' }}">
                                    <i class="bi bi-plus-circle"></i>
                                    <span>Tambah Pelanggan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </aside>
    <!-- End Sidebar -->

    <main id="main" class="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Bos Buket Bengkalis</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by
            <a href="https://www.instagram.com/bosbuket.bks" target="_blank">Siti Aminah</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
