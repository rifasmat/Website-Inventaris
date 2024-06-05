<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SuplierModel;

class AdminSuplierController extends BaseController
{
    protected $SuplierModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->SuplierModel = new SuplierModel();
    }

    public function index()
    {
        $data['data_suplier'] = $this->SuplierModel->getSuplier();
        $data['pager'] = $this->SuplierModel->pager;
        return view('admin/suplier/list', $data);
    }

    public function create()
    {
        return view('admin/suplier/create');
    }

    public function tambah()
    {
        // Validation
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama Suplier Tidak Boleh Kosong.',
            ],
            'alamat' => [
                'required' => 'Alamat Suplier Tidak Boleh Kosong.',
            ],
            'telepon' => [
                'required' => 'Telepon Suplier Tidak Boleh Kosong.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/suplier/create'))->withInput();
        }


        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'suplier_nama'          => htmlspecialchars($this->request->getPost('nama')),
                'suplier_alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                'suplier_telepon'       => htmlspecialchars($this->request->getPost('telepon')),
                'suplier_keterangan'    => htmlspecialchars($this->request->getPost('keterangan')),
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),
            ];

            // Simpan data ke database
            $this->SuplierModel->insert($data);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to('admin/suplier/list')->with('success', 'Data Suplier Berhasil Ditambahkan.');
        }

        // Tampilkan form tambah data
        return view('admin/suplier/list');
    }

    public function edit($id)
    {
        $data['suplier'] = $this->SuplierModel->getSuplierById($id);
        return view('admin/suplier/edit', $data);
    }

    public function update($id)
    {
        // Validation
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama Suplier Harus Diisi.',
            ],
            'alamat' => [
                'required' => 'Alamat Suplier Tidak Boleh Kosong.',
            ],
            'telepon' => [
                'required' => 'Telepon Suplier Tidak Boleh Kosong.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/suplier/edit/' . $id))->withInput()->with('errors', service('validation')->getErrors());
        }

        // Ambil data dari form
        $data = [
            'suplier_nama'          => htmlspecialchars($this->request->getPost('nama')),
            'suplier_alamat'        => htmlspecialchars($this->request->getPost('alamat')),
            'suplier_telepon'       => htmlspecialchars($this->request->getPost('telepon')),
            'suplier_keterangan'    => htmlspecialchars($this->request->getPost('keterangan')),
            'created_at'            => date('Y-m-d H:i:s'),
            'updated_at'            => date('Y-m-d H:i:s'),
        ];

        // Update data di database
        $this->SuplierModel->updateSuplier($data, $id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/suplier/list')->with('success', 'Data Suplier Berhasil Diubah.');
    }


    public function konfirmasi($id)
    {
        $data['suplier'] = $this->SuplierModel->getSuplierById($id);

        return view('admin/suplier/konfirmasi', $data);
    }

    public function delete($id)
    {
        $this->SuplierModel->delete($id);
        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/suplier/list')->with('success', 'Data Suplier Berhasil Dihapus.');
    }
}
