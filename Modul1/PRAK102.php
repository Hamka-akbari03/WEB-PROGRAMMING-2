<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 1 - Soal 2</title>
</head>
<body>
    <?php
    // Deklarasi nilai secara statis berdasarkan tabel
    $panjang = 8.9; // Asumsi alas segitiga
    $lebar = 14.7;  // Asumsi tinggi segitiga
    $tinggi = 5.4;  // Tinggi prisma
    
    // Rumus Volume Prisma Alas Segitiga = Luas Alas * Tinggi Prisma
    // Luas Alas (Segitiga) = 1/2 * alas * tinggi_segitiga
    $volume = (0.5 * $panjang * $lebar) * $tinggi;
    
    // Menampilkan hasil dengan 3 angka desimal di belakang koma
    echo number_format($volume, 3, '.', '') . " m3";
    ?>
</body>
</html>