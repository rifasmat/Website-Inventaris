<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\PenggunaModel;

class AdminPenggunaController extends Controller
{

    protected $PenggunaModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $data['data_pengguna'] = $this->PenggunaModel->getPengguna();
        $data['pager'] = $this->PenggunaModel->pager;
        return view('admin/pengguna/list', $data);
    }

    public function create()
    {
        return view('admin/pengguna/create');
    }

    public function tambah()
    {
        // Validasi input
        $rules = [
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|valid_email',
            'role' => 'required',
            'password' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/jpeg,image/png]',
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
            'password' => [
                'required' => 'Password Pengguna Tidak Boleh Kosong.',
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to(base_url('admin/pengguna/create'))->withInput();
        }

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form
            $data = [
                'pengguna_nama'      => htmlspecialchars($this->request->getPost('nama')),
                'pengguna_username'  => htmlspecialchars($this->request->getPost('username')),
                'pengguna_email'     => htmlspecialchars($this->request->getPost('email')),
                'pengguna_password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'pengguna_role'      => htmlspecialchars($this->request->getPost('role')),
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ];

            // Proses upload foto
            $foto = $this->request->getFile('foto');
            $namaFoto = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/gambar/pengguna', $namaFoto);
            $data['pengguna_foto'] = $namaFoto;

            // Simpan data ke database
            $this->PenggunaModel->insert($data);

            // Redirect atau tampilkan pesan sukses
            return redirect()->to('admin/pengguna/list')->with('success', 'Data Pengguna Berhasil Ditambahkan.');
        }

        // Tampilkan form tambah data
        return view('admin/pengguna/list');
    }

    public function edit($id)
    {
        $data['pengguna'] = $this->PenggunaModel->GetPenggunaById($id);
        return view('admin/pengguna/edit', $data);
    }

    public function update($id)
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
            return redirect()->to(base_url('admin/pengguna/edit/' . $id))->withInput();
        }

        // Ambil data dari form
        $data = [
            'pengguna_nama' => htmlspecialchars($this->request->getPost('nama')),
            'pengguna_username' => htmlspecialchars($this->request->getPost('username')),
            'pengguna_email' => htmlspecialchars($this->request->getPost('email')),
            'pengguna_password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'pengguna_role' => htmlspecialchars($this->request->getPost('role')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Cek apakah password baru diinputkan
        $passwordBaru = $this->request->getPost('password');

        if (!empty($passwordBaru)) {
            // Jika password baru diinputkan, tambahkan ke data
            $data['pengguna_password'] = password_hash($passwordBaru, PASSWORD_DEFAULT);
        } else {
            // Jika password baru tidak diinputkan, hapus key 'pengguna_password' dari $data
            unset($data['pengguna_password']);
        }

        // Proses upload foto jika ada file yang diunggah
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama
            $fotoLama = $this->PenggunaModel->getFotoById($id);
            if (!empty($fotoLama)) {
                unlink(ROOTPATH . 'public/gambar/pengguna/' . $fotoLama);
            }

            // Simpan foto baru
            $namaFoto = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/gambar/pengguna', $namaFoto);
            $data['pengguna_foto'] = $namaFoto;
        }

        // Update data di database
        $this->PenggunaModel->updatePengguna($data, $id);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/pengguna/list')->with('success', 'Data Pengguna Berhasil Diubah.');
    }

    public function konfirmasi($id)
    {
        $data['pengguna'] = $this->PenggunaModel->getPenggunaById($id);

        return view('admin/pengguna/konfirmasi', $data);
    }

    public function delete($id)
    {
        // Ambil informasi foto pengguna sebelum dihapus
        $fotoPengguna = $this->PenggunaModel->getFotoById($id);

        // Hapus pengguna dari database
        $this->PenggunaModel->delete($id);

        // Hapus foto pengguna dari folder jika ada
        if (!empty($fotoPengguna)) {
            $fotoPath = FCPATH . 'gambar/pengguna/' . $fotoPengguna;
            if (is_file($fotoPath) && file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('admin/pengguna/list')->with('success', 'Data Pengguna Berhasil Dihapus.');
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
        return view('admin/pengguna/profil', $data);
        return view('admin/gudang/list', $data);
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
            return redirect()->to(base_url('admin/pengguna/profil/'))->withInput();
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
        return redirect()->to('admin/pengguna/profil')->with('success', 'Profil Pengguna Berhasil Diubah.');
    }
}
