<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'pengguna_id';
    protected $allowedFields = [
        'pengguna_nama',
        'pengguna_username',
        'pengguna_email',
        'pengguna_password',
        'pengguna_role',
        'pengguna_foto',
        'created_at',
        'updated_at'
    ];

    // untuk mengambil pengguna_id
    public function getPenggunaById($id)
    {
        return $this->find($id);
    }

    // Untuk mengambil id dari foto ketika akan di edit dan dihapus
    public function getFotoById($id)
    {
        $foto = $this->asArray()
            ->select('pengguna_foto')
            ->where(['pengguna_id' => $id])
            ->first();

        return !empty($foto['pengguna_foto']) ? $foto['pengguna_foto'] : null;
    }


    public function updatePengguna($data, $id)
    {
        return $this->update($id, $data);
    }

    // Pagination
    public function getPengguna($limit = 10, $offset = 0)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit, 'default', $offset);
    }

    public function getProfilPenggunaById($id)
    {
        return $this->asArray()
            ->where(['pengguna_id' => $id])
            ->first();
    }

    public function searchPengguna($keyword)
    {
        return $this->like('pengguna_nama', $keyword)
            ->findAll();
    }
}
