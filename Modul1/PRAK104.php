<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 1 - Soal 4</title>
    <style>
        table {
            font-family: "Times New Roman", Times, serif;
            margin: 50px auto; /* Membuat tabel berada di tengah halaman */
            width: 400px;      /* Memperbesar lebar tabel */
            font-size: 18px;   /* Memperbesar ukuran huruf sedikit */
        }
        th, td {
            padding: 5px 10px; /* Memperbesar ruang di dalam kotak agar proporsional */
        }
    </style>
</head>
<body>

    <?php
    $smartphones = [
        "Samsung Galaxy S22",
        "Samsung Galaxy S22+",
        "Samsung Galaxy A03",
        "Samsung Galaxy Xcover 5"
    ];
    ?>

    <table border="1" cellspacing="2">
        <tr>
            <th style="text-align: left;">Daftar Smartphone Samsung</th>
        </tr>
        <?php
        foreach ($smartphones as $hp) {
            echo "<tr><td>" . $hp . "</td></tr>";
        }
        ?>
    </table>

</body>
</html>