<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class AddWisata extends BaseController
{
    public function index()
    {
        $data['title'] = 'DenBukit | Penambahan Informasi Tempat Wisata';
        return view('admin/add_wisata', $data);
    }

    public function ProsesLokasi()
    {
        // Validasi Form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_lokasi' => 'required',
            'alamat_lokasi' => 'required',
            'harga_masuk' => 'required',
            'foto_lokasi' => 'uploaded[foto_lokasi]|max_size[foto_lokasi,5120]|is_image[foto_lokasi]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Mendapatkan ID admin yang login (contoh: diambil dari sesi)
        $tag = session()->get('asal_desa');
        $telp = session()->get('telp_admin');

        // Menggunakan helper generate_uuid() untuk membuat UUID baru
        $id_lokasi = Uuid::uuid4()->toString();

        $foto = $this->request->getFile('foto_lokasi');

        // Mengecek tipe file dan ukuran sebelum menyimpan
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Mengecek tipe file yang diterima (hanya gambar)
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($foto->getExtension(), $allowedTypes)) {
                return redirect()->back()->withInput()->with('errors', ['Foto harus dalam format gambar (jpg, jpeg, png, gif).']);
            }

            // Mengecek ukuran file (maksimal 5MB)
            if ($foto->getSize() > 5 * 1024 * 1024) {
                return redirect()->back()->withInput()->with('errors', ['Ukuran foto tidak boleh lebih dari 5MB.']);
            }

            // Membuat nama unik untuk file foto
            $fotoNama = $foto->getRandomName();

            // Pindahkan file foto ke folder public/assets/img
            $foto->move(ROOTPATH . 'public/assets/img/', $fotoNama);

            // Data yang akan disimpan ke database
            $data = [
                'id_lokasi' => $id_lokasi,
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'foto_lokasi' => $fotoNama,
                'harga' => $this->request->getPost('harga_masuk'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tag_lokasi' => $tag,
                'telp_admin' => $telp,
                // Tambahan field lain sesuai kebutuhan
            ];

            // Simpan data ke database
            $this->lokasiModel->insert($data);

            // Redirect atau berikan respons lain sesuai kebutuhan
            return redirect()->to('admin/dashboard')->with('success', 'Lokasi berhasil ditambahkan');
        }

        // Jika ada kesalahan saat mengunggah file
        return redirect()->back()->withInput()->with('errors', ['Gagal mengunggah foto.']);
    }

    public function hapusLokasi($id_lokasi)
    {
        // Lakukan pengecekan apakah akun dengan ID yang diberikan ada dalam database
        $lokasi = $this->lokasiModel->find($id_lokasi);

        if ($lokasi) {
            // Jika akun ditemukan, hapus akun tersebut dari database
            $this->lokasiModel->table('lokasi_wisata')->where('id_lokasi', $id_lokasi)->delete();
            session()->setFlashdata('success', 'Akun berhasil dihapus.');
        } else {
            // Jika akun tidak ditemukan, tampilkan pesan error
            session()->setFlashdata('error', 'Akun tidak ditemukan.');
        }

        // Redirect ke halaman pengguna setelah penghapusan
        return redirect()->to('admin/dashboard');
    }

    public function setPrioritas($id_lokasi, $status)
    {
        // Check if data exists before updating
        $lokasiData = $this->lokasiModel->find($id_lokasi);

        if (!$lokasiData) {
            return redirect()->back()->withInput()->with('error', 'Tidak ada perubahan.');
        }

        // Update logic
        $updateData = ['prioritas' => $status];

        // Perform the update
        $this->lokasiModel->update($id_lokasi, $updateData);

        // Redirect back with success message
        $message = ($status == 'ya') ? 'Set ke prioritas.' : 'Set ke normal.';
        return redirect()->back()->withInput()->with('success', $message);
    }
}
