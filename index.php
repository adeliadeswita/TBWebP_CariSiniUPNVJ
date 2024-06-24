<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CariSini UPNVJ</title>
    <link rel="icon" href="logo/logo-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        .btn-getstarted button {
            background: none;
            border: none;
            padding: 0;
            font-size: inherit;
            cursor: pointer;
            color: inherit;
            font-weight: bold;
        }

        .btn-getstarted ul li a.dropdown-item {
            background: none;
            color: #65C18C;
            padding: 0.5rem 1rem;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease;
            padding-right: 200px;
        }

        .btn-getstarted ul li a.dropdown-item:hover {
            background-color: rgba(0, 0, 0, 0.1);
            color: #186F65;
        }

        .btn-getstarted:hover ul {
            left: -9rem;
            width: 250px;
        }

        .btn-getstarted ul li a.dropdown-item:active {
            font-weight: bold;
        }

        .btn-getstarted ul li a.dropdown-item:focus {
            font-weight: bold;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename"></h1><img src='logo\logo-title.png' style="width:200px;">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#services">Fitur</a></li>
                    <li><a href="#faq-2">FAQ</a></li>
                    <li class="dropdown btn-getstarted">
                        <button>Masuk <i class="fa-solid fa-caret-down" style="color: white;"></i></button>
                        <ul>
                            <li><a class="dropdown-item" href="./login_user.php">Masuk sebagai Pengguna</a></li>
                            <li><a class="dropdown-item" href="./login_admin.php">Masuk sebagai Admin</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>


    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                        <img src='logo\logo-title.png' style="width:600px; margin-left: -20px;">
                        <p>Solusi Cepat Barang Hilang!
                            <br><span style="font-weight: 400;">Temukan kembali barang-barang Anda yang hilang dengan cepat dan mudah.</span>
                        </p>
                        <div class="d-flex">
                            <a href="#about" class="btn-get-started">Tentang CariSini UPNVJ</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/animasi.png" class="img-fluid animated" width="600px" style="margin-left:50px;">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang CariSini UPNVJ</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>
                            CariSini UPNVJ adalah platform berbasis website yang menyediakan informasi mengenai barang temuan untuk seluruh masyarakat kampus UPNVJ, dimana pengguna dapat mencari barang - barang hilang milik mereka yang sudah diamankan oleh pihak kampus UPNVJ. <br><br>Apa saja yang website ini sediakan untuk pengguna ?
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Data barang - barang temuan</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Pengajuan pengambilan</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Histori semua pengajuan</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p>Website CariSini dapat membantu masyarakat kampus UPNVJ dalam memecahkan solusi kehilangan barang-barang milik mereka di sekitar kampus. <br>Namun, mengapa website CariSini dibangun ?</p>
                        <a href="#why-us" class="read-more"><span>Baca Selanjutnya</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                </div>
            </div>

        </section><!-- /About Section -->

        <!-- Why Us Section -->
        <section id="why-us" class="section why-us" data-builder="section">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3><span>Mengapa </span><strong>CariSini UPNVJ?</strong></h3>
                            <p>
                                CariSini UPNVJ bukan hanya sebuah platform, tetapi juga sebuah solusi untuk masalah kehilangan barang di lingkungan UPNVJ, memastikan keamanan bagi seluruh komunitas kampus.
                            </p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                            <div class="faq-item faq-active">

                                <h3><span>01</span>Efisiensi dalam Menemukan Barang Hilang</h3>
                                <div class="faq-content">
                                    <p>CariSini UPNVJ memudahkan mahasiswa, dosen, dan staf UPNVJ untuk menemukan kembali barang-barang mereka yang hilang dengan cepat dan efisien. Dengan platform ini, pengguna dapat mengajukan laporan barang hilang atau melihat daftar barang yang ditemukan, meminimalkan waktu dan usaha yang diperlukan untuk mencari barang secara manual di seluruh kampus.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span>02</span>Kemudahan dan Kecepatan dalam Pencarian</h3>
                                <div class="faq-content">
                                    <p>CariSini UPNVJ menawarkan antarmuka yang user-friendly, memudahkan pengguna untuk melaporkan dan mencari barang hilang dengan cepat. Dengan sistem yang terstruktur dan mudah digunakan, mahasiswa, dosen, dan staf dapat segera menemukan atau melaporkan barang-barang mereka yang hilang tanpa perlu menghabiskan waktu yang lama.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span>03</span>Sistem yang Terorganisir dan Terpercaya</h3>
                                <div class="faq-content">
                                    <p>CariSini UPNVJ menawarkan sistem yang terstruktur dan terpercaya untuk melaporkan dan mencari barang hilang. Dengan database yang terpusat dan diakses secara online, pengguna dapat memastikan bahwa laporan mereka didokumentasikan dengan baik dan mudah diakses. Selain itu, platform ini dikelola oleh pihak kampus, menjadikannya lebih aman dan dapat dipercaya dibandingkan metode pencarian barang hilang lainnya.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                        <img src="logo/logo-tab.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
                    </div>
                </div>

            </div>

        </section><!-- /Why Us Section -->

        <!-- Features Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Fitur</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-book"></i></div>
                            <h4 class="stretched-link">Informasi Temuan</h4>
                            <p>Menampilkan data-data barang temuan yang sudah ditambahkan berupa tabel.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-check-circle"></i></div>
                            <h4 class="stretched-link">Pengajuan</h4>
                            <p> Pengajuan untuk mengambil barang yang sudah ditemukan dan ditampilkan di halaman informasi temuan.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-clock"></i></div>
                            <h4 class="stretched-link">Histori Temuan</h4>
                            <p>Menampilkan daftar barang apa saja yang sudah ditemukan dan sudah diverifikasi beserta nama petugas yang bertanggung jawab.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-search"></i></div>
                            <h4 class="stretched-link">Search</h4>
                            <p>Mempermudah user dalam pencarian barang pada tabel temuan yang tersedia pada menu informasi.</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/162/2024/01/28/upn-vj-3971495672.jpeg" alt="">

            <div class="container">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-9 text-center text-xl-start">
                        <h3>CariSini UPNVJ - Solusi Cepat Barang Hilang!</h3>
                        <p>Temukan kembali barang-barang Anda yang hilang dengan cepat dan mudah.
                            CariSini UPNVJ, platform terpercaya yang menghubungkan komunitas kampus dalam upaya bersama untuk memastikan tidak ada barang yang hilang tanpa jejak.
                            Mari bergabung dan jadikan kampus kita tempat yang lebih terorganisir dan aman!</p>
                    </div>
                    <div class="col-xl-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="login_user.php">Masuk</a>
                    </div>
                </div>

            </div>

        </section><!-- /Call To Action Section -->

        <!-- Faq 2 Section -->
        <section id="faq-2" class="faq-2 section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="faq-container">

                            <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Berapa lama laporan barang hilang atau ditemukan akan ditampilkan di situs?</h3>
                                <div class="faq-content">
                                    <p>Tidak ada batasan waktu dalam laporan barang hilang. Selagi barang hilang belum diambil, maka barang akan terus ditampilkan.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Apakah ada biaya untuk menggunakan layanan web CariSini?</h3>
                                <div class="faq-content">
                                    <p>Layanan ini gratis dan terbuka untuk semua masyarakat UPNVJ yang membutuhkan bantuan dalam menemukan atau melaporkan barang hilang.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Berapa lama laporan barang hilang atau ditemukan akan ditampilkan di situs?</h3>
                                <div class="faq-content">
                                    <p>Tidak ada batasan waktu dalam laporan barang hilang. Selagi barang hilang belum diambil, maka barang akan terus ditampilkan</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3> Apakah terdapat jam operasional website CariSini UPNVJ?</h3>
                                <div class="faq-content">
                                    <p>Web beroperasi selama 24 jam, untuk pengambilan barang dari tata usaha fakultas dimulai dari jam 9:00 - 17:00.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>Bagaimana cara melaporkan barang yang saya temukan?</h3>
                                <div class="faq-content">
                                    <p>Barang yang ditemukan bisa dilaporakan kepada tata usaha fakultas terdekat dari tempat barang itu ditemukan.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Faq 2 Section -->

    </main>

    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-2">
                <div class="col-lg-2 col-md-3 footer-about">
                    <span><img src="logo/logo-tab.png" style="width: 140px;"></span>
                </div>

                <div class="col-lg-3 col-md-3 footer-links">
                    <p><strong>CariSini UPNVJ</strong> <br> platform daring yang didedikasikan untuk mendata dan
                        memfasilitasi pencarian barang hilang di lingkungan Universitas Pembangunan
                        Nasional Veteran Jakarta</p>
                </div>

                <div class="col-lg-4 col-md-3 footer-links">
                    <div class="footer-contact">
                        <p><strong>Kontak</strong> <br> Universitas Pembangunan Nasional 'Veteran' Jakarta</p>
                        <p>Jl. RS. Fatmawati, Pondok Labu, Jakarta Selatan, DKI Jakarta. 12450</p>
                        <p><strong>Email:</strong> <span>carisini@upnvj.com</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <ul>
                        <br>
                        <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#services">Fitur</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#faq">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="container footer-bottom">
                <div class="container copyright mt-4">
                    <p>© <span>Copyright</span> <strong class="px-1 sitename">CariSini UPNVJ</strong> <span>All Rights Reserved</span></p>
                </div>
            </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>