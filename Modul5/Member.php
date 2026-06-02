<?php
// Memanggil file Model
require_once 'Model.php';

// Logika untuk menangani penghapusan data Member (Delete)
if (isset($_GET['hapus'])) {
    $id_member = $_GET['hapus'];
    deleteMember($id_member);
    
    // Refresh halaman agar data yang dihapus langsung hilang dari tabel
    header("Location: Member.php");
    exit;
}

// Mengambil seluruh data member dari database (Read)
$members = getMembers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member - Perpustakaan Hamka</title>
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

    <h2>Data Member</h2>
    <p>Daftar Member Perpustakaan Hamka</p>

    <a href="Index.php" class="btn btn-kembali">Kembali</a>

    <table>
        <thead>
            <tr>
                <th>ID Member</th>
                <th>Nama Member</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tgl Mendaftar</th>
                <th>Tgl Terakhir Bayar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($members) > 0): ?>
                <?php foreach ($members as $member): ?>
                <tr>
                    <td><?= $member['id_member'] ?></td>
                    <td><?= $member['nama_member'] ?></td>
                    <td><?= $member['nomor_member'] ?></td>
                    <td><?= $member['alamat'] ?></td>
                    <td><?= $member['tgl_mendaftar'] ?></td>
                    <td><?= $member['tgl_terakhir_bayar'] ?></td>
                    <td>
                        <a href="FormMember.php?id=<?= $member['id_member'] ?>" class="btn btn-ubah">Ubah</a>
                        
                        <a href="Member.php?hapus=<?= $member['id_member'] ?>" class="btn btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data member.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="FormMember.php" class="btn btn-tambah">Tambah Data Member</a>

</body>
</html>