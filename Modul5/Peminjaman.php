<?php
// Memanggil file Model
require_once 'Model.php';

// Logika untuk menangani penghapusan data Peminjaman (Delete)
if (isset($_GET['hapus'])) {
    $id_peminjaman = $_GET['hapus'];
    deleteBorrowing($id_peminjaman);
    
    // Refresh halaman setelah menghapus
    header("Location: Peminjaman.php");
    exit;
}

// Mengambil seluruh data peminjaman dari database (Read)
$borrowings = getBorrowings();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Perpustakaan Hamka</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }
        .btn-tambah {
            background-color: #4CAF50;
        }
        .btn-kembali {
            background-color: #555;
        }
        .btn-ubah {
            background-color: #2196F3;
            padding: 5px 10px;
        }
        .btn-hapus {
            background-color: #f44336;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

    <h2>Data Peminjaman</h2>
    <p>Daftar Peminjaman Perpustakaan Hamka</p>

    <a href="Index.php" class="btn btn-kembali">Kembali</a>

    <table>
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Member</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($borrowings) > 0): ?>
                <?php foreach ($borrowings as $borrowing): ?>
                <tr>
                    <td><?= $borrowing['id_peminjaman'] ?></td>
                    <td><?= $borrowing['nama_member'] ?></td>
                    <td><?= $borrowing['judul_buku'] ?></td>
                    <td><?= $borrowing['tgl_pinjam'] ?></td>
                    <td><?= $borrowing['tgl_kembali'] ?></td>
                    <td>
                        <a href="FormPeminjaman.php?id=<?= $borrowing['id_peminjaman'] ?>" class="btn btn-ubah">Ubah</a>
                        
                        <a href="Peminjaman.php?hapus=<?= $borrowing['id_peminjaman'] ?>" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data peminjaman ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data peminjaman.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="FormPeminjaman.php" class="btn btn-tambah">Tambah Data Peminjaman</a>

</body>
</html>