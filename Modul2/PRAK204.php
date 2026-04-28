<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK204 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        Nilai: <input type="number" name="value" required><br><br>
        <button type="submit" name="convert">Konversi</button>
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $value = $_POST['value'];
        $result = "";

        // Conditional logic to determine the number category
        if ($value == 0) {
            $result = "Nol";
        } elseif ($value > 0 && $value < 10) {
            $result = "Satuan";
        } elseif ($value >= 11 && $value < 20) {
            $result = "Belasan";
        } elseif ($value == 10 || ($value >= 20 && $value < 100)) {
            $result = "Puluhan";
        } elseif ($value >= 100 && $value < 1000) {
            $result = "Ratusan";
        } else {
            // Applies to inputs of 1000 or above
            $result = "Anda Menginput Melebihi Limit Bilangan";
        }

        echo "<h2>Hasil: $result</h2>";
    }
    ?>
</body>
</html>