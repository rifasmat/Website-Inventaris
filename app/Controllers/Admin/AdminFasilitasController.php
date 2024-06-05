<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;

class AdminFasilitasController extends BaseController
{
    protected $FasilitasModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->FasilitasModel = new FasilitasModel();
    }

    public function index()
    {
        $data['data_fasilitas'] = $this->FasilitasModel->getFasilitas();
        $data['pager'] = $this->FasilitasModel->pager;
        return view('admin/fasilitas/list', $data);
    }

    public function create()
    {
        return view('admin/fasilitas/create');
    }

    public function tambah()
    {
        // Validasi input
        $rules = [
            'foto' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/jpeg,image/png]',
            'keterangan' => 'required',
        ];

        $messages = [
            'foto' => [
                'required' => 'Foto Tidak Boleh Kosong',
            ],
            'keterangan' => [
                'required' => 'Keterangan Tidak Boleh Kosong.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/fasilitas/create'))->withInput();
        }

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'fasilitas_foto'      => htmlspecialchars($this->request->getPost('foto[]')),
                'fasilitas_keterangan'  => htmlspecialchars($this->request->getPost('keterangan')),
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ];

            // Proses upload foto
            $foto = $this->request->getFile('foto');
            $namaFoto = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/gambar/fasilitas', $namaFoto);
            $data['fasilitas_foto'] = $namaFoto;

            // Simpan data ke database
            $this->FasilitasModel->insert($data);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to('admin/fasilitas/list')->with('success', 'Data fasilitas Berhasil Ditambahkan.');
        }

        // Tampilkan form tambah data
        return view('admin/fasilitas/list');
    }

    public function edit($id)
    {
        $data['fasilitas'] = $this->FasilitasModel->getFasilitasById($id);
        return view('admin/fasilitas/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'keterangan' => 'required',
        ];

        $messages = [
            'keterangan' => [
                'required' => 'Keterangan Tidak Boleh Kosong.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/fasilitas/edit/' . $id))->withInput();
        }

        // Ambil data dari form
        $data = [
            'fasilitas_keterangan' => htmlspecialchars($this->request->getPost('keterangan')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Proses upload foto jika ada file yang diunggah
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama
            $fotoLama = $this->FasilitasModel->getFotoById($id);
            if (!empty($fotoLama)) {
                unlink(ROOTPATH . 'public/gambar/fasilitas/' . $fotoLama);
            }

            // Simpan foto baru
            $namaFoto = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/gambar/fasilitas', $namaFoto);
            $data['fasilitas_foto'] = $namaFoto;
        }

        // Update data di database
        $this->FasilitasModel->updateFasilitas($data, $id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/fasilitas/list')->with('success', 'Data Fasilitas Berhasil Diubah.');
    }


    public function konfirmasi($id)
    {
        $data['fasilitas'] = $this->FasilitasModel->getFasilitasById($id);

        return view('admin/fasilitas/konfirmasi', $data);
    }

    public function delete($id)
    {
        // Ambil informasi foto fasilitas sebelum dihapus
        $fotoFasilitas = $this->FasilitasModel->getFotoById($id);

        // Hapus fasilitas dari database
        $this->FasilitasModel->delete($id);

        // Hapus foto fasilitas dari folder jika ada
        if (!empty($fotoFasilitas)) {
            $fotoPath = FCPATH . 'gambar/fasilitas/' . $fotoFasilitas;
            if (is_file($fotoPath) && file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/fasilitas/list')->with('success', 'Data Fasilitas Berhasil Dihapus.');
    }
}
