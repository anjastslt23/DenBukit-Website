<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/required/brand.png') ?>" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('https://img.freepik.com/free-photo/vibrant-colors-flow-abstract-wave-pattern-generated-by-ai_188544-9781.jpg?w=996&t=st=1699540682~exp=1699541282~hmac=984f27f713828b78a9cfd4fd320ebd24b9bbed96442fb1663ad986fa65f0001c');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px 5px 0 0;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .input-group-prepend .input-group-text {
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center"><b>FORM PENDAFTARAN</b></div>
                    <div class="card-body">
                        <form action="<?= site_url('register/process') ?>" method="post">
                            <?= csrf_field() ?>
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control <?= session('validation.email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Masukkan email anda" value="<?= old('email') ?>">
                                <?php if (session('validation.email')) : ?>
                                    <div class="invalid-feedback"><?= session('validation.email') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control <?= session('validation.nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" placeholder="Masukkan nama anda" value="<?= old('nama') ?>">
                                <?php if (session('validation.nama')) : ?>
                                    <div class="invalid-feedback"><?= session('validation.nama') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="asal_desa">Asal Desa</label>
                                <select class="form-control <?= session('validation.asal_desa') ? 'is-invalid' : '' ?>" id="asal_desa" name="asal_desa">
                                    <option value="" selected disabled>Pilih Asal Desa</option>
                                    <option value="Desa Ambengan">Desa Ambengan</option>
                                    <option value="Desa Baktiseraga">Desa Baktiseraga</option>
                                    <option value="Desa Panji">Desa Panji</option>
                                    <option value="Desa Panjianom">Desa Panjianom</option>
                                    <option value="Desa Sambangan">Desa Sambangan</option>
                                    <option value="Desa Selat">Desa Selat</option>
                                    <option value="Desa Tengalinggah">Desa Tengalinggah</option>
                                    <option value="Desa Wanagiri">Desa Wanagiri</option>
                                </select>
                                <?php if (session('validation.asal_desa')) : ?>
                                    <div class="invalid-feedback"><?= session('validation.asal_desa') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control <?= session('validation.telepon') ? 'is-invalid' : '' ?>" id="telepon" name="telepon" placeholder="Masukkan nomor telepon anda" value="<?= old('telepon') ?>">
                                <?php if (session('validation.telepon')) : ?>
                                    <div class="invalid-feedback"><?= session('validation.telepon') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control <?= session('validation.password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Masukkan password anda">
                                <?php if (session('validation.password')) : ?>
                                    <div class="invalid-feedback"><?= session('validation.password') ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="password" class="form-control <?= session('validation.konfirmasi_password') ? 'is-invalid' : '' ?>" id="konfirmasi_password" name="konfirmasi_password" placeholder="Masukkan ulang password anda">
                                <?php if (session('validation.konfirmasi_password')) : ?>
                                    <div class="invalid-feedback"><?= session('validation.konfirmasi_password') ?></div>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="text-muted mb-0">Sudah punya akun? <a href="<?= site_url('signin') ?>">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <footer class="py-1 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">DenBukit &copy; 2023</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>