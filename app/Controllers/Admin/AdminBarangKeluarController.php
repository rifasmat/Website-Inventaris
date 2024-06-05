<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\RuanganModel;

class AdminBarangKeluarController extends BaseController
{
    protected $BarangKeluarModel;
    protected $BarangModel;
    protected $RuanganModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->BarangKeluarModel = new BarangKeluarModel();
        $this->BarangModel = new BarangModel();
        $this->RuanganModel = new RuanganModel();
    }

    public function index()
    {
        $data['data_barang_keluar'] = $this->BarangKeluarModel->getBarang();
        $data['pager'] = $this->BarangKeluarModel->pager;
        return view('admin/barang-keluar/list', $data);
    }

    public function create()
    {
        // Ambil data gudang untuk option barang
        $data['data_barang'] = $this->BarangModel->findAll();

        // Ambil data ruangan untuk option ruangan
        $data['data_ruangan'] = $this->RuanganModel->findAll();

        return view('admin/barang-keluar/create', $data);
    }

    public function tambah()
    {
        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'barang' => 'required',
            'ruangan' => 'required',
            'kode' => 'required',
            'jumlah' => 'required|integer',
            'tanggalkeluar' => 'required|valid_date',
        ], [
            'barang' => [
                'required' => 'Nama Barang harus dipilih.'
            ],
            'ruangan' => [
                'required' => 'Ruangan harus dipilih.'
            ],
            'kode' => [
                'required' => 'Kode Barang harus dipilih.'
            ],
            'jumlah' => [
                'required' => 'Jumlah Barang harus diisi.',
                'integer' => 'Jumlah Barang harus berupa angka.'
            ],
            'tanggalkeluar' => [
                'required' => 'Tanggal Keluar harus diisi.',
                'valid_date' => 'Tanggal Keluar tidak valid.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $kodeBarang = $this->request->getPost('kode');
        $jumlahKeluar = $this->request->getPost('jumlah');

        // Ambil data barang berdasarkan kode
        $barang = $this->BarangModel->where('barang_kode', $kodeBarang)->first();

        if ($barang) {
            if ($barang['barang_jumlah'] > 0 && $barang['barang_jumlah'] >= $jumlahKeluar) {
                // Kurangi jumlah barang di tabel barang
                $this->BarangModel->update($barang['barang_id'], [ // Gunakan kunci utama yang sesuai
                    'barang_jumlah' => $barang['barang_jumlah'] - $jumlahKeluar
                ]);

                // Simpan data barang keluar ke database
                $data = [
                    'barangkeluar_nama' => $this->request->getPost('barang'),
                    'barangkeluar_kode' => $kodeBarang,
                    'barangkeluar_ruangan' => $this->request->getPost('ruangan'),
                    'barangkeluar_jumlah' => $jumlahKeluar,
                    'barangkeluar_tanggalkeluar' => $this->request->getPost('tanggalkeluar'),
                    'barangkeluar_keterangan' => $this->request->getPost('keterangan'),
                ];

                $this->BarangKeluarModel->save($data);

                // Set flashdata message
                session()->setFlashdata('success', 'Data barang keluar berhasil ditambahkan.');

                return redirect()->to('/admin/barang-keluar/list');
            } else {
                session()->setFlashdata('error', 'Jumlah barang tidak mencukupi di ruangan tersebut.');
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('error', 'Barang tidak ditemukan.');
            return redirect()->back()->withInput();
        }
    }

    public function konfirmasi($id)
    {
        $data['barang'] = $this->BarangKeluarModel->getBarangById($id);
        return view('admin/barang-keluar/konfirmasi', $data);
    }

    public function delete($id)
    {
        $BarangKeluarModel = new BarangKeluarModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $barangkeluar = $BarangKeluarModel->find($id);

        // Jika data tidak ditemukan, tampilkan pesan error
        if (!$barangkeluar) {
            return redirect()->to(base_url('admin/barang-keluar/list'))->with('error', 'Data Barang Keluar tidak ditemukan.');
        }

        // Lakukan proses penghapusan data
        $BarangKeluarModel->delete($id);

        // Redirect dengan pesan sukses
        return redirect()->to(base_url('admin/barang-keluar/list'))->with('success', 'Data Barang Keluar berhasil dihapus.');
    }

    public function getBarangByRuangan($ruangan)
    {
        $BarangModel = new BarangModel();
        $barang = $BarangModel->where('barang_ruangan', $ruangan)->findAll();

        return $this->response->setJSON($barang);
    }

    public function getBarangByNama($barangNama)
    {
        $BarangModel = new BarangModel();
        $barang = $BarangModel->where('barang_nama', $barangNama)->first();

        return $this->response->setJSON($barang);
    }
}
