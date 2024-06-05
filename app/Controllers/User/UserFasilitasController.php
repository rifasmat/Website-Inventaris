<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;

class UserFasilitasController extends BaseController
{
    protected $FasilitasModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->FasilitasModel = new FasilitasModel();
    }

    public function index()
    {
        $data['data_fasilitas'] = $this->FasilitasModel->getFasilitas();
        $data['pager'] = $this->FasilitasModel->pager;
        return view('user/fasilitas/list', $data);
    }
}
