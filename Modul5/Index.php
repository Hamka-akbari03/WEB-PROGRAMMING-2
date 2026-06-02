<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Hamka</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            /* Memberikan warna latar belakang kebiruan sebagai pengganti gambar rak buku */
            background-color: #78a2b8; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 40px 60px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 40px;
        }
        .title-section {
            text-align: left;
        }
        .title-section h1 {
            margin: 5px 0;
            font-size: 36px;
            color: #000;
        }
        .menu-section {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .menu-section a {
            text-decoration: none;
            color: white;
            background-color: black;
            padding: 12px 40px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
        }
        .menu-section a:hover {
            background-color: #333;
        }
        .book-icon {
            font-size: 90px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="book-icon">📚</div>
        
        <div class="title-section">
            <h1>Perpustakaan</h1>
            <h1>Hamka</h1>
        </div>

        <div class="menu-section">
            <a href="Member.php">Member</a>
            <a href="Buku.php">Buku</a>
            <a href="Peminjaman.php">Peminjaman</a>
        </div>
    </div>

</body>
</html>
