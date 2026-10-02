<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}
$page_title = "Login";
include __DIR__ . '/../includes/header.php';
?>

<main>
  <section class="login-card">
    <h2>Login Petugas</h2>

    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>

      <button type="submit">Masuk</button>
    </form>

    <p style="margin-top: 1.2rem;">
      Belum punya akun? <a href="register.php">Daftar di sini</a>
    </p>
  </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>