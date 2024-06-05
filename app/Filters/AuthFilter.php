<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Lakukan pengecekan otentikasi
        $session = session();

        // Jika pengguna tidak terautentikasi, redirect ke halaman login
        if (!$session->has('pengguna_id')) {
            return redirect()->to(base_url('login/login'));
        }

        // Pengecekan role untuk mengakses halaman admin
        if ($request->uri->getSegment(1) === 'admin' && $session->get('pengguna_role') !== 'admin') {
            return redirect()->to(base_url('user/dashboard'));
        }

        // Pengecekan role untuk mengakses halaman user
        if ($request->uri->getSegment(1) === 'user' && $session->get('pengguna_role') !== 'user') {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Lakukan tindakan setelah eksekusi controller, jika diperlukan
        return $response;
    }
}
