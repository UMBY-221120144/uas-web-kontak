<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  // Nama tabel yang digunakan oleh model ini
  protected $table = 'users';

  // Primary key dari tabel
  protected $primaryKey = 'id';

  // Mengizinkan penulisan pada kolom-kolom berikut
  // Password akan di-hash sebelum disimpan, jadi tidak perlu diisi langsung dari input
  protected $allowedFields = ['username', 'email', 'password'];

  // Menggunakan fitur timestamps untuk kolom created_at dan updated_at
  protected $useTimestamps = true;

  // Nama kolom untuk created_at
  protected $createdField  = 'created_at';

  // Nama kolom untuk updated_at
  protected $updatedField  = 'updated_at';

  // Aturan validasi untuk data yang disimpan
  protected $validationRules = [
    'username' => 'required|alpha_numeric_space|min_length[3]|max_length[255]|is_unique[users.username]',
    'email'    => 'required|valid_email|is_unique[users.email]',
    'password' => 'required|min_length[6]',
  ];

  // Pesan kesalahan validasi kustom
  protected $validationMessages = [
    'username' => [
      'required'          => 'Username harus diisi.',
      'alpha_numeric_space' => 'Username hanya boleh mengandung huruf, angka, dan spasi.',
      'min_length'        => 'Username minimal 3 karakter.',
      'max_length'        => 'Username maksimal 255 karakter.',
      'is_unique'         => 'Username ini sudah digunakan.',
    ],
    'email'    => [
      'required'      => 'Email harus diisi.',
      'valid_email'   => 'Email tidak valid.',
      'is_unique'     => 'Email ini sudah terdaftar.',
    ],
    'password' => [
      'required'      => 'Password harus diisi.',
      'min_length'    => 'Password minimal 6 karakter.',
    ],
    'conf_password' => [
      'matches'       => 'Konfirmasi Password tidak sesuai',
    ],
  ];

  // Callback sebelum menyimpan data (untuk hashing password)
  protected $beforeInsert = ['hashPassword'];
  protected $beforeUpdate = ['hashPassword'];

  /**
   * Fungsi callback untuk melakukan hashing password sebelum disimpan ke database.
   * @param array $data Data yang akan disimpan.
   * @return array Data yang sudah di-hash.
   */
  protected function hashPassword(array $data)
  {
    if (isset($data['data']['password'])) {
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    }
    return $data;
  }
}
