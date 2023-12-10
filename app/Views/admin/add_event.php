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
                <h5 class="card-title"><i class="bi bi-calendar-plus"></i> Buat Event Baru</h5>
                <form action="proses_event" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_event">
                                    <i class="bi bi-geo-alt"></i> Nama Event:
                                </label>
                                <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Masukkan nama tempat event" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">
                                    <i class="bi bi-people"></i> Lokasi Event:
                                </label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan lokasi event berlangsung" required>
                            </div>
                            <div class="form-group">
                                <label for="penyelenggara">
                                    <i class="bi bi-people"></i> Penyelenggara:
                                </label>
                                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Masukkan nama penyelenggara" required>
                            </div>
                            <div class="form-group">
                                <label for="foto_event">
                                    <i class="bi bi-image"></i> Foto Event:
                                </label>
                                <input type="file" class="form-control-file" id="foto_event" name="foto_event[]" multiple accept="image/*" onchange="previewImages(event)" required>
                                <div id="imagePreview"></div>
                            </div>
                            <div class="form-group">
                                <label for="video_event">
                                    <i class="bi bi-camera-video"></i> Video Terkait (Rekomendasi format mp4, maks 1 file):
                                </label>
                                <input type="file" class="form-control-file" id="video_event" name="video_event" accept="video/*">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_mulai">
                                    <i class="bi bi-calendar"></i> Mulai:
                                </label>
                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_selesai">
                                    <i class="bi bi-calendar-check"></i> Selesai:
                                </label>
                                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai">
                            </div>
                            <div class="form-group">
                                <label for="biaya_masuk">
                                    <i class="bi bi-currency-dollar"></i> Biaya:
                                </label>
                                <input type="text" class="form-control" id="biaya_masuk" name="biaya_masuk" placeholder="Masukkan biaya/harga tiket" required>
                            </div>
                            <div class="form-group">
                                <label for="cp_1">
                                    <i class="bi bi-telephone"></i> Contact Person 1:
                                </label>
                                <input type="text" class="form-control" id="cp_1" name="cp_1" placeholder="Masukkan CP pertama" required>
                            </div>
                            <div class="form-group">
                                <label for="cp_2">
                                    <i class="bi bi-telephone"></i> Contact Person 2:
                                </label>
                                <input type="text" class="form-control" id="cp_2" name="cp_2" placeholder="Masukkan CP kedua" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">
                            <i class="bi bi-file-text"></i> Deskripsi Event:
                        </label>
                        <!-- Ganti textarea dengan TinyMCE -->
                        <textarea id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Buat Event
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

<script>
    function previewImages(event) {
        var previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = ''; // Menghapus pratinjau sebelumnya

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var imgContainer = document.createElement('div');
                imgContainer.className = 'image-container';

                var imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.className = 'img-thumbnail'; // Menambahkan kelas untuk styling

                var deleteIcon = document.createElement('span');
                deleteIcon.className = 'delete-icon';
                deleteIcon.innerHTML = '&times;'; // Simbol silang (X)

                deleteIcon.onclick = function() {
                    imgContainer.remove(); // Hapus elemen container saat ikon silang diklik
                };

                imgContainer.appendChild(imgElement);
                imgContainer.appendChild(deleteIcon);
                previewContainer.appendChild(imgContainer);
            };

            reader.readAsDataURL(files[i]);
        }
    }
</script>

<style>
    #imagePreview {
        display: flex;
        flex-wrap: wrap;
    }

    .image-container {
        position: relative;
        margin: 8px;
    }

    .img-thumbnail {
        max-width: 100px;
        max-height: 100px;
    }

    .delete-icon {
        position: absolute;
        top: 0;
        right: 0;
        padding: 4px;
        background-color: #fff;
        cursor: pointer;
        color: red;
        font-size: 18px;
    }
</style>