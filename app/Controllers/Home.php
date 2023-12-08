<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if (session()->get('logged_in')) {
            return redirect()->back();
        }
        $data['title'] = 'DenBukit | Informasi Wisata';
        // $data['prioritizedLocations'] = $this->lokasiModel->where('prioritas', 'Ya')->findAll();
        return view('welcome_message', $data);
    }

    public function prioritizedLocations()
    {
        // Panggil model atau lakukan query langsung ke database
        // untuk mendapatkan data lokasi yang memiliki prioritas
        $prioritizedLocations = $this->lokasiModel->getPrioritizedLocations();

        // Mengirim data sebagai respons JSON
        return $this->response->setJSON($prioritizedLocations);
    }

    public function filter()
    {
        // Ambil nilai filter dari request
        $desa = $this->request->getGet('desa');
        $prioritas = $this->request->getGet('prioritas');

        // Redirect ke halaman artikel dengan parameter filter
        return redirect()->to("artikel/?desa=$desa&prioritas=$prioritas");
    }

    public function detailLoc($id_lokasi)
    {
        $data['title'] = 'DenBukit | Info Lokasi';
        $data['infoloc'] = $this->lokasiModel->find($id_lokasi);
        return view('info_lokasi', $data);
    }

    public function detailEvent($id_event)
    {
        $data['title'] = 'DenBukit | Info Lokasi';
        $data['infoevent'] = $this->eventModel->find($id_event);
        return view('info_event', $data);
    }

    public function artikel()
    {
        $data['title'] = 'DenBukit | Artikel Tempat Wisata';
        $data['lokasiWisata'] = $this->lokasiModel->findAll();
        return view('artikel', $data);
    }

    public function event()
    {
        $data['title'] = 'DenBukit | Event Tempat Wisata';

        // Mengambil data event dan mengurutkannya berdasarkan tanggal mulai (contoh)
        $data['eventWisata'] = $this->eventModel->orderBy('tgl_mulai', 'DESC')->findAll();

        return view('event', $data);
    }
}
