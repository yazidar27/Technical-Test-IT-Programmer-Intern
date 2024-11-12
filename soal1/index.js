const fs = require('fs');

// Fungsi untuk menghitung biaya parkir
function hitungBiayaParkir(kendaraan) {
    const biayaMasuk = kendaraan.kendaraan === "motor" ? 2000 : 5000;
    const biayaPerJam = kendaraan.kendaraan === "motor" ? 2000 : 3000;
    let waktuParkir = Math.min(kendaraan.waktu_parkir, 15);

    // Hitung biaya berdasarkan waktu parkir
    let biayaParkir = biayaMasuk + (waktuParkir * biayaPerJam);

    if (waktuParkir >= 5) {
        const diskon = Math.floor(waktuParkir / 5) * 5000;
        biayaParkir -= diskon;
    }

    return biayaParkir;
}

// Membaca file JSON secara asynchronous
fs.readFile('file.json', 'utf8', (err, data) => {
    if (err) {
        console.error('Gagal membaca file:', err);
        return;
    }

    // Menguraikan (parse) data JSON
    const kendaraanData = JSON.parse(data);

    const hasilBiayaParkir = kendaraanData.map(kendaraan => {
        const biaya = hitungBiayaParkir(kendaraan);
        return {
            nopol: kendaraan.nopol,
            kendaraan: kendaraan.kendaraan,
            waktu_parkir: kendaraan.waktu_parkir,
            biaya: biaya
        };
    });

    console.log(JSON.stringify(hasilBiayaParkir, null, 2));
});
