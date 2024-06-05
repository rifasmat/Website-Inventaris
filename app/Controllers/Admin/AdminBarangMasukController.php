<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangMasukModel;
use App\Models\GudangModel;
use App\Models\SuplierModel;

class AdminBarangMasukController extends BaseController
{
    protected $BarangMasukModel;
    protected $GudangModel;
    protected $SuplierModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->BarangMasukModel = new BarangMasukModel();
        $this->GudangModel = new GudangModel();
        $this->SuplierModel = new SuplierModel();
    }

    public function index()
    {
        $data['data_barang_masuk'] = $this->BarangMasukModel->getBarang();
        $data['pager'] = $this->BarangMasukModel->pager;
        return view('admin/barang-masuk/list', $data);
    }

    public function create()
    {
        // Ambil data suplier untuk option gudang
        $data['data_gudang'] = $this->GudangModel->findAll();

        // Ambil data suplier untuk option suplier
        $data['data_suplier'] = $this->SuplierModel->findAll();

        return view('admin/barang-masuk/create', $data);
    }

    public function tambah()
    {
        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'barang' => 'required',
            'tanggal' => 'required|valid_date',
            'jumlah' => 'required|integer',
            'suplier' => 'required'
        ], [
            'barang' => [
                'required' => 'Nama Barang harus dipilih.'
            ],
            'tanggal' => [
                'required' => 'Tanggal Masuk harus diisi.',
                'valid_date' => 'Tanggal Masuk tidak valid.'
            ],
            'jumlah' => [
                'required' => 'Jumlah Barang harus diisi.',
                'integer' => 'Jumlah Barang harus berupa angka.'
            ],
            'suplier' => [
                'required' => 'Nama Suplier harus dipilih.'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Simpan data ke database
        $data = [
            'barangmasuk_nama' => $this->request->getPost('barang'),
            'barangmasuk_tanggal' => $this->request->getPost('tanggal'),
            'barangmasuk_jumlah' => $this->request->getPost('jumlah'),
            'barangmasuk_suplier' => $this->request->getPost('suplier')
        ];

        $this->BarangMasukModel->save($data);

        // Set flashdata message
        session()->setFlashdata('success', 'Data barang masuk berhasil ditambahkan.');

        return redirect()->to('/admin/barang-masuk/list');
    }

    public function edit($id)
    {
        $BarangMasukModel = new BarangMasukModel();
        $GudangModel = new GudangModel();
        $SuplierModel = new SuplierModel();

        $data['barang'] = $BarangMasukModel->getBarangById($id);
        $data['data_gudang'] = $GudangModel->findAll();
        $data['data_suplier'] = $SuplierModel->findAll();

        return view('admin/barang-masuk/edit', $data);
    }

    public function update($id)
    {
        $BarangMasukModel = new BarangMasukModel();
        $GudangModel = new GudangModel();
        $SuplierModel = new SuplierModel();

        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'barang' => 'required',
            'tanggal' => 'required|valid_date',
            'jumlah' => 'required|integer',
            'suplier' => 'required'
        ], [
            'barang' => [
                'required' => 'Nama Barang harus dipilih.'
            ],
            'tanggal' => [
                'required' => 'Tanggal Masuk harus diisi.',
                'valid_date' => 'Tanggal Masuk tidak valid.'
            ],
            'jumlah' => [
                'required' => 'Jumlah Barang harus diisi.',
                'integer' => 'Jumlah Barang harus berupa angka.'
            ],
            'suplier' => [
                'required' => 'Nama Suplier harus dipilih.'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $namaBarang = htmlspecialchars($this->request->getPost('barang'));
        $tanggalMasuk = htmlspecialchars($this->request->getPost('tanggal'));
        $jumlahBarang = htmlspecialchars($this->request->getPost('jumlah'));
        $suplier = htmlspecialchars($this->request->getPost('suplier'));

        // Lakukan proses update ke database
        $dataBarang = [
            'barangmasuk_nama' => $namaBarang,
            'barangmasuk_tanggal' => $tanggalMasuk,
            'barangmasuk_jumlah' => $jumlahBarang,
            'barangmasuk_suplier' => $suplier,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $BarangMasukModel->update($id, $dataBarang);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to(base_url('admin/barang-masuk/list'))->with('success', 'Data Barang Berhasil Diubah.');
    }

    public function konfirmasi($id)
    {
        $data['barang'] = $this->BarangMasukModel->getBarangById($id);
        return view('admin/barang-masuk/konfirmasi', $data);
    }

    public function delete($id)
    {
        $BarangMasukModel = new BarangMasukModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $barangmasuk = $BarangMasukModel->find($id);

        // Jika data tidak ditemukan, tampilkan pesan error
        if (!$barangmasuk) {
            return redirect()->to(base_url('admin/barang-masuk/list'))->with('error', 'Data Barang Masuk tidak ditemukan.');
        }

        // Lakukan proses penghapusan data
        $BarangMasukModel->delete($id);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('admin/barang-masuk/list'))->with('success', 'Data Barang Masuk berhasil dihapus.');
    }
}
