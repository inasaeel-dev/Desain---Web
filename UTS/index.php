<?php
// PHP Backend Engine: Meng-generate Token Akses Unik
$server_seed = "UTS_HITUNG_DISKON_2026";
$security_token = md5(time() . $server_seed);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon & Jam UTS</title>
    
    <!-- KETERKAITAN CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="card">
        <h3>Form Hitung Diskon</h3>

        <!-- KETERKAITAN PHP: Token disimpan pada tag hidden HTML -->
        <input type="hidden" id="php-token" value="<?php echo $security_token; ?>">

        <!-- KETERKAITAN HTML: Form Input -->
        <form id="discount-form">
            <div class="form-group">
                <label for="price">Harga Barang (Rp):</label>
                <input type="text" id="price" placeholder="*******" required>
            </div>
            <div class="form-group">
                <label for="hour">Jam Transaksi:</label>
                <input type="text" id="hour" required>
            </div>
            <button type="submit">Hitung Total</button>
        </form>

        <div id="result-box"></div>
    </div>

    <!-- KETERKAITAN JAVASCRIPT -->
    <script src="script.js"></script>
</body>
</html>