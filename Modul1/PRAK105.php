<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container{
            display: vertical;
            justify-content: center;
            align-items: center;
            border: 10px black solid;
            margin: 5px;
            max-width: 500px;
            max-height: 500px;
        }
        .title{
            background-color: red;
            height: auto;
            width: auto;
            border: 3px black solid;
            margin: 5px;
        }
        .list{
            border: 3px black solid;
            margin: 5px;
            height: auto;
            width: auto;
        }
    </style>
    <title>PRAK104-MUHAMMAD RYAN RIZKY RAHMADI</title>
</head>
<body>
<?php
$title=[
    ["title"=> "<b>Daftar Smarthphone Samsung</b>"]
]
?>
<?php
$samsung = [
    ["nama" => "Samsung Galaxy 22"],
    ["nama" => "Samsung Galaxy 22+"],
    ["nama" => "Samsung Galaxy A03"],
    ["nama" => "Samsung Galaxy Xcover5"]
];
?>
<div class="container">
    <?php foreach($title as $titles): ?>
        <div class="title">
            <p><?= $titles["title"]; ?></p>
        </div>
    <?php endforeach; ?>
    <?php foreach($samsung as $samsung2): ?>
        <div class="list">
            <p><?= $samsung2["nama"]; ?></p>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>