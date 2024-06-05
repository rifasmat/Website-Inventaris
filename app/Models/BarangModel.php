<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = [
        'barang_koderuangan',
        'barang_nama',
        'barang_kode',
        'barang_pembelian',
        'barang_spesifikasi',
        'barang_kondisi',
        'barang_ruangan',
        'barang_jumlah',
        'barang_keterangan',
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
        return $this->like('barang_nama', $keyword)
            ->findAll();
    }

    // Untuk menyambungkan ke Gudang Model
    public function gudang()
    {
        return $this->belongsTo(GudangModel::class, 'gudang_id');
    }

    // Untuk menyambungkan ke RuanganModel
    public function ruangan()
    {
        return $this->belongsTo(RuanganModel::class, 'ruangan_id', 'ruangan_id');
    }


    public function getBarangByRuangan($ruanganNama)
    {
        return $this->where('barang_ruangan', $ruanganNama)->findAll();
    }
}
