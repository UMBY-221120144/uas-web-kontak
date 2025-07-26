<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title); ?> | Aplikasi Kontak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= base_url('/') ?>">Manajemen Kontak</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <?php if (session()->get('isLoggedIn')): ?>
            <!-- Tautan yang terlihat saat pengguna sudah login -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Daftar Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/create') ?>">Tambah Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-danger btn-sm ms-2" href="<?= base_url('/logout') ?>">
                <i class="fas fa-sign-out-alt me-1"></i> Logout (<?= esc(session()->get('username')) ?>)
              </a>
            </li>
          <?php else: ?>
            <!-- Tautan yang terlihat saat pengguna belum login -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/register') ?>">Register</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">

    <?php if (session()->getFlashdata('success')): ?>
      <div class="col-md-10 mx-auto alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
      <div class="col-md-10 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
      <div class="col-md-10 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
          <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="card shadow-sm">
          <div class="card-header">
            <h1 class="h4 card-title mb-0"><?= esc($title); ?></h1>
          </div>
          <div class="card-body">
            <?= $this->renderSection('content'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>