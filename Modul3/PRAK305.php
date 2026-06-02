<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK305 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="stringInput" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $stringInput = $_POST['stringInput'];
        // Menghitung panjang dari string masukan
        $length = strlen($stringInput);

        echo "<h2>Input:</h2>";
        echo "$stringInput <br>";

        echo "<h2>Output:</h2>";
        // Loop pertama: Mengambil setiap huruf satu per satu
        for ($i = 0; $i < $length; $i++) {
            // Memaksa huruf menjadi huruf kecil sebagai nilai dasar
            $char = strtolower($stringInput[$i]);
            
            // Loop kedua: Mencetak huruf tersebut sebanyak panjang string ($length)
            for ($j = 0; $j < $length; $j++) {
                // Huruf urutan pertama (j == 0) dicetak Kapital
                if ($j == 0) {
                    echo strtoupper($char);
                } else {
                    echo $char;
                }
            }
        }
    }
    ?>
</body>
</html>