<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class AddEvent extends BaseController
{
    public function index()
    {
        $data['title'] = 'DenBukit | Pembuatan Event Baru';
        return view('admin/add_event', $data);
    }

    public function ProsesEvent()
    {
        // Validasi Form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_event' => 'required',
            'alamat' => 'required',
            'penyelenggara' => 'required',
            'tgl_mulai' => 'required',
            'biaya_masuk' => 'required',
            'foto_event.*' => 'uploaded[foto_event]|max_size[foto_event,5120]|is_image[foto_event]',
            'cp_1' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $tag_admin = session()->get('asal_desa');
        $telp_admin = session()->get('telp_admin');
        $id_event = Uuid::uuid4()->toString();
        $fotos = $this->request->getFiles('foto_event');

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
                    $file->move(ROOTPATH . 'public/assets/img/event/', $fotoNama);
                    // Simpan nama file ke dalam array
                    $fotoNames[] = $fotoNama;
                }
            }
        }
        // Handle upload video jika diunggah
        $video = $this->request->getFile('video_event');
        $videoNama = null;

        if ($video->isValid() && !$video->hasMoved()) {
            // Mengecek tipe file yang diterima (hanya video mp4)
            $allowedTypesVideo = ['mp4', 'm4v', 'mov', 'asf', 'avi', 'wmv', 'm2ts', '3g2', 'mkv'];
            if (!in_array($video->getExtension(), $allowedTypesVideo)) {
                return redirect()->back()->withInput()->with('errors', ['Format video tidak sesuai']);
            }
            // Membuat nama unik untuk file video
            $videoNama = $video->getRandomName();
            // Pindahkan file video ke folder public/assets/videos
            $video->move(ROOTPATH . 'public/assets/videos/event/', $videoNama);
        }

        // Data yang akan disimpan ke database
        $data = [
            'id_event' => $id_event,
            'nama_event' => $this->request->getPost('nama_event'),
            'alamat_event' => $this->request->getPost('alamat'),
            'penyelenggara' => $this->request->getPost('penyelenggara'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'biaya_masuk' => $this->request->getPost('biaya_masuk'),
            'tag_admin' => $tag_admin,
            'telp_admin' => $telp_admin,
            'cp_1' => $this->request->getPost('cp_1'),
            'foto_event' => implode(',', $fotoNames), // Menyimpan nama file sebagai string dipisahkan koma
            'video_event' => $videoNama,
            'created_at' => date('Y-m-d H:i:s'),
            // Tambahan field lain sesuai kebutuhan
        ];
        // dd($data);
        // Simpan data ke database
        $this->eventModel->insert($data);
        // Redirect atau berikan respons lain sesuai kebutuhan
        return redirect()->to('admin/dashboard')->with('success', 'Event berhasil dibuat');
    }


    public function hapusEvent($id_event)
    {
        // Lakukan pengecekan apakah akun dengan ID yang diberikan ada dalam database
        $event = $this->eventModel->find($id_event);

        if ($event) {
            // Jika akun ditemukan, hapus akun tersebut dari database
            $this->eventModel->table('event_wisata')->where('id_event', $id_event)->delete();
            session()->setFlashdata('success', 'Event telah dihapus.');
        } else {
            // Jika akun tidak ditemukan, tampilkan pesan error
            session()->setFlashdata('error', 'Event tidak ditemukan.');
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
