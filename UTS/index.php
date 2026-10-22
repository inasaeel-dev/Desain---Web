<?php
// Inisialisasi variabel awal
$hasil = "";
$status = "";
$error = "";

// Cek apakah form sudah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input1 = trim($_POST['angka1']);
    $input2 = trim($_POST['angka2']);

    // Validasi: Cek apakah input berupa angka
    if (!is_numeric($input1) || !is_numeric($input2)) {
        $error = "Error! Input harus berupa angka.";
    } else {
        // Konversi ke tipe data numerik
        $num1 = floatval($input1);
        $num2 = floatval($input2);

        // Hitung penjumlahan
        $total = $num1 + $num2;

        // Cek ganjil atau genap
        if ($total % 2 == 0) {
            $keterangan = "Genap";
        } else {
            $keterangan = "Ganjil";
        }

        $hasil = "Hasil Penjumlahan: <strong>$total</strong><br>Keterangan: Bilangan <strong>$keterangan</strong>";
        $status = "sukses";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Penjumlahan PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="card">
        <h2>Kalkulator Penjumlahan</h2>
        <p class="subtitle">Hitung total angka dan cek ganjil/genap (PHP)</p>

        <!-- Form mengirim data ke halaman ini sendiri menggunakan method POST -->
        <form method="POST" action="">
            <div class="input-group">
                <label for="angka1">Angka Pertama:</label>
                <input type="text" name="angka1" id="angka1" value="<?php echo isset($_POST['angka1']) ? $_POST['angka1'] : ''; ?>" required>
            </div>

            <div class="input-group">
                <label for="angka2">Angka Kedua:</label>
                <input type="text" name="angka2" id="angka2" value="<?php echo isset($_POST['angka2']) ? $_POST['angka2'] : ''; ?>" required>
            </div>

            <button type="submit">Hitung</button>
        </form>

        <!-- Tampilkan Pesan Error jika input bukan angka -->
        <?php if (!empty($error)): ?>
            <div class="hasil-box error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Tampilkan Hasil jika sukses -->
        <?php if (!empty($hasil)): ?>
            <div class="hasil-box sukses">
                <?php echo $hasil; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="javascript.js"></script>
</body>
</html>