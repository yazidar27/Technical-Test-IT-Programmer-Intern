const express = require('express');
const app = express();
const port = 3003;

// Data kendaraan dan fungsi perhitungan biaya
const kendaraanData = [
  {"nopol": "KB 9234 KT", "kendaraan": "motor", "waktu_parkir": 3},
  {"nopol": "AA 3245 TYC", "kendaraan": "mobil", "waktu_parkir": 7},
  {"nopol": "KB 9133 RE", "kendaraan": "motor", "waktu_parkir": 10},
  {"nopol": "B 9234 TU", "kendaraan": "mobil", "waktu_parkir": 15},
  {"nopol": "AD 9124 GH", "kendaraan": "motor", "waktu_parkir": 5},
  {"nopol": "AD 9004 YGU", "kendaraan": "mobil", "waktu_parkir": 4},
  {"nopol": "B 9277 IOB", "kendaraan": "mobil", "waktu_parkir": 12},
  {"nopol": "AA 1143 BN", "kendaraan": "motor", "waktu_parkir": 8},
  {"nopol": "B 9234 TU", "kendaraan": "mobil", "waktu_parkir": 14}
];

// Fungsi untuk menghitung biaya parkir
function hitungBiayaParkir(kendaraan) {
  const tarifMotorMasuk = 2000;
  const tarifMobilMasuk = 5000;
  const tarifMotorPerJam = 2000;
  const tarifMobilPerJam = 3000;
  const diskonPerKelipatan5Jam = 5000;
  const waktuMaksimum = 15;

  let biayaMasuk = 0;
  let biayaParkir = 0;
  let diskon = 0;

  if (kendaraan.kendaraan === "motor") {
    biayaMasuk = tarifMotorMasuk;
    biayaParkir = Math.min(kendaraan.waktu_parkir, waktuMaksimum) * tarifMotorPerJam;
  } else if (kendaraan.kendaraan === "mobil") {
    biayaMasuk = tarifMobilMasuk;
    biayaParkir = Math.min(kendaraan.waktu_parkir, waktuMaksimum) * tarifMobilPerJam;
  }

  if (kendaraan.waktu_parkir >= 5) {
    const kelipatan5Jam = Math.floor(kendaraan.waktu_parkir / 5);
    diskon = kelipatan5Jam * diskonPerKelipatan5Jam;
  }

  const totalBiaya = biayaMasuk + biayaParkir - diskon;
  
  return {
    nopol: kendaraan.nopol,
    kendaraan: kendaraan.kendaraan,
    waktu_parkir: kendaraan.waktu_parkir,
    biaya: totalBiaya
  };
}

const hasilBiayaParkir = kendaraanData.map(hitungBiayaParkir);

// Route untuk mendapatkan response JSON
app.get('/biaya-parkir', (req, res) => {
  res.json(hasilBiayaParkir);
});

// Menjalankan server pada port 3000
app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}/biaya-parkir`);
});
