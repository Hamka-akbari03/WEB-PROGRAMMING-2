<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK203 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        Nilai: <input type="number" step="any" name="value" required><br><br>
        
        Dari:<br>
        <input type="radio" name="from" value="C" checked> Celcius<br>
        <input type="radio" name="from" value="F"> Fahrenheit<br>
        <input type="radio" name="from" value="R"> Rheamur<br>
        <input type="radio" name="from" value="K"> Kelvin<br><br>

        Ke:<br>
        <input type="radio" name="to" value="C"> Celcius<br>
        <input type="radio" name="to" value="F" checked> Fahrenheit<br>
        <input type="radio" name="to" value="R"> Rheamur<br>
        <input type="radio" name="to" value="K"> Kelvin<br><br>

        <button type="submit" name="convert">Konversi</button>
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $value = $_POST['value'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        
        $celcius = 0;
        $result = 0;
        $unit = "";

        // 1. Convert source temperature to Celcius as the base
        switch ($from) {
            case 'C': $celcius = $value; break;
            case 'F': $celcius = ($value - 32) * 5/9; break;
            case 'R': $celcius = $value * 5/4; break;
            case 'K': $celcius = $value - 273.15; break;
        }

        // 2. Convert from Celcius to target temperature
        switch ($to) {
            case 'C': $result = $celcius; $unit = "°C"; break;
            case 'F': $result = ($celcius * 9/5) + 32; $unit = "°F"; break;
            case 'R': $result = $celcius * 4/5; $unit = "°R"; break;
            case 'K': $result = $celcius + 273.15; $unit = "°K"; break;
        }

        // Format and print the result with 1 decimal place
        echo "<h2>Hasil Konversi: " . number_format($result, 1, '.', '') . " $unit</h2>";
    }
    ?>
</body>
</html>