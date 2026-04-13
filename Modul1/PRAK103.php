<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 1 - Soal 3</title>
</head>
<body>
    <?php
    // Nilai input Celcius dideklarasikan secara statis
    $celcius = 37.841;

    // Rumus konversi suhu dari Celcius
    $fahrenheit = ($celcius * 9/5) + 32;
    $reamur = $celcius * 4/5;
    $kelvin = $celcius + 273.15;

    // Menampilkan hasil dengan format 4 desimal
    // Saya menggunakan ',' sebagai pemisah desimal agar sama persis dengan contoh output di modul
    echo "Fahrenheit (F) = " . number_format($fahrenheit, 4, ',', '') . "<br>";
    echo "Reamur (R) = " . number_format($reamur, 4, ',', '') . "<br>";
    echo "Kelvin (K) = " . number_format($kelvin, 4, ',', '') . "<br>";
    ?>
</body>
</html>