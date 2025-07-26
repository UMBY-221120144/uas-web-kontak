<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    // Properti untuk menyimpan instance UserModel
    protected $userModel;

    // Konstruktor untuk menginisialisasi UserModel
    public function __construct()
    {
        $this->userModel = new UserModel();
        // Memuat helper form dan URL untuk validasi dan fungsi URL
        helper(['form', 'url']);
    }

    /**
     * Menampilkan halaman registrasi.
     * @return string
     */
    public function register()
    {
        // Menentukan judul halaman
        $data['title'] = 'Daftar Akun Baru';
        // Memuat view header, formulir registrasi, dan footer
        echo view('layout/header_auth', $data); // Menggunakan header khusus untuk halaman auth
        echo view('auth/register');
        echo view('layout/footer_auth'); // Menggunakan footer khusus untuk halaman auth
    }

    /**
     * Menyimpan data pengguna baru ke database setelah proses registrasi.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function store()
    {
        // Aturan validasi untuk input formulir registrasi
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[255]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'conf_password' => 'required_with[password]|matches[password]', // Konfirmasi password harus sama dengan password
        ];

        // Melakukan validasi input
        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembali ke formulir registrasi dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Mengambil data dari input formulir
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'), // Password akan di-hash oleh UserModel
        ];

        // Menyimpan data ke database melalui model
        $this->userModel->save($data);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Menampilkan halaman login.
     * @return string
     */
    public function login()
    {
        // Menentukan judul halaman
        $data['title'] = 'Login';
        // Memuat view header, formulir login, dan footer
        echo view('layout/header_auth', $data); // Menggunakan header khusus untuk halaman auth
        echo view('auth/login');
        echo view('layout/footer_auth'); // Menggunakan footer khusus untuk halaman auth
    }

    /**
     * Memproses otentikasi login pengguna.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function loginAuth()
    {
        // Mengambil instance session
        $session = session();
        // Mengambil input username/email dan password
        $login = $this->request->getPost('login'); // Bisa username atau email
        $password = $this->request->getPost('password');

        // Mencari pengguna berdasarkan username atau email
        $user = $this->userModel->where('username', $login)
                                ->orWhere('email', $login)
                                ->first();

        // Jika pengguna ditemukan
        if ($user) {
            // Memverifikasi password
            if (password_verify($password, $user['password'])) {
                // Jika password cocok, set data session
                $ses_data = [
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'email'      => $user['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data); // Menyimpan data ke session

                // Redirect ke halaman daftar kontak
                return redirect()->to('/')->with('success', 'Selamat datang, ' . $user['username'] . '!');
            } else {
                // Jika password tidak cocok, set flashdata error
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/login')->withInput();
            }
        } else {
            // Jika pengguna tidak ditemukan, set flashdata error
            $session->setFlashdata('error', 'Username atau Email tidak terdaftar.');
            return redirect()->to('/login')->withInput();
        }
    }

    /**
     * Melakukan logout pengguna.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout()
    {
        // Menghapus semua data session
        session()->destroy();
        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}

