<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK302 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        Tinggi : <input type="number" name="height" min="1" required><br>
        Alamat Gambar : <input type="text" name="imageUrl" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $height = $_POST['height'];
        $imageUrl = $_POST['imageUrl'];
        
        $i = 1;
        
        // Loop baris utama (dari atas ke bawah)
        while ($i <= $height) {
            
            // Loop ke-1: Mencetak spasi kosong (gambar transparan)
            // Jumlah spasi bertambah setiap turun baris
            $j = 1;
            while ($j < $i) {
                echo "<img src='$imageUrl' style='width: 25px; opacity: 0;'>";
                $j++;
            }
            
            // Loop ke-2: Mencetak gambar asli yang terlihat
            // Jumlah gambar berkurang setiap turun baris
            $k = 1;
            while ($k <= ($height - $i + 1)) {
                echo "<img src='$imageUrl' style='width: 25px;'>";
                $k++;
            }
            
            // Pindah baris setelah selesai mencetak satu deret horizontal
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>