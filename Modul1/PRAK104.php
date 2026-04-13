<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK104 - MUHAMMAD HAMKA AKBARI</title>
    <style>
        table {
            border: 1px solid black;
            font-family: "Times New Roman", Times, serif; /* Menyesuaikan font di gambar */
        }
        th, td {
            border: 1px solid black;
            padding: 3px 5px; /* Jarak teks dengan garis dibuat agak rapat */
            text-align: left;
        }
        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php
    // Indexed Array
    $smartphone = [
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    ];
    ?>

    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php
        foreach ($smartphone as $hp) {
            echo "<tr><td>" . $hp . "</td></tr>";
        }
        ?>
    </table>

</body>
</html>