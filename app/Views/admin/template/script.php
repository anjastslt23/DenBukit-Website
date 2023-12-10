<!-- Required Script for admin websites -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/1ae4387474.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>

<!-- Node Modules -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script><!-- End Node Modules -->
<!-- Logout confirmation -->
<script>
    function logoutConfirmation() {
        Swal.fire({
            title: 'Peringatan',
            text: 'Sesi akan diakhiri.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#54B435',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Keluar',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('/logout') ?>";
            }
        })
    }
</script>
<!-- end logout confirmation -->
<!-- datatables script -->
<script>
    $(document).ready(function() {
        $('#main-table').DataTable({
            "responsive": true, //responsifitas
            "paging": false, // Aktifkan paging
            "searching": true, // Aktifkan fitur pencarian
            "ordering": false, // Aktifkan pengurutan
            "info": true // Tampilkan informasi tabel
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#event-table').DataTable({
            "responsive": true, //responsifitas
            "paging": false, // Aktifkan paging
            "searching": true, // Aktifkan fitur pencarian
            "ordering": false, // Aktifkan pengurutan
            "info": true // Tampilkan informasi tabel
        });
    });
</script>
<!-- end datatables script -->
<!-- Tinymce -->
<script>
    tinymce.init({
        selector: '#deskripsi',
        height: 300,
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 14px; }'
    });
</script>
<!-- end tinymce -->
<!-- start alert -->
<script>
    function confirmDeleteLokasi(id_lokasi) {
        Swal.fire({
            title: 'Hapus informasi dari lokasi ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#FF1E1E',
            cancelButtonColor: '#0F6292',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Tidak jadi',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('admin/lokasi/hapus/'); ?>" + id_lokasi;
            }
        })
    }
</script>
<!-- end sweetalert -->
<!-- toastr -->


<!-- end toastr -->