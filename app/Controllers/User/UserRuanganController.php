<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\RuanganModel;
use App\Models\BarangModel;

class UserRuanganController extends BaseController
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
        return view('user/ruangan/list', $data);
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

        return view('user/ruangan/' . $ruanganFile, $data);
    }
}
