<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 1 - Soal 5</title>
    <style>
        table {
            font-family: "Times New Roman", Times, serif;
            margin: 50px auto;
            width: 450px;      
            font-size: 18px;   
        }
        td {
            padding: 5px 10px; 
        }
        th.red-header {
            background-color: red;
            font-size: 32px;       
            font-weight: bold;
            padding: 30px 10px 
            text-align: left;
        }
    </style>
</head>
<body>

    <?php
    $smartphones = [
        "phone1" => "Samsung Galaxy S22",
        "phone2" => "Samsung Galaxy S22+",
        "phone3" => "Samsung Galaxy A03",
        "phone4" => "Samsung Galaxy Xcover 5"
    ];
    ?>

    <table border="1" cellspacing="2">
        <tr>
            <th class="red-header">Daftar Smartphone Samsung</th>
        </tr>
        <?php
        foreach ($smartphones as $key => $value) {
            echo "<tr><td>" . $value . "</td></tr>";
        }
        ?>
    </table>

</body>
</html>
