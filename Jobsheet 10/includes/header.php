<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$sudahLogin = isset($_SESSION['user_id']);
?>
...
    <header>
        <h1>SIMPUS-Mini</h1>
        <button type="button" id="nav-toggle-btn"
        class="nav-toggle-label" aria-label="Menu">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base;
                ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>buku/list.php">Daftar Buku</a></li>
                <?php if ($sudahLogin): ?>
                <li><a href="<?php echo $base; ?>buku/tambah.php">Tambah Buku</a></li>
                <li><a href="<?php echo $base; ?>anggota/list.php">Daftar Anggota</a></li>
                <li><a href="<?php echo $base; ?>anggota/tambah.anggota">Tambah Anggota</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="auth-status">
            <?php if ($sudahLogin): ?>
                <span><?php echo $_SESSION['nama']; ?></span>
                <a href="<?php echo $base; ?>auth/logout.php">Logout</a>
                <?php else: ?> 
                    <a href="<?php echo $base; ?>auth/login.php">Login</a>
                    <?php endif; ?>
        </div>
    </header>