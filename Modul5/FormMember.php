<?php
require_once 'Model.php';

$id_member = '';
$nama_member = '';
$nomor_member = '';
$alamat = '';
$tgl_mendaftar = '';
$tgl_terakhir_bayar = '';
$is_edit = false;

if (isset($_GET['id'])) {
    $is_edit = true;
    $id_member = $_GET['id'];
    $member = getMemberById($id_member);
    if ($member) {
        $nama_member = $member['nama_member'];
        $nomor_member = $member['nomor_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar']));
        $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
    }
}

// PERBAIKAN: Menggunakan sintaks $_POST yang benar dengan isset()
if (isset($_POST['submit'])) {
    $nama_input = $_POST['nama_member'];
    $nomor_input = $_POST['nomor_member'];
    $alamat_input = $_POST['alamat'];
    $mendaftar_input = $_POST['tgl_mendaftar'];
    $bayar_input = $_POST['tgl_terakhir_bayar'];

    if ($is_edit) {
        updateMember($id_member, $nama_input, $nomor_input, $alamat_input, $mendaftar_input, $bayar_input);
    } else {
        addMember($nama_input, $nomor_input, $alamat_input, $mendaftar_input, $bayar_input);
    }
    header("Location: Member.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Member' : 'Tambah Member' ?> - Perpustakaan Hamka</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px 0;
            background-color: #f4f6f8;
            /* Flexbox mendudukkan form tepat di tengah (middle) layar */
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
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            font-family: inherit;
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
        <h3><?= $is_edit ? 'Ubah Data Member' : 'Form Penambahan Member' ?></h3>

        <form method="POST">
            <div class="form-group">
                <label>Nama Member:</label>
                <input type="text" name="nama_member" value="<?= $nama_member ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nomor Member:</label>
                <input type="text" name="nomor_member" value="<?= $nomor_member ?>" required>
            </div>
            
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" rows="3" required><?= $alamat ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Tanggal Mendaftar:</label>
                <input type="datetime-local" name="tgl_mendaftar" value="<?= $tgl_mendaftar ?>" required>
            </div>

            <div class="form-group">
                <label>Tanggal Terakhir Bayar:</label>
                <input type="date" name="tgl_terakhir_bayar" value="<?= $tgl_terakhir_bayar ?>" required>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-submit">
                    <?= $is_edit ? 'Ubah Data' : 'Daftar' ?>
                </button>
                <a href="Member.php" class="btn btn-kembali">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>