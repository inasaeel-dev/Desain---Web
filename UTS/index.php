<?php
// PHP Backend Engine: Meng-generate token keamanan unik
$server_seed = "UTS_PEMROGRAMAN_WEB_2026";
$security_token = md5(time() . $server_seed);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Penjumlahan & Paritas UTS</title>
    
    <!-- KETERKAITAN CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="card">
        <h3>Aplikasi Penjumlahan</h3>

        <!-- KETERKAITAN PHP: Token disimpan di input hidden HTML -->
        <input type="hidden" id="php-token" value="<?php echo $security_token; ?>">

        <!-- KETERKAITAN HTML: Form Input -->
        <form id="calc-form">
            <div class="input-group">
                <label for="num1">Angka Pertama:</label>
                <input type="text" id="num1" placeholder="Masukkan angka..." required>
            </div>
            <div class="input-group">
                <label for="num2">Angka Kedua:</label>
                <input type="text" id="num2" placeholder="Masukkan angka..." required>
            </div>
            <button type="submit">Hitung Hasil</button>
        </form>

        <div id="result-box"></div>
    </div>

    <!-- KETERKAITAN JAVASCRIPT -->
    <script src="script.js"></script>
</body>
</html>