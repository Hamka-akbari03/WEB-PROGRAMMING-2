<?php
require_once 'Model.php';

$id_peminjaman = '';
$tgl_pinjam = '';
$tgl_kembali = '';
$id_member_selected = '';
$id_buku_selected = '';
$is_edit = false;

$members = getMembers();
$books = getBooks();

if (isset($_GET['id'])) {
    $is_edit = true;
    $id_peminjaman = $_GET['id'];
    $borrowing = getBorrowingById($id_peminjaman);
    if ($borrowing) {
        $tgl_pinjam = $borrowing['tgl_pinjam'];
        $tgl_kembali = $borrowing['tgl_kembali'];
        $id_member_selected = $borrowing['id_member'];
        $id_buku_selected = $borrowing['id_buku'];
    }
}

if (isset($_POST['submit'])) {
    $tgl_pinjam_input = $_POST['tgl_pinjam'];
    $tgl_kembali_input = $_POST['tgl_kembali'];
    $member_input = $_POST['id_member'];
    $buku_input = $_POST['id_buku'];

    // ============================================================
    // LOGIKA TAMBAHAN: Validasi Tanggal Kembali harus >= Tanggal Pinjam
    // ============================================================
    if (strtotime($tgl_kembali_input) < strtotime($tgl_pinjam_input)) {
        // Jika melanggar aturan, munculkan notifikasi pop-up dan batalkan simpan
        echo "<script>
                alert('Gagal! Tanggal kembali tidak boleh kurang dari tanggal pinjam.');
                window.history.back();
              </script>";
        exit;
    }
    // ============================================================

    if ($is_edit) {
        updateBorrowing($id_peminjaman, $tgl_pinjam_input, $tgl_kembali_input, $member_input, $buku_input);
    } else {
        addBorrowing($tgl_pinjam_input, $tgl_kembali_input, $member_input, $buku_input);
    }
    header("Location: Peminjaman.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? 'Edit Peminjaman' : 'Tambah Peminjaman' ?> - Perpustakaan Hamka</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
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
        .form-group input, .form-group select {
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
    </style>
</head>
<body>

    <div class="form-card">
        <h2>Perpustakaan Hamka</h2>
        <h3><?= $is_edit ? 'Ubah Data Peminjaman' : 'Form Penambahan Peminjaman' ?></h3>

        <form method="POST">
            <div class="form-group">
                <label>Tanggal Pinjam:</label>
                <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tanggal Kembali:</label>
                <input type="date" name="tgl_kembali" value="<?= $tgl_kembali ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Member:</label>
                <select name="id_member" required>
                    <option value="" disabled <?= !$is_edit ? 'selected' : '' ?>>-- Pilih Member --</option>
                    <?php foreach ($members as $member): ?>
                        <option value="<?= $member['id_member'] ?>" <?= ($member['id_member'] == $id_member_selected) ? 'selected' : '' ?>>
                            <?= $member['nama_member'] ?> (<?= $member['nomor_member'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Judul Buku:</label>
                <select name="id_buku" required>
                    <option value="" disabled <?= !$is_edit ? 'selected' : '' ?>>-- Pilih Buku --</option>
                    <?php foreach ($books as $book): ?>
                        <option value="<?= $book['id_buku'] ?>" <?= ($book['id_buku'] == $id_buku_selected) ? 'selected' : '' ?>>
                            <?= $book['judul_buku'] ?> - <?= $book['penulis'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-submit">
                    <?= $is_edit ? 'Ubah Data' : 'Simpan Peminjaman' ?>
                </button>
                <a href="Peminjaman.php" class="btn btn-kembali">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>