<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\GudangModel;
use App\Models\BarangModel;
use App\Models\SuplierModel;
use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;
use App\Models\PenggunaModel;
use App\Models\RuanganModel;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Load models
        $gudangModel = new GudangModel();
        $barangModel = new BarangModel();
        $barangModel = new BarangModel();
        $suplierModel = new SuplierModel();
        $barangMasukModel = new BarangMasukModel();
        $barangKeluarModel = new BarangKeluarModel();
        $penggunaModel = new PenggunaModel();
        $ruanganModel = new RuanganModel();

        // Get total sum from gudang_jumlah
        $totalGudangBarang = $gudangModel->selectSum('gudang_jumlah')->get()->getRow()->gudang_jumlah;

        // Get total sum from barang_jumlah
        $totalBarang = $barangModel->selectSum('barang_jumlah')->get()->getRow()->barang_jumlah;

        // Get total sum from barang_jumlah
        $totalBarangRuangan = $barangModel->selectSum('barang_jumlah')->get()->getRow()->barang_jumlah;

        // Get total count from suplier_nama
        $totalSuplier = $suplierModel->selectCount('suplier_nama')->get()->getRow()->suplier_nama;

        // Get total sum from barangmasuk_jumlah
        $totalBarangMasuk = $barangMasukModel->selectSum('barangmasuk_jumlah')->get()->getRow()->barangmasuk_jumlah;

        // Get total sum from barangkeluar_jumlah
        $totalBarangKeluar = $barangKeluarModel->selectSum('barangkeluar_jumlah')->get()->getRow()->barangkeluar_jumlah;

        // Get total count from pengguna_nama
        $totalPengguna = $penggunaModel->selectCount('pengguna_nama')->get()->getRow()->pengguna_nama;

        // Get total count from ruangan_nama
        $totalRuangan = $ruanganModel->selectCount('ruangan_nama')->get()->getRow()->ruangan_nama;

        // Calculate total items
        $totalSemuaBarang = $totalGudangBarang + $totalBarang;

        // Pass data to the view
        $data = [
            'totalSemuaBarang' => $totalSemuaBarang,
            'totalGudangBarang' => $totalGudangBarang,
            'totalBarangRuangan' => $totalBarangRuangan,
            'totalSuplier' => $totalSuplier,
            'totalBarangMasuk' => $totalBarangMasuk,
            'totalBarangKeluar' => $totalBarangKeluar,
            'totalPengguna' => $totalPengguna,
            'totalRuangan' => $totalRuangan,
        ];

        return view('admin/dashboard', $data);
    }
}
