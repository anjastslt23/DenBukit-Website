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
                    <a class="nav-link" href="#" onclick="logoutConfirmation()">
                        <i class="fas fa-sign-out-alt"></i> <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Formulir Pendataan</h5>
                <form action="proses_data" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_lokasi">
                                    <i class="fas fa-map-marker-alt"></i> Nama Lokasi:
                                </label>
                                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" placeholder="Masukkan nama tempat wisata" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">
                                    <i class="fas fa-map-marked"></i> Alamat Lokasi:
                                </label>
                                <input type="text" class="form-control" id="alamat_lokasi" name="alamat_lokasi" placeholder="Masukkan alamat lokasi" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto_lokasi">
                                    <i class="fas fa-image"></i> Foto Lokasi (Maksimal 10):
                                </label>
                                <input type="file" class="form-control-file" id="foto_lokasi" name="foto_lokasi[]" multiple accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="video_lokasi">
                                    <i class="fas fa-video"></i> Video Terkait (Rekomendasi format mp4, maks 1 file):
                                </label>
                                <input type="file" class="form-control-file" id="video_lokasi" name="video_lokasi" accept="video/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_masuk">
                                    <i class="fas fa-money-bill-wave"></i> Harga Masuk:
                                </label>
                                <input type="text" class="form-control" id="harga_masuk" name="harga_masuk" placeholder="Masukkan harga masuk" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cp_1">
                                    <i class="fas fa-phone"></i> Contact Person 1:
                                </label>
                                <input type="text" class="form-control" id="cp_1" name="cp_1" placeholder="Masukkan CP pertama" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cp_2">
                                    <i class="fas fa-phone"></i> Contact Person 2:
                                </label>
                                <input type="text" class="form-control" id="cp_2" name="cp_2" placeholder="Masukkan CP kedua" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            <i class="fas fa-file-alt"></i> Deskripsi Tempat:
                        </label>
                        <!-- Ganti textarea dengan TinyMCE -->
                        <textarea id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Lokasi
                    </button>
                </form>

            </div>
        </div>
    </main>

    <footer class="py-3" style="background-color: #96B6C5;">
        <div class="container">
            <p class="m-0 text-center text-black"><b>DenBukit &copy; 2023</b></p>
        </div>
    </footer>
</body>

<script>
    <?php if (session()->has('errors')) : ?>
        <?php foreach (session('errors') as $error) : ?>
            toastr.error('<?= esc($error) ?>');
        <?php endforeach ?>
    <?php endif ?>
</script>