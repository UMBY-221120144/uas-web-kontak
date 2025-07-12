<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/update/<?= $kontak['id']; ?>" method="post">
  <?= csrf_field(); ?>
  <input type="hidden" name="_method" value="POST">

  <div class="mb-3">
    <label for="name" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= esc($kontak['name']); ?>" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="<?= esc($kontak['email']); ?>" required>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Nomor HP</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($kontak['phone']); ?>" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Alamat</label>
    <textarea class="form-control" id="address" name="address" rows="3"><?= esc($kontak['address']); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Perbarui</button>
  <a href="/" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection(); ?>