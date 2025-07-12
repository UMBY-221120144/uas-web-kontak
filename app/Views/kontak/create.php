<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/store" method="post">
  <?= csrf_field(); ?>
  <div class="mb-3">
    <label for="name" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Nomor HP</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Alamat</label>
    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="/" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection(); ?>