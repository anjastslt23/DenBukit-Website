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
            'harga_masuk' => 'required|numeric',
            'foto_lokasi.*' => 'uploaded[foto_lokasi]|max_size[foto_lokasi,5120]|is_image[foto_lokasi]',
            'cp_1' => 'required|numeric',
            'cp_2' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Mendapatkan ID admin yang login (contoh: diambil dari sesi)
        $tag = session()->get('asal_desa');
        $telp = session()->get('telp_admin');

        // Menggunakan helper generate_uuid() untuk membuat UUID baru
        $id_lokasi = Uuid::uuid4()->toString();

        $fotos = $this->request->getFiles('foto_lokasi');

        // Inisialisasi array untuk menyimpan nama file foto
        $fotoNames = [];

        foreach ($fotos as $foto) {
            foreach ($foto as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Mengecek tipe file yang diterima (hanya gambar)
                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                    if (!in_array($file->getExtension(), $allowedTypes)) {
                        return redirect()->back()->withInput()->with('errors', ['Foto harus dalam format gambar (jpg, jpeg, png, gif).']);
                    }

                    // Mengecek ukuran file (maksimal 5MB)
                    if ($file->getSize() > 5 * 1024 * 1024) {
                        return redirect()->back()->withInput()->with('errors', ['Ukuran foto tidak boleh lebih dari 5MB.']);
                    }

                    // Membuat nama unik untuk file foto
                    $fotoNama = $file->getRandomName();

                    // Pindahkan file foto ke folder public/assets/img
                    $file->move(ROOTPATH . 'public/assets/img/', $fotoNama);

                    // Simpan nama file ke dalam array
                    $fotoNames[] = $fotoNama;
                }
            }
        }
        // Handle upload video jika diunggah
        $video = $this->request->getFile('video_lokasi');
        $videoNama = null;

        if ($video->isValid() && !$video->hasMoved()) {
            // Mengecek tipe file yang diterima (hanya video mp4)
            $allowedTypesVideo = ['mp4'];
            if (!in_array($video->getExtension(), $allowedTypesVideo)) {
                return redirect()->back()->withInput()->with('errors', ['Video harus dalam format mp4.']);
            }

            // Membuat nama unik untuk file video
            $videoNama = $video->getRandomName();

            // Pindahkan file video ke folder public/assets/videos
            $video->move(ROOTPATH . 'public/assets/videos/', $videoNama);
        }

        // Data yang akan disimpan ke database
        $data = [
            'id_lokasi' => $id_lokasi,
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
            'harga' => $this->request->getPost('harga_masuk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tag_lokasi' => $tag,
            'telp_admin' => $telp,
            'cp_1' => $this->request->getPost('cp_1'),
            'cp_2' => $this->request->getPost('cp_2'),
            'foto_lokasi' => implode(',', $fotoNames), // Menyimpan nama file sebagai string dipisahkan koma
            'video_lokasi' => $videoNama,
            // Tambahan field lain sesuai kebutuhan
        ];

        // Simpan data ke database
        $this->lokasiModel->insert($data);

        // Redirect atau berikan respons lain sesuai kebutuhan
        return redirect()->to('admin/dashboard')->with('success', 'Lokasi berhasil ditambahkan');
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
