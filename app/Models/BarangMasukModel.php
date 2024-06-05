<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barangmasuk';
    protected $primaryKey = 'barangmasuk_id';
    protected $allowedFields = [
        'barangmasuk_nama',
        'barangmasuk_tanggal',
        'barangmasuk_jumlah',
        'barangmasuk_suplier',
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
        return $this->like('barangmasuk_nama', $keyword)
            ->findAll();
    }
}
