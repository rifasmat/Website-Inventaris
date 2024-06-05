<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = 'fasilitas_id';
    protected $allowedFields = [
        'fasilitas_foto',
        'fasilitas_keterangan',
        'created_at',
        'updated_at'
    ];

    // untuk mengambil fasilitas_id
    public function getFasilitasById($id)
    {
        return $this->find($id);
    }

    // Untuk mengambil id dari foto ketika akan di edit dan dihapus
    public function getFotoById($id)
    {
        $foto = $this->asArray()
            ->select('fasilitas_foto')
            ->where(['fasilitas_id' => $id])
            ->first();

        return !empty($foto['fasilitas_foto']) ? $foto['fasilitas_foto'] : null;
    }


    public function updateFasilitas($data, $id)
    {
        return $this->update($id, $data);
    }

    // Pagination
    public function getFasilitas($limit = 10, $offset = 0)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit, 'default', $offset);
    }
}
