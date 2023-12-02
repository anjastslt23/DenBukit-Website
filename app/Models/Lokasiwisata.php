<?php

namespace App\Models;

use CodeIgniter\Model;

class Lokasiwisata extends Model
{
    protected $table            = 'lokasi_wisata';
    protected $primaryKey       = 'id_lokasi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_lokasi', 'nama_lokasi', 'alamat_lokasi', 'foto_lokasi', 'video_lokasi', 'harga', 'deskripsi', 'tag_lokasi', 'prioritas', 'telp_admin', 'cp_1', 'cp_2'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function showdata()
    {
        return $this->db->table('lokasi_wisata')->where('deleted_at', null);
    }

    public function setPrioritas($id_lokasi, $aksi)
    {
        // Lakukan query atau perubahan status prioritas sesuai dengan kebutuhan
        // ...

        // Contoh menggunakan Query Builder
        $this->db->table('lokasi_wisata')->where('id_lokasi', $id_lokasi);

        // Sesuaikan dengan nama kolom yang menyimpan status prioritas
        $this->db->table('lokasi_wisata')->set('prioritas', $aksi == 'ya' ? 'ya' : 'tidak');

        $this->db->table('lokasi_wisata')->update('lokasi_wisata');
    }

    public function Prioritized()
    {
        return $this->db->table('lokasi_wisata')->where('prioritas', 'Ya');
    }

    // LokasiModel.php

    public function getPrioritizedLocations()
    {
        // Lakukan query ke database untuk mendapatkan data lokasi yang memiliki prioritas
        // Gantilah sesuai dengan struktur dan relasi tabel yang Anda miliki
        $query = $this->db->query("SELECT * FROM lokasi_wisata WHERE prioritas = 'Ya'");

        // Ambil hasil query sebagai array
        $result = $query->getResultArray();

        return $result;
    }

    public function getFilteredLocations($desa = null, $prioritas = null)
    {
        $builder = $this->db->table('lokasi_wisata');

        // Filter berdasarkan desa
        if (!empty($desa)) {
            $builder->where('tag_lokasi', $desa);
        }

        // Filter berdasarkan prioritas
        if (!empty($prioritas) && $prioritas == 'on') {
            $builder->where('prioritas', 'Ya');
        }

        // Eksekusi query dan kembalikan hasilnya
        return $builder->get()->getResultArray();
    }
}
