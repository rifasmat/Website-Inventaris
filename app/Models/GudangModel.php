<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangModel extends Model
{
    protected $table = 'gudang';
    protected $primaryKey = 'gudang_id';
    protected $allowedFields = [
        'gudang_nama',
        'gudang_kode',
        'gudang_spesifikasi',
        'gudang_kondisi',
        'gudang_pembelian',
        'gudang_ruangan',
        'gudang_penanggungjawab',
        'gudang_jumlah',
        'gudang_keterangan',
        'created_at',
        'updated_at'
    ];

    public function getGudangById($id)
    {
        $gudang = $this->find($id);

        // Tambahkan log pesan untuk debugging
        log_message('debug', 'Gudang Data by ID (' . $id . '): ' . print_r($gudang, true));

        return $gudang;
    }

    public function updateGudang($data, $id)
    {
        return $this->update($id, $data);
    }

    // Pagination
    public function getGudang($limit = 15, $offset = 0)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit, 'default', $offset);
    }

    public function searchGudang($keyword)
    {
        return $this->like('gudang_nama', $keyword)
            ->findAll();
    }

    // Untuk menyambungkan ke BarangModel
    public function barangs()
    {
        return $this->hasMany(BarangModel::class);
    }
}
