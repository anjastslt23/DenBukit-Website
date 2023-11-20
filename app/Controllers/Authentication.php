<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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



    public function logouT()
    {
        // Lakukan proses logout, seperti menghapus session
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang diinginkan
        return redirect()->to('/');
    }
}
