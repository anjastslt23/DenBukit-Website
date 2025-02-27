<?= view('admin/template/header') ?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #96B6C5;">
        <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-chart-bar"></i><b>AdminPanel</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if (session()->get('logged_in')) : ?>
                <span class="nav-link"><b>Selamat datang, <?= session()->get('nama'); ?> (<?= session()->get('asal_desa'); ?>)</b></span>
            <?php endif; ?>
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
                <h5 class="card-title">Artikel Tempat Wisata</h5>
                <a href="form_lokasi" class="btn btn-primary">
                    <i class="fas fa-plus" style="margin-right: 5px;"></i> Artikel baru
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

    <main class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Data Event Wisata</h5>
                <a href="form_event" class="btn btn-primary">
                    <i class="fas fa-plus" style="margin-right: 5px;"></i> Buat Event
                </a>
                <div class="table-responsive">
                    <table id="event-table" class="table table-stripped display">
                        <thead>
                            <tr>
                                <th scope="col">Nama Event</th>
                                <th scope="col">Penyelenggara</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Biaya Masuk</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Iterasi melalui data dan tampilkan dalam tabel
                            foreach ($showevent as $event) :
                            ?>
                                <tr>
                                    <td><?= $event['nama_event'] ?></td>
                                    <td><?= $event['penyelenggara'] ?></td>
                                    <td><?= $event['tgl_mulai'] ?></td>
                                    <td><?= $event['biaya_masuk'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/event/detail_event/' . $event['id_event']) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Lihat Detail Event">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus" onclick="event.preventDefault(); confirmDeleteLokasi('<?= $event['id_event'] ?>');">
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
            <p class="m-0 text-center text-black"><b>DenBukit &copy; 2023</b></p>
        </div>
    </footer>

</body>