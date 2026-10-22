function hitung(event) {
    // Mencegah form untuk reload halaman
    event.preventDefault();

    // Mengambil nilai dari input
    const input1 = document.getElementById('angka1').value.trim();
    const input2 = document.getElementById('angka2').value.trim();
    const hasilBox = document.getElementById('hasilBox');

    // Menampilkan kotak hasil
    hasilBox.classList.remove('hidden');

    // Validasi: Cek apakah input hanya berisi angka (bisa desimal atau negatif)
    const isAngkaValid1 = !isNaN(input1) && input1 !== '';
    const isAngkaValid2 = !isNaN(input2) && input2 !== '';

    if (!isAngkaValid1 || !isAngkaValid2) {
        hasilBox.className = 'hasil-box error';
        hasilBox.innerHTML = '<strong>Error!</strong> Input harus berupa angka.';
        return;
    }

    // Mengubah nilai string menjadi tipe data float/number
    const num1 = parseFloat(input1);
    const num2 = parseFloat(input2);

    // Proses Penjumlahan
    const total = num1 + num2;

    // Cek Genap / Ganjil
    // Menggunakan modulus (%) untuk cek sisa bagi dengan 2
    let statusKeterangan = '';
    if (total % 2 === 0) {
        statusKeterangan = 'Genap';
    } else {
        statusKeterangan = 'Ganjil';
    }

    // Tampilkan hasil sukses
    hasilBox.className = 'hasil-box sukses';
    hasilBox.innerHTML = `
        <strong>Hasil Penjumlahan:</strong> ${total}<br>
        <strong>Keterangan:</strong> Bilangan ${statusKeterangan}
    `;
}