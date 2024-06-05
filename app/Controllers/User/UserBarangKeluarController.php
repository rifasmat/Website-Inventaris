<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BarangKeluarModel;
use App\Models\BarangModel;
use App\Models\RuanganModel;

class UserBarangKeluarController extends BaseController
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
        return view('user/barang-keluar/list', $data);
    }
}
