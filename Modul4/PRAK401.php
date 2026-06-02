<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK401</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 15px;
        }
        td {
            border: 1px solid black;
            padding: 5px 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <form method="POST">
        Panjang: <input type="number" name="length" required><br>
        Lebar: <input type="number" name="width" required><br>
        Nilai: <input type="text" name="value" required><br>
        <button type="submit" name="print">Cetak</button>
    </form>

    <?php
    if (isset($_POST['print'])) {
        $length = $_POST['length'];
        $width = $_POST['width'];
        $valueString = $_POST['value'];

        $valueArray = explode(" ", $valueString);

        $totalElements = $length * $width;

        if (count($valueArray) == $totalElements) {
            echo "<table>";
            $index = 0; 

            for ($i = 0; $i < $length; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $width; $j++) {
                    echo "<td>" . $valueArray[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<br><b>Panjang nilai tidak sesuai dengan ukuran matriks</b>";
        }
    }
    ?>

</body>
</html>