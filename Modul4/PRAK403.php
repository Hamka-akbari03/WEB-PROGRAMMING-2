<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK403</title>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
            font-family: sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #cccccc;
            font-weight: bold;
        }
        /* Styling explicitly for the status */
        .revisi {
            background-color: red;
            color: white;
            font-weight: bold;
        }
        .tidak-revisi {
            background-color: green;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php
    // 1. Initializing the multi-dimensional array
    $students = [
        [
            "no" => 1,
            "name" => "Ridho",
            "courses" => [
                ["name" => "Pemrograman I", "credit" => 2],
                ["name" => "Praktikum Pemrograman I", "credit" => 1],
                ["name" => "Pengantar Lingkungan Lahan Basah", "credit" => 2],
                ["name" => "Arsitektur Komputer", "credit" => 3]
            ]
        ],
        [
            "no" => 2,
            "name" => "Ratna",
            "courses" => [
                ["name" => "Basis Data I", "credit" => 2],
                ["name" => "Praktikum Basis Data I", "credit" => 1],
                ["name" => "Kalkulus", "credit" => 3]
            ]
        ],
        [
            "no" => 3,
            "name" => "Tono",
            "courses" => [
                ["name" => "Rekayasa Perangkat Lunak", "credit" => 3],
                ["name" => "Analisis dan Perancangan Sistem", "credit" => 3],
                ["name" => "Komputasi Awan", "credit" => 3],
                ["name" => "Kecerdasan Bisnis", "credit" => 3]
            ]
        ]
    ];

    // 2. Loop through the array by reference to calculate total credits and determine status
    foreach ($students as &$student) {
        $totalCredit = 0;
        
        // Accumulate the credits from each course
        foreach ($student["courses"] as $course) {
            $totalCredit += $course["credit"];
        }
        
        // Add new keys dynamically to the student array
        $student["totalCredit"] = $totalCredit;

        // Logic condition: If total credits < 7, status is "Revisi KRS"
        if ($student["totalCredit"] < 7) {
            $student["status"] = "Revisi KRS";
        } else {
            $student["status"] = "Tidak Revisi";
        }
    }
    unset($student); // Best practice: break the reference link after modifying
    ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <?php 
            // Iterate through the courses for the current student
            for ($i = 0; $i < count($student["courses"]); $i++) {
                echo "<tr>";
                
                // If it's the very first course in the student's list, print all columns
                if ($i == 0) {
                    echo "<td>" . $student["no"] . "</td>";
                    echo "<td>" . $student["name"] . "</td>";
                    echo "<td>" . $student["courses"][$i]["name"] . "</td>";
                    echo "<td>" . $student["courses"][$i]["credit"] . "</td>";
                    echo "<td>" . $student["totalCredit"] . "</td>";
                    
                    // Conditionally set the CSS class for the status column
                    if ($student["status"] == "Revisi KRS") {
                        echo "<td class='revisi'>" . $student["status"] . "</td>";
                    } else {
                        echo "<td class='tidak-revisi'>" . $student["status"] . "</td>";
                    }
                } 
                // For subsequent courses, print empty cells <td></td> for student details
                else {
                    echo "<td></td>"; // Empty 'No'
                    echo "<td></td>"; // Empty 'Nama'
                    echo "<td>" . $student["courses"][$i]["name"] . "</td>";
                    echo "<td>" . $student["courses"][$i]["credit"] . "</td>";
                    echo "<td></td>"; // Empty 'Total SKS'
                    echo "<td></td>"; // Empty 'Keterangan'
                }
                echo "</tr>";
            }
            ?>
        <?php endforeach; ?>
    </table>

</body>
</html>