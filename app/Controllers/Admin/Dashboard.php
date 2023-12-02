<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $asal_desa = session()->get('asal_desa');
        $showarticle = $this->lokasiModel->where('tag_lokasi', $asal_desa)->findAll();
        $data['title'] = 'DenBukit | Admin Console';
        $data['showdata'] = $showarticle;
        return view('admin/dashboard', $data);
    }

    public function detailLoc($id_lokasi)
    {
        $data['title'] = 'DenBukit | Info Lokasi';
        $data['infoloc'] = $this->lokasiModel->find($id_lokasi);
        return view('admin/info_lokasi', $data);
    }
}
