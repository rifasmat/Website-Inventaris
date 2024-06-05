<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\GudangModel;
use App\Models\RuanganModel;

class AdminBarangController extends BaseController
{
    protected $BarangModel;
    protected $GudangModel;
    protected $RuanganModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->GudangModel = new GudangModel();
        $this->RuanganModel = new RuanganModel();
    }

    public function index()
    {
        $data['data_barang'] = $this->BarangModel->getBarang();
        $data['pager'] = $this->BarangModel->pager;
        return view('admin/barang/list', $data);
    }

    public function create()
    {
        // Ambil data gudang untuk option barang
        $data['data_gudang'] = $this->GudangModel->findAll();

        // Ambil data ruangan untuk option ruangan
        $data['data_ruangan'] = $this->RuanganModel->findAll();

        // Ambil semua barang dari gudang
        $data['data_barang'] = $this->BarangModel->findAll();

        return view('admin/barang/create', $data);
    }


    public function tambah()
    {
        // Ambil data Gudang untuk dropdown Nama Barang
        $GudangModel = new GudangModel();
        $data['data_gudang'] = $GudangModel->findAll();

        // Ambil data ruangan 
        $RuanganModel = new RuanganModel();
        $data['data_ruangan'] = $RuanganModel->findAll();


        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'barang' => 'required',
                'kode' => 'required',
                'ruangan' => 'required',
                'penanggungjawab' => 'required',
                'jumlah' => 'required|numeric',
            ];

            $message = [
                'barang' => [
                    'required' => 'Barang Tidak Boleh Kosong.',
                ],
                'kode' => [
                    'required' => 'Kode Barang Tidak Boleh Kosong.',
                ],
                'ruangan' => [
                    'required' => 'Ruangan Tidak Boleh Kosong.',
                ],
                'penanggungjawab' => [
                    'required' => 'Penanggung Jawab Tidak Boleh Kosong.',
                ],
                'jumlah' => [
                    'required' => 'Jumlah Tidak Boleh Kosong.',
                ],
            ];

            if ($this->validate($rules, $message)) {
                $kodeRuanganBarang = htmlspecialchars($this->request->getPost('koderuangan'));
                $namaBarang = htmlspecialchars($this->request->getPost('barang'));
                $kodeBarang = htmlspecialchars($this->request->getPost('kode'));
                $pembelianBarang = htmlspecialchars($this->request->getPost('pembelian'));
                $spesifikasiBarang = htmlspecialchars($this->request->getPost('spesifikasi'));
                $kondisiBarang = htmlspecialchars($this->request->getPost('kondisi'));
                $ruanganBarang = htmlspecialchars($this->request->getPost('ruangan'));
                $penanggungjawabBarang = htmlspecialchars($this->request->getPost('penanggungjawab'));
                $jumlahBarang = $this->request->getPost('jumlah');
                $keteranganBarang = htmlspecialchars($this->request->getPost('keterangan'));

                // Cek apakah barang tersedia di Gudang
                $gudang = $GudangModel->where('gudang_nama', $namaBarang)->first();

                if ($gudang && array_key_exists('gudang_jumlah', $gudang)) {
                    $stokGudang = $gudang['gudang_jumlah'];

                    // Validasi stok di Gudang
                    if ($stokGudang >= $jumlahBarang) {
                        // Kurangi stok di Gudang
                        $GudangModel->update($gudang['gudang_id'], ['gudang_jumlah' => $stokGudang - $jumlahBarang]);

                        // Simpan data ke Barang
                        $barangModel = new BarangModel();
                        $dataBarang = [
                            'barang_koderuangan' => $kodeRuanganBarang,
                            'barang_nama' => $namaBarang,
                            'barang_kode' => $kodeBarang,
                            'barang_pembelian' => $pembelianBarang,
                            'barang_spesifikasi' => $spesifikasiBarang,
                            'barang_kondisi' => $kondisiBarang,
                            'barang_ruangan' => $ruanganBarang,
                            'barang_penanggungjawab' => $penanggungjawabBarang,
                            'barang_jumlah' => $jumlahBarang,
                            'barang_keterangan' => $keteranganBarang,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ];

                        $barangModel->insert($dataBarang);

                        // Redirect atau tampilkan pesan sukses
                        return redirect()->to('admin/barang/list')->with('success', 'Data Barang Berhasil Ditambahkan.');
                    } else {
                        // Tampilkan pesan kesalahan karena stok di Gudang tidak mencukupi
                        return redirect()->to('admin/barang/create')->with('error', 'Jumlah di Gudang Tidak Mencukupi.');
                    }
                } else {
                    // Tampilkan pesan kesalahan karena data gudang tidak ditemukan
                    return redirect()->to('admin/barang/create')->with('error', 'Data Barang Di Gudang Tidak Ditemukan.');
                }
            } else {
                // Jika validasi gagal, kembalikan dengan error
                $data['validation'] = $this->validator;
            }
        }

        return view('admin/barang/create', $data);
    }

    public function edit($id)
    {
        $BarangModel = new BarangModel();
        $RuanganModel = new RuanganModel();

        $data['barang'] = $BarangModel->getBarangById($id);
        $data['data_ruangan'] = $RuanganModel->findAll();

        return view('admin/barang/edit', $data);
    }

    public function update($id)
    {
        $BarangModel = new BarangModel();
        $RuanganModel = new RuanganModel();

        $data['data_ruangan'] = $RuanganModel->findAll();

        if ($this->request->getMethod() === 'post') {
            // Validasi input
            $rules = [
                'nama' => 'required',
                'kode' => 'required',
                'ruangan' => 'required',
                'penanggungjawab' => 'required',
                'jumlah' => 'required|numeric',
            ];

            $message = [
                'nama' => [
                    'required' => 'Nama Barang Tidak Boleh Kosong.',
                ],
                'kode' => [
                    'required' => 'Kode Barang Tidak Boleh Kosong.',
                ],
                'ruangan' => [
                    'required' => 'Ruangan Tidak Boleh Kosong.',
                ],
                'penanggungjawab' => [
                    'required' => 'Penanggung Jawab Tidak Boleh Kosong.',
                ],
                'jumlah' => [
                    'required' => 'Jumlah Tidak Boleh Kosong.',
                ],
            ];

            if ($this->validate($rules, $message)) {
                $kodeRuanganBarang = htmlspecialchars($this->request->getPost('koderuangan'));
                $namaBarang = htmlspecialchars($this->request->getPost('nama'));
                $kodeBarang = htmlspecialchars($this->request->getPost('kode'));
                $pembelianBarang = htmlspecialchars($this->request->getPost('pembelian'));
                $spesifikasiBarang = htmlspecialchars($this->request->getPost('spesifikasi'));
                $kondisiBarang = htmlspecialchars($this->request->getPost('kondisi'));
                $ruanganBarang = htmlspecialchars($this->request->getPost('ruangan'));
                $penanggungjawabBarang = htmlspecialchars($this->request->getPost('penanggungjawab'));
                $jumlahBarang = $this->request->getPost('jumlah');
                $keteranganBarang = htmlspecialchars($this->request->getPost('keterangan'));

                // Lakukan proses update ke database
                $dataBarang = [
                    'barang_koderuangan' => $kodeRuanganBarang,
                    'barang_nama' => $namaBarang,
                    'barang_kode' => $kodeBarang,
                    'barang_pembelian' => $pembelianBarang,
                    'barang_spesifikasi' => $spesifikasiBarang,
                    'barang_kondisi' => $kondisiBarang,
                    'barang_ruangan' => $ruanganBarang,
                    'barang_penanggungjawab' => $penanggungjawabBarang,
                    'barang_jumlah' => $jumlahBarang,
                    'barang_keterangan' => $keteranganBarang,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $BarangModel->update($id, $dataBarang);

                // Redirect atau tampilkan pesan sukses
                return redirect()->to(base_url('admin/barang/list'))->with('success', 'Data Barang Berhasil Diubah.');
            } else {
                // Jika validasi gagal, kembalikan dengan error
                $data['validation'] = $this->validator;
            }
        }

        // Jika sampai sini, tampilkan kembali form edit dengan data yang telah diinputkan sebelumnya
        $data['barang'] = $BarangModel->getBarangById($id);
        return view('admin/barang/edit', $data);
    }

    public function konfirmasi($id)
    {
        $data['barang'] = $this->BarangModel->getBarangById($id);
        return view('admin/barang/konfirmasi', $data);
    }

    public function delete($id)
    {
        // Mendapatkan informasi ruangan sebelum penghapusan
        $barang = $this->BarangModel->getBarangById($id);

        // Pastikan data barang ada sebelum melanjutkan
        if (!$barang) {
            // Redirect atau tampilkan pesan error
            return redirect()->to('admin/barang/list')->with('error', 'Data Barang tidak ditemukan.');
        }

        $ruanganNama = $barang['barang_ruangan'];

        // Menghapus data barang
        $this->BarangModel->delete($id);

        // Memperbarui tampilan ruangan
        return $this->updateRuanganView($ruanganNama);
    }

    // Menambahkan metode untuk memperbarui tampilan ruangan
    protected function updateRuanganView($ruanganNama)
    {
        // Menggunakan model atau cara lainnya untuk mendapatkan data ruangan berdasarkan nama
        $data['ruangan'] = $this->RuanganModel->getRuanganByNama($ruanganNama);

        // Get data barang based on ruangan
        $data_barang = $this->BarangModel->getBarangByRuangan($ruanganNama);

        // Pass $data_barang to the view
        $data['data_barang'] = $data_barang;

        // Pass $ruangan_nama to the view
        $data['ruangan_nama'] = $ruanganNama;

        $ruanganFile = str_replace(' ', '_', strtolower($ruanganNama));

        // Jika ruangan tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
        if (!$data['ruangan']) {
            // Misalnya, redirect ke halaman tertentu dengan pesan error
            return redirect()->to(base_url('admin/error'))->with('error', 'Ruangan tidak ditemukan.');
        }

        return view('admin/ruangan/' . $ruanganFile, $data);
    }
}
