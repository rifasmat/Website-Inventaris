<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplierModel extends Model
{
    protected $table = 'suplier';
    protected $primaryKey = 'suplier_id';
    protected $allowedFields = [
        'suplier_nama',
        'suplier_alamat',
        'suplier_telepon',
        'suplier_keterangan',
        'created_at',
        'updated_at'
    ];

    // Untuk mengambil Suplier_id
    public function getSuplierById($id)
    {
        return $this->find($id);
    }

    public function updateSuplier($data, $id)
    {
        return $this->update($id, $data);
    }

    // Paginations
    public function getSuplier($limit = 15, $offset = 0)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit, 'default', $offset);
    }

    public function searchSuplier($keyword)
    {
        return $this->like('suplier_nama', $keyword)
            ->findAll();
    }
}
