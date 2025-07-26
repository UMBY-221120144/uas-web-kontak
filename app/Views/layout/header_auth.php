<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Aplikasi Manajemen Kontak') ?></title>
  <!-- Memuat Bootstrap CSS dari CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Memuat Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      /* Menggunakan font Inter */
      background-color: #f0f2f5;
      /* Warna latar belakang yang lebih terang */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      /* Memastikan body mengisi seluruh tinggi viewport */
      margin: 0;
    }

    .auth-container {
      max-width: 450px;
      /* Lebar maksimum untuk form login/register */
      width: 100%;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .auth-container h2 {
      color: #007bff;
      margin-bottom: 25px;
      text-align: center;
      font-weight: bold;
    }

    .form-control {
      border-radius: 8px;
      /* Sudut lebih membulat */
      padding: 12px 15px;
      border: 1px solid #ced4da;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 8px;
      padding: 10px 20px;
      font-size: 1.1rem;
      width: 100%;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .text-center a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
    }

    .text-center a:hover {
      text-decoration: underline;
    }

    .alert {
      border-radius: 8px;
      font-size: 0.9rem;
    }

    .form-label {
      font-weight: 600;
      color: #343a40;
    }
  </style>
</head>

<body>
  <div class="auth-container">
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
          <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>