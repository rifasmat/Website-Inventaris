<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BarangMasukModel;
use App\Models\GudangModel;
use App\Models\SuplierModel;

class UserBarangMasukController extends BaseController
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
        return view('user/barang-masuk/list', $data);
    }
}
