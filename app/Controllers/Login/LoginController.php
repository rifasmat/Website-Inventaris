<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class LoginController extends BaseController
{

    protected $PenggunaModel;
    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
    }

    public function index()
    {
        // Tampilkan halaman login
        return view('login/login');
    }

    public function processLogin()
    {
        $penggunaModel = new PenggunaModel();

        // Ambil data dari form
        $username = filter_var($this->request->getPost('username'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($this->request->getPost('password'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // validasi input username dan password
        if (empty($username) && empty($password)) {
            return redirect()->to(base_url('login'))->with('message', 'Username dan password tidak boleh kosong');
        } elseif (empty($username)) {
            return redirect()->to(base_url('login'))->with('message', 'Username tidak boleh kosong');
        } elseif (empty($password)) {
            return redirect()->to(base_url('login'))->with('message', 'Password tidak boleh kosong');
        }

        // Cari pengguna berdasarkan username
        $pengguna = $penggunaModel->where('pengguna_username', $username)->first();

        if ($pengguna) {
            // Verifikasi password
            if (!empty($password) && password_verify($password, $pengguna['pengguna_password'])) {
                // Set session pengguna
                $session = session();
                $session->set([
                    'pengguna_id'       => $pengguna['pengguna_id'],
                    'pengguna_username' => $pengguna['pengguna_username'],
                    'pengguna_role'     => $pengguna['pengguna_role'],
                ]);

                // Redirect ke dashboard sesuai role
                if ($pengguna['pengguna_role'] == 'admin') {
                    return redirect()->to(base_url('admin/dashboard'));
                } else {
                    return redirect()->to(base_url('user/dashboard'));
                }
            } else {
                // Password kosong atau tidak cocok
                return redirect()->to(base_url('login'))->with('message', 'Password salah');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->to(base_url('login'))->with('message', 'Pengguna tidak ditemukan');
        }
    }

    public function logout()
    {
        // Hapus session
        $session = session();
        $session->destroy();

        // Redirect ke halaman login setelah logout
        return redirect()->to(base_url('login'));
    }
}
