<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = 'barangkeluar';
    protected $primaryKey = 'barangkeluar_id';
    protected $allowedFields = [
        'barangkeluar_nama',
        'barangkeluar_kode',
        'barangkeluar_tanggalmasuk',
        'barangkeluar_ruangan',
        'barangkeluar_jumlah',
        'barangkeluar_tanggalkeluar',
        'barangkeluar_keterangan',
        'created_at',
        'updated_at'
    ];

    // Untuk mengambil barang_id
    public function getBarangById($id)
    {
        return $this->find($id);
    }

    public function updateBarang($data, $id)
    {
        return $this->update($id, $data);
    }

    // Paginations
    public function getBarang($limit = 15, $offset = 0)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit, 'default', $offset);
    }

    public function searchBarang($keyword)
    {
        return $this->like('barangkeluar_nama', $keyword)
            ->findAll();
    }
}
