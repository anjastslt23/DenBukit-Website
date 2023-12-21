<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/required/brand.png') ?>" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Link Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Poppins;
        }

        .card {
            border: 1px solid #ddd;
            /* Tambahkan border */
            border-radius: 8px;
            /* Tambahkan border-radius */
            overflow: hidden;
            /* Hindari overflow */
        }

        .card img {
            transition: transform 0.5s;
            /* Pindahkan transition ke img, agar efek hover bekerja dengan baik */
        }

        .card:hover img {
            transform: scale(1.2);
        }

        .btn-hover:hover {
            background-color: #4CAF50;
            /* Warna latar hover */
            color: white;
            /* Warna teks hover */
            transition: background-color 0.3s, color 0.3s;
            /* Efek transisi hover */
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background-color: #ffffff;
            /* Ganti dengan warna latar belakang yang diinginkan */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Optional: Tambahkan shadow jika diinginkan */
        }

        /* Optional: Gaya tambahan untuk link yang aktif */
        .navbar-nav .nav-item.active .nav-link {
            color: #007bff;
            /* Ganti dengan warna teks yang diinginkan */
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img src="<?= base_url('assets/required/brand.png') ?>" alt="DenBukit" style="height:40px; margin-right: 10px;"><b>DenBukit</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/') ?>">Beranda <span class="sr-only"></span></a>
                </li>
                <li><a class="nav-link scrollto" href="<?= base_url('artikel') ?>">Artikel</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('event') ?>">Event</a></li>
                <li><a class="nav-link scrollto" href="javascript:void(0);" onclick="scrollToSection('about')">Tentang</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('signin') ?>">Login</a>
                </li>

            </ul>
        </div>
    </nav>
    <header class="text-black text-center py-5 mb-4">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/required/1.jpg') ?>" class="d-block w-100" alt="Slide 1">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/required/2.jpg') ?>" class="d-block w-100" alt="Slide 2">
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/required/3.jpg') ?>" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/required/4.jpg') ?>" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/required/5.jpg') ?>" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/required/6.jpg') ?>" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
                <br>
                <p>Den Bukit merupakan sebutan dari daerah Buleleng yang pada saat zaman majapahit dipandang sebagai "daerah nun di sana di balik bukit". Daerah ini dulunya dianggap sebagai daerah yang misterius karena berada di balik bukit. Den Bukit terdiri dari delapan desa yang menjadi satu kesatuan. Desa tersebut, yaitu Desa Wanagiri, Ambengan, Sambangan, Panji, Panji Anom, Baktiseraga, Tegallinggah, dan Selat. Masing-masing desa tersebut memiliki sumber daya alam tersendiri yang menjadikannya unik dan menarik. Informasi mengenai keindahan sumber daya alam tersebut akan disajikan dalam web Den Bukit ini.</p>
            </div>
        </div>
    </header>


    <!-- Slider Container -->


    <div class="container">
        <section id="desa-wisata">
            <h2>List Desa Wisata</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="/" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/tengallinggah.png') ?>" alt="tengallinggah">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/wanagiri.png') ?>" alt="wanagiri">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/ambengan.png') ?>" alt="Desa Ambengan">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/baktiseraga.png') ?>" alt="Desa Bakti Seraga">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/panji.png') ?>" alt="Desa Panji">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/panjianom.png') ?>" alt="Desa Panjianom">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/sambangan.png') ?>" alt="Desa Sambangan">
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="card-link">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/required/selat.png') ?>" alt="Desa Selat">
                        </div>
                    </a>
                </div>
                <!-- Tambahkan card lainnya sesuai dengan format di atas -->
            </div>
        </section>

        <section id="about">
            <!-- main page -->
            <div class="row mb-4">
                <div class="col-md-8 mb-4">
                    <h2>Tentang Kami</h2>
                    <p class="text-justify">Den Bukit merupakan sebutan dari daerah Buleleng yang pada saat zaman majapahit dipandang sebagai "daerah nun di sana di balik bukit". Daerah ini dulunya dianggap sebagai daerah yang misterius karena berada di balik bukit. Den Bukit terdiri dari delapan desa yang menjadi satu kesatuan. Desa tersebut, yaitu Desa Wanagiri, Ambengan, Sambangan, Panji, Panji Anom, Baktiseraga, Tegallinggah, dan Selat. Masing-masing desa tersebut memiliki sumber daya alam tersendiri yang menjadikannya unik dan menarik. Informasi mengenai keindahan sumber daya alam tersebut akan disajikan dalam web Den Bukit ini.</p>
                </div>
                <div class="col-md-4 mb-5">
                    <h2>Kontak Kami</h2>
                    <hr>
                    <address>
                        <strong>Alamat</strong>
                        <br>Jln. Udayana No. 11, Singaraja
                        <br>Kec. Buleleng, Kabupaten Buleleng, Bali 81116
                    </address>
                    <address>
                        <abbr title="Telepon">Telepon:</abbr>
                        +62 87765310940
                        <br>
                        <abbr title="Email">Email:</abbr>
                        <a href="mailto:denbukit.wisata@gmail.com">DenBukit CS</a>
                        <br>
                        <abbr title="Instagram">Instagram:</abbr>
                        <a href="https://www.instagram.com/kawasandenbukit/"> kawasandenbukit</a>
                    </address>
                </div>
            </div>
            <!-- end main page -->
        </section>

    </div>
    <!-- footer -->
    <footer class="py-3" style="background-color: #96B6C5;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left">
                    <p class="m-0">DenBukit &copy; 2023</p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div id="google_translate_element">Terjemahkan ke:</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Fungsi untuk menggulir otomatis ke bagian tertentu
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- Script untuk inisialisasi Carousel -->
    <script>
        $(document).ready(function() {
            $('#myCarousel').carousel({
                dots: true,
                infinite: true,
                speed: 500, // Kecepatan perpindahan slide (dalam milidetik)
                slidesToShow: 1, // Jumlah slide yang ditampilkan pada satu waktu
                slidesToScroll: 1 // Jumlah slide yang bergeser ketika tombol di tekan
            });
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            // Inisialisasi Slick Carousel
            $('.slider-container').slick({
                dots: true, // Menampilkan navigasi titik (pager)
                infinite: true, // Mengaktifkan tampilan tak terbatas
                speed: 500, // Kecepatan perpindahan slide (dalam milidetik)
                slidesToShow: 1, // Jumlah slide yang ditampilkan pada satu waktu
                slidesToScroll: 1 // Jumlah slide yang bergeser ketika tombol di tekan
            });
        });
    </script> -->
    <!-- Script Slick Carousel -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>