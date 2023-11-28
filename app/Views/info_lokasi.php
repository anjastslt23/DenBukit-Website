<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/required/brand.png') ?>" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DenBukit | Informasi Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro&family=Literata">
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
                    <a class="nav-link" href="<?= base_url('/') ?>">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('signin') ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <header class="text-black text-center py-5 mb-4" style="background-color: #96B6C5;">
        <div class="container">
            <h1 class="font-weight-bold">Informasi Lokasi Wisata</h1>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente asperiores atque laborum, harum quam ex vitae quas quae distinctio minima! Debitis voluptates tempore reprehenderit adipisci consequuntur cumque unde, omnis accusamus?</p> -->
        </div>
    </header>

    <div class="container">
        <main class="container mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <?php if ($infoloc) : ?>
                        <article>
                            <h2><?= $infoloc['nama_lokasi'] ?></h2>
                            <p class="text-muted">Lokasi: <?= $infoloc['alamat_lokasi'] ?></p>
                            <p class="text-muted">Kontak Terkait: <?= $infoloc['telp_admin'] ?></p>
                            <p class="text-muted">Harga Masuk: <b><?= $infoloc['harga'] ?></b></p>
                            <p class="text-muted">Tanggal Upload: <?= $infoloc['created_at'] ?></p>
                            <hr>

                            <!-- Tambahkan gambar atau slider gambar jika perlu -->
                            <img src="<?= base_url('assets/img/' . $infoloc['foto_lokasi']) ?>" alt="<?= $infoloc['nama_lokasi'] ?>" class="img-fluid rounded" style="max-width: auto; height: auto;">

                            <p class="mt-3"><?= $infoloc['deskripsi'] ?></p>
                        </article>
                    <?php else : ?>
                        <p>Data lokasi tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        <br>
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