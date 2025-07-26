<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
  </div>
<?php endif; ?>

<div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No. HP</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($kontak_list)): ?>
        <tr>
          <td colspan="5" class="text-center">Data kosong</td>
        </tr>
      <?php else: ?>

        <?php $i = 1; ?>
        <?php foreach ($kontak_list as $k) : ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= esc($k['name']); ?></td>
            <td><?= esc($k['email']); ?></td>
            <td><?= esc($k['phone']); ?></td>
            <td>
              <a href="/edit/<?= $k['id']; ?>" class="btn btn-sm btn-warning">Edit</a>

              <form action="/delete/<?= $k['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?= $k['name']; ?>?');">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>

    </tbody>
  </table>
</div>

<?= $this->endSection(); ?>