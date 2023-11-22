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
                <h5 class="card-title">Data Tempat Wisata</h5>
                <a href="form_lokasi" class="btn btn-primary">
                    <i class="fas fa-plus" style="margin-right: 5px;"></i> Tambah Data
                </a>
                <div class="table-responsive">
                    <table id="main-table" class="table table-stripped display">
                        <thead>
                            <tr>
                                <th scope="col">Nama Tempat</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Harga Masuk</th>
                                <th scope="col">Prioritas</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Iterasi melalui data dan tampilkan dalam tabel
                            foreach ($showdata as $lokasi) :
                            ?>
                                <tr>
                                    <td><?= $lokasi['nama_lokasi'] ?></td>
                                    <td><?= $lokasi['tag_lokasi'] ?></td>
                                    <td><?= $lokasi['harga'] ?></td>
                                    <td><?= $lokasi['prioritas'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/lokasi/detail_lokasi/' . $lokasi['id_lokasi']) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Lihat Detail">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= base_url('admin/lokasi/set_prioritas/' . $lokasi['id_lokasi'] . '/' . ($lokasi['prioritas'] == 'Ya' ? 'Tidak' : 'Ya')) ?>" class="btn btn-<?= $lokasi['prioritas'] == 'Ya' ? 'secondary' : 'success' ?> btn-sm" data-toggle="tooltip" title="<?= $lokasi['prioritas'] == 'Ya' ? 'Batalkan Prioritas' : 'Prioritaskan' ?>">
                                            <i class="fa-solid fa-star"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" onclick="event.preventDefault(); confirmDeleteLokasi('<?= $lokasi['id_lokasi'] ?>');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-3" style="background-color: #96B6C5;">
        <div class="container">
            <p class="m-0 text-center text-black"><b>PemKab Buleleng &copy; 2023</b></p>
        </div>
    </footer>
</body>