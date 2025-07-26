        <h2 class="mb-4"><?= esc($title) ?></h2>
        <form action="<?= base_url('/register/store') ?>" method="post">
          <?= csrf_field() ?> <!-- Proteksi CSRF -->

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
            <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['username'])): ?>
              <div class="text-danger mt-1">
                <?= session()->getFlashdata('errors')['username'] ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
            <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['email'])): ?>
              <div class="text-danger mt-1">
                <?= session()->getFlashdata('errors')['email'] ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['password'])): ?>
              <div class="text-danger mt-1">
                <?= session()->getFlashdata('errors')['password'] ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="mb-4">
            <label for="conf_password" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="conf_password" name="conf_password" required>
            <?php if (session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['conf_password'])): ?>
              <div class="text-danger mt-1">
                <?= session()->getFlashdata('errors')['conf_password'] ?>
              </div>
            <?php endif; ?>
          </div>

          <button type="submit" class="btn btn-primary mb-3">Daftar</button>
        </form>
        <div class="text-center">
          Sudah punya akun? <a href="<?= base_url('/login') ?>">Login di sini</a>
        </div>