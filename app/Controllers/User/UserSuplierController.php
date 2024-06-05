<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\SuplierModel;

class UserSuplierController extends BaseController
{
    protected $SuplierModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->SuplierModel = new SuplierModel();
    }

    public function index()
    {
        $data['data_suplier'] = $this->SuplierModel->getSuplier();
        $data['pager'] = $this->SuplierModel->pager;
        return view('user/suplier/list', $data);
    }
}
