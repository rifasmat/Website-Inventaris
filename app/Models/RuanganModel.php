<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = 'ruangan';
    protected $primaryKey = 'ruangan_id';
    protected $allowedFields = [
        'ruangan_kode',
        'ruangan_nama',
        'created_at',
        'updated_at'
    ];

    // untuk mengambil ruangan_id
    public function getRuanganById($id)
    {
        return $this->find($id);
    }

    // untuk mengambil ruangan_nama
    public function getRuanganByNama($ruanganNama)
    {
        return $this->where('ruangan_nama', $ruanganNama)
            ->first();
    }

    // Pagination
    public function getRuangan($limit = 10, $offset = 0)
    {
        return $this->orderBy('created_at', 'ASC')->paginate($limit, 'default', $offset);
    }

    public function searchRuangan($keyword)
    {
        return $this->like('ruangan_nama', $keyword)
            ->findAll();
    }

    // Untuk Menampilkan Di Form Barang
    public function barangs()
    {
        return $this->hasMany(BarangModel::class, 'ruangan_id', 'ruangan_id');
    }
}
