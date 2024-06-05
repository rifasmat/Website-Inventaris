<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;
use App\Models\PenggunaModel;

class UserPenggunaController extends Controller
{

    protected $PenggunaModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
    }

    public function profil()
    {
        // Ambil ID pengguna dari sesi atau cara lain sesuai kebutuhan
        $penggunaId = session('pengguna_id');

        // Pastikan ID pengguna tersedia sebelum memanggil model
        if (!$penggunaId) {
            return redirect()->to('login'); // Redirect ke halaman login jika tidak ada sesi pengguna
        }

        // Panggil model pengguna untuk mendapatkan data pengguna berdasarkan ID
        $data['pengguna'] = $this->PenggunaModel->getProfilPenggunaById($penggunaId);

        // Pastikan data pengguna tersedia sebelum menampilkan view
        if (!$data['pengguna']) {
            return redirect()->to('login'); // Redirect ke halaman login jika data pengguna tidak ditemukan
        }

        // Tampilkan view profil dengan data pengguna
        return view('user/pengguna/profil', $data);
        return view('user/gudang/list', $data);
    }

    public function updateProfil()
    {
        // Validasi input
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|valid_email',
            'role' => 'required',
            'foto' => 'max_size[foto,5120]|mime_in[foto,image/jpeg,image/png]',
        ];

        $messages = [
            'nama' => [
                'required' => 'Nama Pengguna Tidak Boleh Kosong.',
            ],
            'username' => [
                'required' => 'Username Tidak Boleh Kosong.',
            ],
            'email' => [
                'required' => 'Email Pengguna Tidak Boleh Kosong.',
            ],
            'role' => [
                'required' => 'Level Pengguna Tidak Boleh Kosong.',
            ],
            'foto' => [
                'required' => 'Foto Harus Ditambahkan Max 5 Mb dan Hanya Bisa Format Jpeg dan Png',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('user/pengguna/profil/'))->withInput();
        }

        // Ambil ID pengguna dari sesi
        $penggunaId = session('pengguna_id');

        // Pastikan ID pengguna tersedia sebelum memanggil model
        if (!$penggunaId) {
            return redirect()->to('login'); // Redirect ke halaman login jika tidak ada sesi pengguna
        }

        // Ambil data dari form
        $data = [
            'pengguna_nama' => htmlspecialchars($this->request->getPost('nama')),
            'pengguna_username' => htmlspecialchars($this->request->getPost('username')),
            'pengguna_email' => htmlspecialchars($this->request->getPost('email')),
            'pengguna_role' => htmlspecialchars($this->request->getPost('role')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Cek apakah password baru diinputkan
        $passwordBaru = $this->request->getPost('password');
        if (!empty($passwordBaru)) {
            // Jika password baru diinputkan, tambahkan ke data
            $data['pengguna_password'] = password_hash($passwordBaru, PASSWORD_DEFAULT);
        }

        // Proses upload foto
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/gambar/pengguna', $namaFoto);
            $data['pengguna_foto'] = $namaFoto;
        }

        // Update data di database
        $this->PenggunaModel->updatePengguna($data, $penggunaId);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('user/pengguna/profil')->with('success', 'Profil Pengguna Berhasil Diubah.');
    }
}
