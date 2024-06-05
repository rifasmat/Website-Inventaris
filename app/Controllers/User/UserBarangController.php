<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\GudangModel;
use App\Models\RuanganModel;

class UserBarangController extends BaseController
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
        return view('user/barang/list', $data);
    }

    public function create()
    {
        // Ambil data gudang untuk option barang
        $data['data_gudang'] = $this->GudangModel->findAll();

        // Ambil data ruangan untuk option ruangan
        $data['data_ruangan'] = $this->RuanganModel->findAll();

        // Ambil semua barang dari gudang
        $data['data_barang'] = $this->BarangModel->findAll();

        return view('user/barang/create', $data);
    }
}
