<?= view('admin/template/header') ?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #96B6C5;">
        <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-chart-bar"></i><b>Dashboard Admin</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i> Beranda <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>logout">
                        <i class=" fas fa-sign-out-alt"></i> <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <?php if ($infoevent) : ?>
                    <article>
                        <h2><?= $infoevent['nama_event'] ?></h2>
                        <p class="text-muted">Penyelenggara: <?= $infoevent['penyelenggara'] ?></p>
                        <p class="text-muted">Lokasi: <?= $infoevent['alamat_event'] ?></p>
                        <p class="text-muted">Tanggal Mulai: <?= $infoevent['tgl_mulai'] ?></p>
                        <div class="row">
                            <p class="text-muted col-md-6">Kontak Admin: <?= $infoevent['telp_admin'] ?></p>
                            <p class="text-muted col-md-6">Harga Tiket: <b><?= $infoevent['biaya_masuk'] ?></b></p>
                            <p class="text-muted col-md-6">Contact Person 1: <b><?= $infoevent['cp_1'] ?></b></p>
                            <p class="text-muted col-md-6">Contact Person 2: <b><?= $infoevent['cp_2'] ?></b></p>
                        </div>

                        <hr>

                        <?php
                        // Mengecek apakah ada foto yang tersimpan
                        if (!empty($infoevent['foto_event'])) {
                            // Memecah string menjadi array menggunakan koma sebagai pemisah
                            $fotoNames = explode(',', $infoevent['foto_event']);
                        ?>

                            <!-- Tambahkan ID untuk slider -->
                            <div id="mediaSlider" class="slick-slider">
                                <?php
                                // Menampilkan setiap gambar
                                foreach ($fotoNames as $fotoName) {
                                ?>
                                    <div>
                                        <!-- Menambahkan gaya untuk mengontrol ukuran dan menengahkan gambar -->
                                        <img src="<?= base_url('assets/img/event/' . $fotoName) ?>" alt="<?= $infoevent['nama_event'] ?>" class="img-fluid rounded mx-auto d-block" style="max-height: 400px; max-width: 100%;">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            <!-- Sertakan modul Slick Carousel dari CDN -->
                            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
                            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

                            <!-- Inisialisasi Slick Carousel -->
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#mediaSlider').slick({
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        dots: true,
                                        autoplay: true,
                                        autoplaySpeed: 1000,
                                    });
                                });

                                // Fungsi untuk memutar/toggle media
                                function toggleMedia() {
                                    var slider = $('#mediaSlider');
                                    var video = $('#lokasiVideo');

                                    // Jika sedang menampilkan slider, toggle ke video
                                    if (slider.is(':visible')) {
                                        slider.hide();
                                        video.show();
                                        video.get(0).play(); // Mulai memutar video secara otomatis
                                    } else {
                                        // Jika sedang menampilkan video, toggle ke slider
                                        video.get(0).pause(); // Pause video sebelum menampilkannya
                                        video.hide();
                                        slider.show();
                                    }
                                }
                            </script>
                        <?php
                        } else {
                            // Tampilkan pesan jika tidak ada foto
                            echo "<p>Tidak ada foto yang ditemukan.</p>";
                        }
                        ?>

                        <?php
                        // Mengecek apakah ada video yang tersimpan
                        if (!empty($infoevent['video_event'])) {
                        ?>
                            <!-- Tambahkan tombol untuk memutar video -->
                            <button class="btn btn-success" onclick="toggleMedia()">Foto/Video</button>

                            <!-- Menampilkan video jika tersedia -->
                            <video id="lokasiVideo" width="25%" height="auto" style="display: none;">
                                <source src="<?= base_url('assets/videos/event/' . $infoevent['video_event']) ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php
                        } else {
                            // Tampilkan pesan jika tidak ada video
                            echo "<p>Tidak ada video yang ditemukan.</p>";
                        }
                        ?>
                        <hr>
                        <h2>Deskripsi Event</h2>
                        <p class="mt-3"><?= $infoevent['deskripsi'] ?></p>
                    </article>
                    <div class="card-footer">
                        Tanggal Upload: <?= $infoevent['created_at'] ?>
                    </div>
                <?php else : ?>
                    <p>Data event tidak ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>



    <footer class="py-3" style="background-color: #96B6C5;">
        <div class="container">
            <p class="m-0 text-center text-black"><b>DenBukit &copy; 2023</b></p>
        </div>
    </footer>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>