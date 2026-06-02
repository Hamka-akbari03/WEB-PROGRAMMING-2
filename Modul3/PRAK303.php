<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK303 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        Batas Bawah: <input type="number" name="lowerBound" required><br>
        Batas Atas: <input type="number" name="upperBound" required><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['submit'])) {
        $lowerBound = $_POST['lowerBound'];
        $upperBound = $_POST['upperBound'];
        
        // Link gambar bintang standar yang bisa langsung dirender browser
        $starUrl = "https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png";
        
        $i = $lowerBound;
        
        // Implementasi perulangan do-while
        do {
            // Cek apakah (bilangan + 7) adalah kelipatan 5
            if (($i + 7) % 5 == 0) {
                echo "<img src='$starUrl' style='width: 15px;'> ";
            } else {
                echo "$i ";
            }
            $i++;
        } while ($i <= $upperBound);
    }
    ?>
</body>
</html>