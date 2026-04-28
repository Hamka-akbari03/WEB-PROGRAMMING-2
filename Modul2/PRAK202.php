<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK202 - MUHAMMAD HAMKA AKBARI</title>
    <style>
        /* Set red color for error messages */
        .error { color: red; }
    </style>
</head>
<body>
    <?php
    // Initialize empty variables for values and errors
    $nameError = $nimError = $genderError = "";
    $name = $nim = $gender = "";

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Name validation
        if (empty($_POST['name'])) {
            $nameError = "nama tidak boleh kosong";
        } else {
            $name = $_POST['name'];
        }

        // NIM validation
        if (empty($_POST['nim'])) {
            $nimError = "nim tidak boleh kosong";
        } else {
            $nim = $_POST['nim'];
        }

        // Gender validation
        if (empty($_POST['gender'])) {
            $genderError = "jenis kelamin tidak boleh kosong";
        } else {
            $gender = $_POST['gender'];
        }
    }
    ?>

    <form method="POST">
        Nama: <input type="text" name="name" value="<?= $name ?>">
        <span class="error">* <?= $nameError ?></span><br>

        Nim: <input type="text" name="nim" value="<?= $nim ?>">
        <span class="error">* <?= $nimError ?></span><br>

        Jenis Kelamin: <span class="error">* <?= $genderError ?></span><br>
        <input type="radio" name="gender" value="Laki-Laki" <?php if (isset($gender) && $gender == "Laki-Laki") echo "checked";?>> Laki-Laki<br>
        <input type="radio" name="gender" value="Perempuan" <?php if (isset($gender) && $gender == "Perempuan") echo "checked";?>> Perempuan<br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    // Display output if no errors exist and all fields are filled
    if (!empty($name) && !empty($nim) && !empty($gender)) {
        echo "<h2>Output:</h2>";
        echo "$name <br>";
        echo "$nim <br>";
        echo "$gender <br>";
    }
    ?>
</body>
</html>