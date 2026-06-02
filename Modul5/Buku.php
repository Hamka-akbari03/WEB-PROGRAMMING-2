<?php
// Memanggil file Model yang berisi fungsi-fungsi CRUD
require_once 'Model.php';

// Logika untuk menangani penghapusan data (Delete)
// Jika ada parameter 'hapus' di URL, jalankan fungsi deleteBook
if (isset($_GET['hapus'])) {
    $id_buku = $_GET['hapus'];
    deleteBook($id_buku);
    
    // Refresh halaman agar data yang dihapus hilang dari tabel
    header("Location: Buku.php");
    exit;
}

// Mengambil seluruh data buku dari database (Read)
$books = getBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan Hamka</title>
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

    <h2>Data Buku</h2>
    <p>Daftar Buku Perpustakaan Hamka</p>

    <a href="Index.php" class="btn btn-kembali">Kembali</a>

    <table>
        <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($books) > 0): ?>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book['id_buku'] ?></td>
                    <td><?= $book['judul_buku'] ?></td>
                    <td><?= $book['penulis'] ?></td>
                    <td><?= $book['penerbit'] ?></td>
                    <td><?= $book['tahun_terbit'] ?></td>
                    <td>
                        <a href="FormBuku.php?id=<?= $book['id_buku'] ?>" class="btn btn-ubah">Ubah</a>
                        
                        <a href="Buku.php?hapus=<?= $book['id_buku'] ?>" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data buku.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="FormBuku.php" class="btn btn-tambah">Tambah Data Buku</a>

</body>
</html>