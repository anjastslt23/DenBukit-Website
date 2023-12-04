 <!DOCTYPE html>
 <html lang="id">

 <head>
     <link rel="shortcut icon" href="<?= base_url('assets/required/brand.png') ?>" type="image/x-icon">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?= $title ?></title>
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

         footer {
             position: relative;
             top: 25px;
             bottom: 0;
             width: 100%;
             background-color: #96B6C5;
             padding: 15px 0;
             text-align: center;
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
                 <li class="nav-item">
                 </li>

             </ul>
         </div>
     </nav>
     <header class="text-black text-center py-5 mb-4" style="background-color: #96B6C5;">
         <div class="container">
             <h1 class="font-weight-bold">Event Tempat Wisata</h1>
             <p>Disini menyediakan informasi terkait event/acara terbaru di setiap tempat wisata yang terdaftar di website kami.</p>
         </div>
     </header>
     <div class="container">
         <!-- Artikel Lokasi Wisata -->
         <!-- Formulir Filter -->
         <form action="<?= base_url('filter') ?>" method="GET" class="mb-3">
             <?= csrf_field() ?>
             <div class="form-group">
                 <label for="filterDesa">Filter Event Berdasarkan Desa:</label>
                 <select name="desa" id="filterDesa" class="form-control">
                     <option value="">Semua Desa</option>
                     <!-- Tambahkan opsi desa sesuai kebutuhan -->
                     <option value="Desa Tengalinggah">Tengalinggah</option>
                     <option value="Desa Wanagiri">Wanagiri</option>
                     <option value="Desa Ambengan">Ambengan</option>
                     <option value="Desa Baktiseraga">Baktiseraga</option>
                     <option value="Desa Panji">Panji</option>
                     <option value="Desa Panjianom">Panjianom</option>
                     <option value="Desa Sambangan">Sambangan</option>
                     <option value="Desa Selat">Selat</option>
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
             <?php
                $articleFound = false;

                foreach ($eventWisata as $event) :
                    // Logika filter
                    $showArticle = true;

                    if (isset($_GET['desa']) && $_GET['desa'] != '' && $event['tag_admin'] != $_GET['desa']) {
                        $showArticle = false;
                    }

                    if (isset($_GET['prioritas']) && $_GET['prioritas'] == 'on' && $event['prioritas'] != 'Ya') {
                        $showArticle = false;
                    }

                    // Tampilkan artikel jika memenuhi kriteria
                    if ($showArticle) :
                        $articleFound = true;
                ?>
                     <div class="col-md-4 mb-4">
                         <div class="card">
                             <?php
                                // Pecahkan string nama file gambar menjadi array
                                $fotoArray = explode(',', $event['foto_event']);

                                // Ambil nama file gambar pertama (anda dapat menyesuaikan indeks sesuai kebutuhan)
                                $firstFoto = reset($fotoArray);

                                // Buat path lengkap untuk gambar
                                $gambarPath = base_url('assets/img/event/' . $firstFoto);
                                ?>

                             <img class="card-img-top" style="width:auto; height: 150px; object-fit:cover;" src="<?= $gambarPath ?>" alt="<?= $event['nama_event'] ?>">

                             <div class="card-body">
                                 <h5 class="card-title"><?= $event['nama_event'] ?></h5>
                                 <p class="text-muted"><?= $event['tag_admin'] ?></p>
                                 <p class="text-muted">Rilis: <?= $event['created_at'] ?></p>
                                 <a href="<?= base_url('detail_event/' . $event['id_event']) ?>" class="btn btn-primary">Baca Selengkapnya</a>
                             </div>
                         </div>
                     </div>

             <?php endif;
                endforeach; ?>

             <!-- Tampilkan teks "Belum ada artikel" jika tidak ada artikel -->
             <?php if (!$articleFound) : ?>
                 <div class="col-md-12">
                     <p class="text-center">Belum ada event terbaru yang sesuai dengan filter.</p>
                 </div>
             <?php endif; ?>
         </div>

         <!-- End Artikel Lokasi Wisata -->
     </div>
     <footer class="py-3" style="background-color: #96B6C5;">
         <div class="container">
             <p class="m-0 text-center text-black"><b>DenBukit &copy; 2023</b></p>
         </div>
     </footer>
     <!-- end footer -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 </body>

 </html>