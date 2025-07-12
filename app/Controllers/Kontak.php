<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class Kontak extends BaseController
{
  protected $kontakModel;

  public function __construct()
  {
    // Inisialisasi model di dalam constructor
    $this->kontakModel = new KontakModel();
  }

  /**
   * Menampilkan halaman utama dengan daftar kontak.
   */
  public function index()
  {
    $data = [
      'title' => 'Daftar Kontak',
      'kontak_list' => $this->kontakModel->findAll() // Mengambil semua data kontak
    ];

    return view('kontak/index', $data);
  }

  /**
   * Menampilkan form untuk membuat kontak baru.
   */
  public function create()
  {
    $data = [
      'title' => 'Tambah Kontak Baru'
    ];

    return view('kontak/create', $data);
  }

  /**
   * Menyimpan data kontak baru ke database.
   */
  public function store()
  {
    // Mengambil data dari form
    $data = [
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'phone' => $this->request->getPost('phone'),
      'address' => $this->request->getPost('address'),
    ];

    // Menyimpan data ke database menggunakan model
    $this->kontakModel->save($data);

    // Mengatur flashdata untuk notifikasi dan redirect
    session()->setFlashdata('pesan', 'Data kontak berhasil ditambahkan.');
    return redirect()->to('/');
  }

  /**
   * Menampilkan form untuk mengedit kontak.
   */
  public function edit($id)
  {
    $data = [
      'title' => 'Edit Kontak',
      'kontak' => $this->kontakModel->find($id) // Mengambil data kontak berdasarkan ID
    ];

    return view('kontak/edit', $data);
  }

  /**
   * Memperbarui data kontak di database.
   */
  public function update($id)
  {
    // Mengambil data dari form
    $data = [
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'phone' => $this->request->getPost('phone'),
      'address' => $this->request->getPost('address'),
    ];

    // Memperbarui data di database
    $this->kontakModel->update($id, $data);

    session()->setFlashdata('pesan', 'Data kontak berhasil diperbarui.');
    return redirect()->to('/');
  }

  /**
   * Menghapus data kontak.
   */
  public function delete($id)
  {
    $this->kontakModel->delete($id);
    session()->setFlashdata('pesan', 'Data kontak berhasil dihapus.');
    return redirect()->to('/');
  }
}
