<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RuanganModel;
use App\Models\BarangModel;

class AdminRuanganController extends BaseController
{
    protected $RuanganModel;
    protected $BarangModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->RuanganModel = new RuanganModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data['data_ruangan'] = $this->RuanganModel->getRuangan();
        $data['pager'] = $this->RuanganModel->pager;
        return view('admin/ruangan/list', $data);
    }


    public function create()
    {
        return view('admin/ruangan/create');
    }

    public function tambah()
    {
        // Validation
        $rules = [
            'kode' => 'required|is_unique[ruangan.ruangan_kode]',
            'nama' => 'required|is_unique[ruangan.ruangan_nama]',
        ];

        $messages = [
            'kode' => [
                'required' => 'Kode Ruangan Tidak Boleh Kosong.',
                'is_unique' => 'Kode Ruangan Sudah Digunakan.',
            ],
            'nama' => [
                'required' => ' Nama Ruangan Tidak Boleh Kosong.',
                'is_unique' => 'Nama Ruangan Sudah Digunakan.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/ruangan/create'))->withInput();
        }

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'ruangan_kode' => htmlspecialchars($this->request->getPost('kode')),
                'ruangan_nama' => htmlspecialchars($this->request->getPost('nama')),
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ];

            // Simpan data ke database
            $this->RuanganModel->insert($data);

            // Ambil data barang yang terkait dengan ruangan baru
            $data_barang = $this->BarangModel->getBarangByRuangan($data['ruangan_nama']);

            // Buat template file untuk admin
            $templateAdmin = view('admin/ruangan/template_ruangan_admin', ['ruangan_nama' => $data['ruangan_nama'], 'data_barang' => $data_barang]);
            $this->buatFileTemplate('admin/ruangan', strtolower($data['ruangan_nama']), $templateAdmin);

            // Buat template file untuk user
            $templateUser = view('user/ruangan/template_ruangan_user', ['ruangan_nama' => $data['ruangan_nama'], 'data_barang' => $data_barang]);
            $this->buatFileTemplate('user/ruangan', strtolower($data['ruangan_nama']), $templateUser);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to('admin/ruangan/list')->with('success', 'Data Ruangan Berhasil Ditambahkan.');
        }

        // Tampilkan form tambah data
        return view('admin/ruangan/create');
    }


    protected function buatFileTemplate($path, $fileName, $content)
    {
        $dirPath = APPPATH . 'Views/' . $path;

        // Pastikan folder sudah ada atau buat folder jika belum ada
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755, true);
        }

        // Ubah nama file menjadi huruf kecil dan ganti spasi dengan _
        $fileName = strtolower(str_replace(' ', '_', $fileName));

        // Buat file template
        $filePath = $dirPath . '/' . $fileName . '.php';
        file_put_contents($filePath, $content);
    }

    public function showTemplate()
    {
        $ruanganNama = 'NamaRuangan'; // Ganti dengan nama ruangan yang sesuai
        $data['ruangan'] = $this->RuanganModel->getRuanganByNama($ruanganNama);

        // Get data barang based on ruangan
        $data['data_barang'] = $data['ruangan']->barangs ?? [];

        $data['ruangan_nama'] = $ruanganNama;

        return view('admin/ruangan/template_ruangan_admin', $data);
    }

    public function lihatRuangan($ruanganNama)
    {
        // Menggunakan model atau cara lainnya untuk mendapatkan data ruangan berdasarkan nama
        $data['ruangan'] = $this->RuanganModel->getRuanganByNama($ruanganNama);

        // Get data barang based on ruangan
        $data['data_barang'] = $data['ruangan']->barangs ?? [];

        // Pass $ruangan_nama to the view
        $data['ruangan_nama'] = $ruanganNama;

        $ruanganFile = str_replace(' ', '_', strtolower($ruanganNama));

        return view('admin/ruangan/' . $ruanganFile, $data);
    }


    public function konfirmasi($id)
    {
        $data['ruangan'] = $this->RuanganModel->getRuanganById($id);

        return view('admin/ruangan/konfirmasi', $data);
    }

    public function delete($id)
    {
        // Dapatkan data yang akan dihapus
        $data = $this->RuanganModel->find($id);

        // Periksa apakah data ditemukan
        if (empty($data)) {
            // Jika data tidak ditemukan, redirect atau tampilkan pesan kesalahan
            return redirect()->to('admin/ruangan/list')->with('error', 'Data tidak ditemukan');
        }

        // Hapus file terkait di views/admin/ruangan
        $adminFilePath = APPPATH . 'Views/admin/ruangan/' . strtolower(str_replace(' ', '_', $data['ruangan_nama'])) . '.php';
        if (file_exists($adminFilePath)) {
            unlink($adminFilePath);
        }

        // Hapus file terkait di views/user/ruangan
        $userFilePath = APPPATH . 'Views/user/ruangan/' . strtolower(str_replace(' ', '_', $data['ruangan_nama'])) . '.php';
        if (file_exists($userFilePath)) {
            unlink($userFilePath);
        }

        // Hapus data dari database
        $this->RuanganModel->delete($id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/ruangan/list')->with('success', 'Data Ruangan Berhasil Dihapus.');
    }
}
