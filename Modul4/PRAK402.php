<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK402</title>
    <style>
        table {
            border-collapse: collapse;
            font-family: sans-serif;
            width: 600px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cccccc; /* Light gray background for table headers */
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php
    // Multi-dimensional associative array containing initial student data
    $students = [
        ["name" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
        ["name" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
        ["name" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
        ["name" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
    ];

    // Loop through the array by reference to calculate and add new columns dynamically
    foreach ($students as &$student) {
        // Calculate the final score: 40% UTS + 60% UAS
        $student['finalScore'] = (0.4 * $student['uts']) + (0.6 * $student['uas']);

        // Determine the letter grade based on the final score
        if ($student['finalScore'] >= 80) {
            $student['grade'] = 'A';
        } elseif ($student['finalScore'] >= 70) {
            $student['grade'] = 'B';
        } elseif ($student['finalScore'] >= 60) {
            $student['grade'] = 'C';
        } elseif ($student['finalScore'] >= 50) {
            $student['grade'] = 'D';
        } else {
            $student['grade'] = 'E';
        }
    }
    unset($student); // Break the reference with the last element
    ?>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['name'] ?></td>
                <td><?= $student['nim'] ?></td>
                <td><?= $student['uts'] ?></td>
                <td><?= $student['uas'] ?></td>
                <td><?= $student['finalScore'] ?></td>
                <td><?= $student['grade'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>