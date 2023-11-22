<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/required/brand.png') ?>" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DenBukit | Informasi Wisata</title>
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
                    <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signin">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <header class="text-black text-center py-5 mb-4" style="background-color: #96B6C5;">
        <div class="container">
            <h1 class="font-weight-bold">Selamat Datang di DenBukit</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente asperiores atque laborum, harum quam ex vitae quas quae distinctio minima! Debitis voluptates tempore reprehenderit adipisci consequuntur cumque unde, omnis accusamus?</p>
        </div>
    </header>

    <div class="container">
        <!-- Artikel Lokasi Wisata -->
        <h2>List Tempat Wisata</h2>

        <!-- Formulir Filter -->
        <form action="<?= base_url('filter') ?>" method="GET" class="mb-3">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="filterDesa">Filter Berdasarkan Desa:</label>
                <select name="desa" id="filterDesa" class="form-control">
                    <option value="">Semua Desa</option>
                    <!-- Tambahkan opsi desa sesuai kebutuhan -->
                    <option value="tengallinggah">Tengallinggah</option>
                    <option value="Desa Wanagiri">Wanagiri</option>
                    <option value="wanagiri">Ambengan</option>
                    <option value="wanagiri">Baktiseraga</option>
                    <option value="wanagiri">Panji</option>
                    <option value="wanagiri">Panjianom</option>
                    <option value="wanagiri">Sambangan</option>
                    <option value="wanagiri">Selat</option>
                    <!-- Tambahkan opsi desa lainnya -->
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="filterPrioritas" name="prioritas">
                <label class="form-check-label" for="filterPrioritas">Hanya Prioritas</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Filter</button>
        </form>

        <div class="row">
            <?php foreach ($lokasiWisata as $lokasi) : ?>
                <!-- Tambahkan logika untuk menampilkan artikel sesuai dengan filter -->
                <?php
                $showArticle = true;

                // Filter berdasarkan desa
                if (isset($_GET['desa']) && $_GET['desa'] != '' && $lokasi['tag_lokasi'] != $_GET['desa']) {
                    $showArticle = false;
                }

                // Filter berdasarkan prioritas
                if (isset($_GET['prioritas']) && $_GET['prioritas'] == 'on' && $lokasi['prioritas'] != 'Ya') {
                    $showArticle = false;
                }

                // Tampilkan artikel jika memenuhi kriteria
                if ($showArticle) :
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" style="width:auto; height: 150px; object-fit:cover;" src="<?= base_url('assets/img/' . $lokasi['foto_lokasi']) ?>" alt="<?= $lokasi['nama_lokasi'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $lokasi['nama_lokasi'] ?></h5>
                                <p class="text-muted"><?= $lokasi['tag_lokasi'] ?></p>
                                <a href="<?= base_url('detail_lokasi/' . $lokasi['id_lokasi']) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- End Artikel Lokasi Wisata -->
        <hr>
        <!-- card desa -->
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
        <hr>
        <!-- end card desa -->
        <br>
        <!-- main page -->
        <div class="row mb-4">
            <div class="col-md-8 mb-4">
                <h2>Tentang Kami</h2>
                <hr>
                <p>DenBukit merupakan gabungan dari delapan Desa Wisata yang berada di Kabupaten Buleleng, sebagai bentuk kerjasama dalam mengembangkan potensi WISATA yang dimiliki setiap Desa.</p>
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
                    <!-- <br>
                    <abbr title="Email">Email:</abbr>
                    <a href="mailto:name@example.com">name@example.com</a> -->
                </address>
            </div>
        </div>
        <!-- end main page -->
    </div>
    <!-- footer -->
    <footer class="py-3" style="background-color: #96B6C5;">
        <div class="container">
            <p class="m-0 text-center text-black">PemKab Buleleng &copy; 2023</p>
        </div>
    </footer>
    <!-- end footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>