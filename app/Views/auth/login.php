        <h2 class="mb-4"><?= esc($title) ?></h2>
        <form action="<?= base_url('/login/auth') ?>" method="post">
          <?= csrf_field() ?> <!-- Proteksi CSRF -->

          <div class="mb-3">
            <label for="login" class="form-label">Username atau Email</label>
            <input type="text" class="form-control" id="login" name="login" value="<?= old('login') ?>" required>
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <button type="submit" class="btn btn-primary mb-3">Login</button>
        </form>
        <div class="text-center">
          Belum punya akun? <a href="<?= base_url('/register') ?>">Daftar di sini</a>
        </div>