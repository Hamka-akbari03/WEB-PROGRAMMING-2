<?php
require_once 'Model.php';

$id_buku = '';
$judul_buku = '';
$penulis = '';
$penerbit = '';
$tahun_terbit = '';
$is_edit = false;

if (isset($_GET['id'])) {
    $is_edit = true;
    $id_buku = $_GET['id'];
    $book = getBookById($id_buku);
    if ($book) {
        $judul_buku = $book['judul_buku'];
        $penulis = $book['penulis'];
        $penerbit = $book['penerbit'];
        $tahun_terbit = $book['tahun_terbit'];
    }
}

if (isset($_POST['submit'])) {
    $judul_input = $_POST['judul_buku'];
    $penulis_input = $_POST['penulis'];
    $penerbit_input = $_POST['penerbit'];
    $tahun_input = $_POST['tahun_terbit'];

    if ($is_edit) {
        updateBook($id_buku, $judul_input, $penulis_input, $penerbit_input, $tahun_input);
    } else {
        addBook($judul_input, $penulis_input, $penerbit_input, $tahun_input);
    }
    header("Location: Buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Buku' : 'Tambah Buku' ?> - Perpustakaan Hamka</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            /* Flexbox agar seluruh konten berada di tengah (middle) layar */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        /* Kotak pembungkus form agar berada di tengah */
        .form-card {
            background-color: white;
            padding: 35px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            box-sizing: border-box;
        }
        h2 {
            color: #2b3a4a;
            margin-top: 0;
            margin-bottom: 5px;
            font-size: 24px;
        }
        h3 {
            color: #666;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: normal;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .button-group {
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-submit {
            background-color: #2b3a4a;
        }
        .btn-submit:hover {
            background-color: #1a252f;
        }
        .btn-kembali {
            background-color: #555;
            margin-left: 8px;
        }
        .btn-kembali:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

    <div class="form-card">
        <h2>Perpustakaan Hamka</h2>
        <h3><?= $is_edit ? 'Ada yang perlu diganti di Perpustakaan Hamka?' : 'Form Penambahan Buku Perpustakaan Hamka' ?></h3>

        <form method="POST">
            <div class="form-group">
                <label>Judul Buku:</label>
                <input type="text" name="judul_buku" value="<?= $judul_buku ?>" required>
            </div>
            
            <div class="form-group">
                <label>Penulis:</label>
                <input type="text" name="penulis" value="<?= $penulis ?>" required>
            </div>
            
            <div class="form-group">
                <label>Penerbit:</label>
                <input type="text" name="penerbit" value="<?= $penerbit ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" value="<?= $tahun_terbit ?>" required>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-submit">
                    <?= $is_edit ? 'Ubah Data' : 'Daftar' ?>
                </button>
                <a href="Buku.php" class="btn btn-kembali">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>