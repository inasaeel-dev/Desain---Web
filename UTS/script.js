document.addEventListener("DOMContentLoaded", function () {
  const calcForm = document.getElementById("calc-form");
  const resultBox = document.getElementById("result-box");

  // 1. VERIFIKASI KETERKAITAN CSS
  // Membaca variabel '--app-integrity-key' dari style.css
  const cssKey = getComputedStyle(document.documentElement)
    .getPropertyValue("--app-integrity-key")
    .trim()
    .replace(/['"]/g, "");

  if (cssKey !== "CSS_LOADED_OK") {
    showError("FATAL ERROR: File 'style.css' tidak ditemukan atau terputus!");
    if (calcForm) calcForm.style.display = "none";
    return; // Hentikan sistem jika CSS dihapus
  }

  // 2. VERIFIKASI KETERKAITAN PHP & HTML
  const phpToken = document.getElementById("php-token");
  if (!phpToken || !phpToken.value || phpToken.value === "PHP_ERROR") {
    showError(
      "FATAL ERROR: Engine PHP tidak aktif atau file 'index.php' rusak!",
    );
    if (calcForm) calcForm.style.display = "none";
    return; // Hentikan sistem jika PHP dihapus/rusak
  }

  // 3. LOGIKA INTERAKSI & VALIDASI HANYA ANGKA
  calcForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const input1 = document.getElementById("num1").value.trim();
    const input2 = document.getElementById("num2").value.trim();

    // Validasi Ketat: Hanya Boleh Angka (Regex)
    const numberRegex = /^-?\d+(\.\d+)?$/;

    if (!numberRegex.test(input1) || !numberRegex.test(input2)) {
      showError("ERROR: Input hanya boleh berisi angka!");
      return;
    }

    const val1 = parseFloat(input1);
    const val2 = parseFloat(input2);
    const total = val1 + val2;

    // Penentuan Genap / Ganjil
    let parity = "";
    if (Number.isInteger(total)) {
      parity = total % 2 === 0 ? "GENAP" : "GANJIL";
    } else {
      parity = "DESIMAL (Bukan Genap/Ganjil Bulat)";
    }

    resultBox.className = "box-result";
    resultBox.innerHTML = `
            <strong>Hasil Penjumlahan:</strong> ${total}<br>
            <strong>Kategori:</strong> ${parity}<br>
            <small style="color:#777;">Server Token: ${phpToken.value}</small>
        `;
  });

  function showError(msg) {
    resultBox.className = "box-error";
    resultBox.innerHTML = msg;
  }
});
