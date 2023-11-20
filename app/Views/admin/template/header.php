<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="shortcut icon" href="<?= base_url('assets/required/brand.png') ?>" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Node Modules -->
    <link rel="stylesheet" href="<?= base_url('node_modules/datatables.net-dt/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('node_modules/toastr/build/toastr.min.css') ?>">
    <!-- End Node Modules -->
    <!-- Another addon -->
    <link rel="stylesheet" href="<?= base_url('assets/tinymce/js/tinymce/skins/ui/oxide/skin.min.css') ?>">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .navbar {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #fff;
        }

        .card {
            margin-bottom: 20px;
        }

        footer {
            margin-top: auto;
        }
    </style>
    <link rel="stylesheet" href="<?= base_url('node_modules/sweetalert2/dist/sweetalert2.min.css') ?>">
</head>
<?= view('admin/template/script') ?>