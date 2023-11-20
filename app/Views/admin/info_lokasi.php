<?= view('admin/template/header') ?>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-chart-bar"></i> Dashboard Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i> Beranda <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="logoutConfirmation()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Detail Lokasi Wisata</h5>
                <?php if ($infoloc) : ?>
                    <article>
                        <h2><?= $infoloc['nama_lokasi'] ?></h2>
                        <p class="text-muted">Lokasi: <?= $infoloc['alamat_lokasi'] ?></p>
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

    <footer class="py-3 mt-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">SLT Developer &copy; 2023</p>
        </div>
    </footer>
</body>