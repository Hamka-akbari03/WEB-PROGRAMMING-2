<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK304 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <?php
    $starCount = 0;
    $message = ""; // Variabel untuk menampung pesan peringatan
    $starUrl = "https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png";

    // Menangkap nilai bintang dari input atau dari tombol Tambah/Kurang
    if (isset($_POST['starCount'])) {
        $starCount = (int)$_POST['starCount'];
    }

    // Aksi jika tombol Tambah ditekan
    if (isset($_POST['add'])) {
        $starCount++;
    } 
    // Aksi jika tombol Kurang ditekan
    elseif (isset($_POST['subtract'])) {
        $starCount--;
        
        // Logika Kondisional: Jika bintang dikurang hingga di bawah 0
        if ($starCount < 0) {
            $starCount = 0; // Kembalikan nilai ke 0 agar tidak minus
            $message = "Bintang tidak bisa dikurang lagi setelah 0 bintang!";
        }
    }

    // Menampilkan form AWAL hanya jika halaman baru dibuka (belum ada request POST sama sekali)
    if (empty($_POST)) {
    ?>
        <form method="POST">
            Jumlah bintang <input type="number" name="starCount" min="0" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php
    // Menampilkan form KEDUA (Bintang dan Tombol) jika sudah disubmit
    } else {
        echo "Jumlah bintang $starCount<br><br>";
        
        // Loop untuk mencetak gambar bintang
        for ($i = 0; $i < $starCount; $i++) {
            echo "<img src='$starUrl' style='width: 30px;'> ";
        }
        
        echo "<br><br>";
        
        // Mencetak pesan peringatan warna merah jika variabel $message tidak kosong
        if (!empty($message)) {
            echo "<h3 style='color: red;'>$message</h3>";
        }
    ?>
        <form method="POST">
            <!-- Menyimpan jumlah bintang saat ini secara tersembunyi -->
            <input type="hidden" name="starCount" value="<?= $starCount ?>">
            <button type="submit" name="add">Tambah</button>
            <button type="submit" name="subtract">Kurang</button>
        </form>
    <?php
    }
    ?>
</body>
</html>