<main class="container">
  <div class="card-login">
    <h2>Login Petugas</h2>
    
    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <button type="submit" class="btn">Masuk</button>
    </form>

    <p class="register-text">
      Belum punya akun? <a href="register.php">Daftar di sini</a>
    </p>
  </div>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>