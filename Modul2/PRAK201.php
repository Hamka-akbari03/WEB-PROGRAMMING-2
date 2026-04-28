<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK201 - MUHAMMAD HAMKA AKBARI</title>
</head>
<body>
    <form method="POST">
        Nama: 1 <input type="text" name="name1" required><br>
        Nama: 2 <input type="text" name="name2" required><br>
        Nama: 3 <input type="text" name="name3" required><br>
        <button type="submit" name="submit">Urutkan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Fetch values from the form
        $name1 = $_POST['name1'];
        $name2 = $_POST['name2'];
        $name3 = $_POST['name3'];

        echo "<br>";

        // Conditional logic to sort strings alphabetically
        if ($name1 < $name2 && $name1 < $name3) {
            if ($name2 < $name3) {
                echo "$name1 <br> $name2 <br> $name3";
            } else {
                echo "$name1 <br> $name3 <br> $name2";
            }
        } elseif ($name2 < $name1 && $name2 < $name3) {
            if ($name1 < $name3) {
                echo "$name2 <br> $name1 <br> $name3";
            } else {
                echo "$name2 <br> $name3 <br> $name1";
            }
        } else {
            if ($name1 < $name2) {
                echo "$name3 <br> $name1 <br> $name2";
            } else {
                echo "$name3 <br> $name2 <br> $name1";
            }
        }
    }
    ?>
</body>
</html>