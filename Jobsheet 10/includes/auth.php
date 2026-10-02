<?php
// guard clause : di include di baris paling atas setiap halaman yang membutuhkan
// login (sebelum header.php mengeluarkan output apapun), agar header (Location: ...) masih bisa di panggil
if (session_status() == PHP_SESSION_NONE) {
  session_start(); 
}
if (!isset($_SESSION['user_id'])) {
  header('Location: ../auth/login.php');
  exit;
}