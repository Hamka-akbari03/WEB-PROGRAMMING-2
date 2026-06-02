<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK301 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        Jumlah Peserta : <input type="number" name="count" min="1" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $count = $_POST['count'];
        $i = 1;

        // Implementasi perulangan while
        while ($i <= $count) {
            // Logika Kondisional: Cek apakah nilai $i ganjil atau genap
            if ($i % 2 == 1) {
                // Jika sisa bagi 2 adalah 1 (Ganjil), cetak warna merah
                echo "<h2 style='color: red;'>Peserta ke-$i</h2>";
            } else {
                // Jika sisanya 0 (Genap), cetak warna hijau
                echo "<h2 style='color: green;'>Peserta ke-$i</h2>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>