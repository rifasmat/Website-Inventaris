<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\GudangModel;
use App\Models\BarangMasukModel;

class UserGudangController extends BaseController
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
        return view('user/gudang/list', $data);
    }
}
