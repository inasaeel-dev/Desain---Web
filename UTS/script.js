document.addEventListener("DOMContentLoaded", function () {
  const discountForm = document.getElementById("discount-form");
  const resultBox = document.getElementById("result-box");

  // 1. UJI KETERKAITAN CSS
  const cssKey = getComputedStyle(document.documentElement)
    .getPropertyValue("--app-integrity-key")
    .trim()
    .replace(/['"]/g, "");

  if (cssKey !== "CSS_VALIDATED_OK") {
    showError("FATAL ERROR: File 'style.css' tidak ditemukan atau terputus!");
    if (discountForm) discountForm.style.display = "none";
    return; // Hentikan sistem jika CSS dihapus
  }

  // 2. UJI KETERKAITAN PHP & HTML
  const phpToken = document.getElementById("php-token");
  if (!phpToken || !phpToken.value || phpToken.value === "PHP_ERROR") {
    showError(
      "FATAL ERROR: Engine PHP tidak aktif atau file 'index.php' rusak!",
    );
    if (discountForm) discountForm.style.display = "none";
    return; // Hentikan sistem jika PHP dihapus/rusak
  }

  // 3. LOGIKA DISKON DAN VALIDASI INPUT
  discountForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const priceInput = document.getElementById("price").value.trim();
    const hourInput = document.getElementById("hour").value.trim();

    // Regex Validasi Angka:
    // Harga: Angka positif/desimal
    // Jam: Angka bulat 0-23
    const numberRegex = /^\d+(\.\d+)?$/;
    const integerRegex = /^\d+$/;

    if (!numberRegex.test(priceInput)) {
      showError("ERROR: Harga barang harus berupa angka!");
      return;
    }

    if (!integerRegex.test(hourInput)) {
      showError("ERROR: Input jam harus berupa angka bulat (0-23)!");
      return;
    }

    const price = parseFloat(priceInput);
    const hour = parseInt(hourInput, 10);

    if (price <= 0) {
      showError("ERROR: Harga barang harus lebih besar dari 0!");
      return;
    }

    if (hour < 0 || hour > 23) {
      showError("ERROR: Jam harus berada dalam rentang 0 sampai 23!");
      return;
    }

    // Penentuan Diskon Berdasarkan Jam:
    // Jam 06:00 - 11:59 -> Diskon 10%
    // Jam 12:00 - 17:59 (12 - 6 sore) -> Diskon 15%
    // Jam lainnya -> Tidak Ada Diskon
    let discountRate = 0;
    let discountLabel = "0% (Tidak ada diskon)";

    if (hour >= 6 && hour < 12) {
      discountRate = 0.1;
      discountLabel = "10% (Pagi 06:00 - 12:00)";
    } else if (hour >= 12 && hour < 18) {
      discountRate = 0.15;
      discountLabel = "15% (Siang/Sore 12:00 - 18:00)";
    }

    const discountAmount = price * discountRate;
    const finalPrice = price - discountAmount;

    resultBox.className = "box-result";
    resultBox.innerHTML = `
            <strong>Rincian Transaksi:</strong><br>
            Harga Awal: Rp ${price.toLocaleString("id-ID")}<br>
            Jam Input: ${hour.toString().padStart(2, "0")}:00 WIB<br>
            Diskon: <b>${discountLabel}</b><br>
            Potongan: Rp ${discountAmount.toLocaleString("id-ID")}<br>
            <hr style="border:0; border-top:1px solid #2ecc71; margin:8px 0;">
            <strong>Total Bayar: Rp ${finalPrice.toLocaleString("id-ID")}</strong><br>
            <small style="color:#777;">Token Server: ${phpToken.value}</small>
        `;
  });

  function showError(msg) {
    resultBox.className = "box-error";
    resultBox.innerHTML = msg;
  }
});
