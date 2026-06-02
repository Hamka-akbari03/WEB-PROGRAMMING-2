<?php
// Require the database connection file
require_once 'Koneksi.php';

// ====================================================
// 1. BOOK (BUKU) FUNCTIONS
// ====================================================
function getBooks() {
    $conn = getConnection();
    $stmt = $conn->query("SELECT * FROM buku");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBookById($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addBook($title, $author, $publisher, $year) {
    $conn = getConnection();
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (:title, :author, :publisher, :year)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['title' => $title, 'author' => $author, 'publisher' => $publisher, 'year' => $year]);
}

function updateBook($id, $title, $author, $publisher, $year) {
    $conn = getConnection();
    $sql = "UPDATE buku SET judul_buku = :title, penulis = :author, penerbit = :publisher, tahun_terbit = :year WHERE id_buku = :id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['id' => $id, 'title' => $title, 'author' => $author, 'publisher' => $publisher, 'year' => $year]);
}

function deleteBook($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = :id");
    return $stmt->execute(['id' => $id]);
}

// ====================================================
// 2. MEMBER FUNCTIONS
// ====================================================
function getMembers() {
    $conn = getConnection();
    $stmt = $conn->query("SELECT * FROM member");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMemberById($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addMember($name, $number, $address, $registerDate, $lastPayDate) {
    $conn = getConnection();
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (:name, :number, :address, :registerDate, :lastPayDate)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['name' => $name, 'number' => $number, 'address' => $address, 'registerDate' => $registerDate, 'lastPayDate' => $lastPayDate]);
}

function updateMember($id, $name, $number, $address, $registerDate, $lastPayDate) {
    $conn = getConnection();
    $sql = "UPDATE member SET nama_member = :name, nomor_member = :number, alamat = :address, tgl_mendaftar = :registerDate, tgl_terakhir_bayar = :lastPayDate WHERE id_member = :id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['id' => $id, 'name' => $name, 'number' => $number, 'address' => $address, 'registerDate' => $registerDate, 'lastPayDate' => $lastPayDate]);
}

function deleteMember($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM member WHERE id_member = :id");
    return $stmt->execute(['id' => $id]);
}

// ====================================================
// 3. BORROWING (PEMINJAMAN) FUNCTIONS
// ====================================================
function getBorrowings() {
    $conn = getConnection();
    // Menggunakan JOIN agar tabel peminjaman langsung menampilkan 
    // Nama Member dan Judul Buku, bukan sekadar angka ID-nya saja.
    $sql = "SELECT p.*, m.nama_member, b.judul_buku 
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku
            ORDER BY p.id_peminjaman DESC";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBorrowingById($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addBorrowing($borrowDate, $returnDate, $memberId, $bookId) {
    $conn = getConnection();
    $sql = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES (:borrowDate, :returnDate, :memberId, :bookId)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['borrowDate' => $borrowDate, 'returnDate' => $returnDate, 'memberId' => $memberId, 'bookId' => $bookId]);
}

function updateBorrowing($id, $borrowDate, $returnDate, $memberId, $bookId) {
    $conn = getConnection();
    $sql = "UPDATE peminjaman SET tgl_pinjam = :borrowDate, tgl_kembali = :returnDate, id_member = :memberId, id_buku = :bookId WHERE id_peminjaman = :id";
    $stmt = $conn->prepare($sql);
    return $stmt->execute(['id' => $id, 'borrowDate' => $borrowDate, 'returnDate' => $returnDate, 'memberId' => $memberId, 'bookId' => $bookId]);
}

function deleteBorrowing($id) {
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = :id");
    return $stmt->execute(['id' => $id]);
}
?>