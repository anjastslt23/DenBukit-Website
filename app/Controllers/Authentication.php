<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class Authentication extends BaseController
{
    public function index()
    {

        if (session()->get('logged_in')) {
            return redirect()->back();
        }
        helper('form');
        return view('login');
    }

    public function register()
    {
        helper('form');
        $data['title'] = 'DenBukit | Registrasi Admin';
        return view('register', $data);
    }

    public function signIn()
    {
        helper('form');
        // Validasi form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal mempunyai {param} karakter.'
                ]
            ]
        ]);

        // Jalankan validasi
        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembalikan dengan pesan kesalahan
            return redirect()->to('/signin')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Lakukan pengecekan login
        $admin = $this->adminModel->where('email_admin', $email)->first();
        if ($admin) {
            // Cek apakah password sesuai
            $cekpw = password_verify($password, $admin['password']);
            // dd($cekpw);
            if ($cekpw) {
                // Login berhasil
                // Sesuaikan logika sesuai kebutuhan Anda
                $ses_data = [
                    'id_admin' => $admin['id_admin'],
                    'email' => $admin['email_admin'],
                    'asal_desa' => $admin['asal_desa'],
                    'telp_admin' => $admin['telp_admin'],
                    'nama' => $admin['nama_admin'], // Anda dapat menggantinya sesuai kebutuhan
                    'logged_in' => TRUE
                ];
                // dd($ses_data);
                $this->session->set($ses_data);
                // Jika username dan password benar, login berhasil
                return redirect()->to('admin/dashboard')->with('successLogin', 'Selamat datang.');
            } else {
                // Password tidak sesuai
                return redirect()->to('/signin')->withInput()->with('errors', 'Password tidak sesuai.');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->to('/signin')->withInput()->with('errors', 'Pengguna dengan email tersebut tidak ditemukan.');
        }
    }

    public function signUp()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[admin.email_admin]|valid_email',
                'errors' => [
                    'required' => 'Masukkan email aktif anda',
                    'is_unique' => 'Email ini sudah terdaftar di Sistem Kami',
                    'valid_email' => 'Harap masukkan email yang valid',
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Masukkan nama lengkap anda',
                    'min_length' => '{field} minimal memiliki {param} karakter',
                ]
            ],
            'asal_desa' => [
                'label' => 'Asal Desa',
                'rules' => 'required|is_unique[admin.asal_desa]',
                'errors' => [
                    'required' => 'Tentukan asal desa anda',
                    'is_unique' => 'Desa ini sudah memiliki admin terdaftar',
                ]
            ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required|is_unique[admin.telp_admin]',
                'errors' => [
                    'required' => 'Masukkan nomor telepon aktif anda',
                    'is_unique' => 'Nomor ini sudah terdaftar di Sistem Kami',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Masukkan password anda',
                    'min_length' => '{field} minimal memiliki {param} karakter',
                ]
            ],
            'konfirmasi_password' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Masukkan ulang password anda',
                    'matches' => 'Password yang anda masukkan berbeda',
                ]
            ],
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $email = $this->request->getPost('email');
            $asal = $this->request->getPost('asal_desa');
            $email_data = $this->adminModel->where('email_admin', $email)->first();
            $asal_data = $this->adminModel->where('asal_desa', $asal)->first();
            if ($email_data) {
                $this->session->setFlashdata('error', 'Email ini sudah terdaftar di Sistem Kami.');
                return redirect()->to('register');
            }
            if ($asal_data) {
                $this->session->setFlashdata('error', 'Desa ini sudah memiliki admin terdaftar.');
                return redirect()->to('register');
            }
            $id = Uuid::uuid4()->toString();
            $addAdmin = [
                'id_admin' => $id,
                'email_admin' => $this->request->getPost('email'),
                'nama_admin' => $this->request->getPost('nama'),
                'asal_desa' => $this->request->getPost('asal_desa'),
                'telp_admin' => $this->request->getPost('telepon'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->adminModel->save($addAdmin);
            return redirect()->to('signin')->withInput('success', 'Akun berhasil dibuat');
        } else {
            session()->setFlashdata('validation', $validation->getErrors());
            return redirect()->to('register')->withInput();
        }
    }

    public function logouT()
    {
        // Lakukan proses logout, seperti menghapus session
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang diinginkan
        return redirect()->to('/');
    }
}
