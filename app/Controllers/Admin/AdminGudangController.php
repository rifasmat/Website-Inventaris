<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GudangModel;
use App\Models\BarangMasukModel;

class AdminGudangController extends BaseController
{
    protected $GudangModel;
    protected $BarangMasukModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->GudangModel = new GudangModel();
        $this->BarangMasukModel = new BarangMasukModel();
    }

    public function index()
    {
        $data['data_gudang'] = $this->GudangModel->getGudang();
        $data['pager'] = $this->GudangModel->pager;
        return view('admin/gudang/list', $data);
    }


    public function create()
    {
        // Ambil data suplier untuk option gudang
        $data['data_gudang'] = $this->GudangModel->findAll();

        // Ambil data suplier untuk option suplier
        $data['data_barangmasuk'] = $this->BarangMasukModel->findAll();

        return view('admin/gudang/create', $data);
    }

    public function tambah()
    {
        // Validation
        $rules = [
            'barang' => 'required',
            'kode' => 'required',
            'kondisi' => 'required',
            'pembelian' => 'required',
            'penanggungjawab' => 'required',
        ];

        $messages = [
            'barang' => [
                'required' => 'Nama Barang Harus Diisi.',
            ],
            'kode' => [
                'required' => 'Kode Barang Harus Diisi.',
            ],
            'kondisi' => [
                'required' => 'Kondisi Barang Harus Diisi.',
            ],
            'pembelian' => [
                'required' => 'Tahun Pembelian Barang Harus Diisi.',
            ],
            'penanggungjawab' => [
                'required' => 'Penanggung Jawab Barang Harus Diisi.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/gudang/create'))->withInput();
        }


        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'gudang_nama'           => htmlspecialchars($this->request->getPost('barang')),
                'gudang_kode'           => htmlspecialchars($this->request->getPost('kode')),
                'gudang_spesifikasi'    => htmlspecialchars($this->request->getPost('spesifikasi')),
                'gudang_kondisi'        => htmlspecialchars($this->request->getPost('kondisi')),
                'gudang_pembelian'      => htmlspecialchars($this->request->getPost('pembelian')),
                'gudang_ruangan'        => htmlspecialchars($this->request->getPost('ruangan')),
                'gudang_penanggungjawab' => htmlspecialchars($this->request->getPost('penanggungjawab')),
                'gudang_jumlah'         => htmlspecialchars($this->request->getPost('jumlah')),
                'gudang_keterangan'     => htmlspecialchars($this->request->getPost('keterangan')),
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),
            ];

            // Simpan data ke database
            $this->GudangModel->insert($data);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to('admin/gudang/list')->with('success', 'Data Gudang Berhasil Ditambahkan.');
        }

        // Tampilkan form tambah data
        return view('admin/gudang/list');
    }


    public function edit($id)
    {
        $data['gudang'] = $this->GudangModel->getGudangById($id);
        return view('admin/gudang/edit', $data);
    }


    public function update($id)
    {
        // Validation
        $rules = [
            'barang' => 'required',
            'kode' => 'required',
            'kondisi' => 'required',
            'pembelian' => 'required',
            'penanggungjawab' => 'required',
        ];

        $messages = [
            'barang' => [
                'required' => 'Nama Barang Tidak Boleh Kosong.',
            ],
            'kode' => [
                'required' => 'Kode Barang Tidak Boleh Kosong.',
            ],
            'kondisi' => [
                'required' => 'Kondisi Barang Tidak Boleh Kosong.',
            ],
            'pembelian' => [
                'required' => 'Tahun Pembelian Barang Tidak Boleh Kosong.',
            ],
            'penanggungjawab' => [
                'required' => 'Penanggung Jawab Barang Tidak Boleh Kosong.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/gudang/edit/' . $id))->withInput()->with('errors', service('validation')->getErrors());
        }

        // Ambil data dari form
        $data = [
            'gudang_nama'           => htmlspecialchars($this->request->getPost('barang')),
            'gudang_kode'           => htmlspecialchars($this->request->getPost('kode')),
            'gudang_spesifikasi'    => htmlspecialchars($this->request->getPost('spesifikasi')),
            'gudang_kondisi'        => htmlspecialchars($this->request->getPost('kondisi')),
            'gudang_pembelian'      => htmlspecialchars($this->request->getPost('pembelian')),
            'gudang_ruangan'        => htmlspecialchars($this->request->getPost('ruangan')),
            'gudang_penanggungjawab' => htmlspecialchars($this->request->getPost('penanggungjawab')),
            'gudang_jumlah'         => htmlspecialchars($this->request->getPost('jumlah')),
            'gudang_keterangan'     => htmlspecialchars($this->request->getPost('keterangan')),
            'updated_at'            => date('Y-m-d H:i:s'),
        ];

        // Update data di database
        $this->GudangModel->updateGudang($data, $id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/gudang/list')->with('success', 'Data Gudang Berhasil Diubah.');
    }


    public function konfirmasi($id)
    {
        $data['gudang'] = $this->GudangModel->getGudangById($id);

        return view('admin/gudang/konfirmasi', $data);
    }

    public function delete($id)
    {
        $this->GudangModel->delete($id);
        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/gudang/list')->with('success', 'Data Gudang Berhasil Dihapus.');
    }
}
