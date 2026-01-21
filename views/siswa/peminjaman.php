<?php
// Data buku (10 buku)
$buku = [
    ['judul' => 'Pemrograman', 'penulis' => 'Susanto', 'stok' => 12],
    ['judul' => 'Belajar PHP', 'penulis' => 'Andi', 'stok' => 8],
    ['judul' => 'Dasar MySQL', 'penulis' => 'Budi', 'stok' => 5],
    ['judul' => 'Java untuk Pemula', 'penulis' => 'Rina', 'stok' => 10],
    ['judul' => 'Python Lanjutan', 'penulis' => 'Fajar', 'stok' => 7],
    ['judul' => 'Web Development', 'penulis' => 'Lina', 'stok' => 15],
    ['judul' => 'Algoritma & Struktur Data', 'penulis' => 'Ahmad', 'stok' => 9],
    ['judul' => 'Framework Laravel', 'penulis' => 'Nina', 'stok' => 6],
    ['judul' => 'JavaScript Modern', 'penulis' => 'Andi', 'stok' => 11],
    ['judul' => 'Dasar HTML & CSS', 'penulis' => 'Budi', 'stok' => 14]
];

// Data anggota (10 anggota)
$anggota = [
    ['nama' => 'Debby', 'alamat' => 'Padalarang', 'kelas' => 'XII RPL 2'],
    ['nama' => 'Rizki', 'alamat' => 'Cimareme', 'kelas' => 'XII IPS 2'],
    ['nama' => 'Siti', 'alamat' => 'Cimahi', 'kelas' => 'XI IPA 2'],
    ['nama' => 'Ahmad', 'alamat' => 'Bandung', 'kelas' => 'X RPL 1'],
    ['nama' => 'Lina', 'alamat' => 'Garut', 'kelas' => 'XI IPS 1'],
    ['nama' => 'Budi', 'alamat' => 'Bekasi', 'kelas' => 'XII IPA 1'],
    ['nama' => 'Rina', 'alamat' => 'Depok', 'kelas' => 'X RPL 2'],
    ['nama' => 'Fajar', 'alamat' => 'Bogor', 'kelas' => 'XI IPS 2'],
    ['nama' => 'Nina', 'alamat' => 'Bandung', 'kelas' => 'XII RPL 1'],
    ['nama' => 'Andi', 'alamat' => 'Cimahi', 'kelas' => 'XI IPA 1']
];

// Data peminjaman (minimal 5)
$data = [
    ['user_id' => $anggota[0]['nama'], 'buku_id' => $buku[0]['judul']], // Debby meminjam Pemrograman
    ['user_id' => $anggota[1]['nama'], 'buku_id' => $buku[1]['judul']], // Rizki meminjam Belajar PHP
    ['user_id' => $anggota[2]['nama'], 'buku_id' => $buku[2]['judul']], // Siti meminjam Dasar MySQL
    ['user_id' => $anggota[3]['nama'], 'buku_id' => $buku[3]['judul']], // Ahmad meminjam Java untuk Pemula
    ['user_id' => $anggota[4]['nama'], 'buku_id' => $buku[4]['judul']], // Lina meminjam Python Lanjutan
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e0f2f1; /* biru telur asin */
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        h2 {
            color: #00796b;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            background: #b2dfdb;
            margin-bottom: 12px;
            padding: 15px 20px;
            border-radius: 12px;
            color: #004d40;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        li:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .badge {
            background: #00796b;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📘 Data Peminjaman</h2>

    <ul>
        <?php foreach ($data as $p): ?>
            <li>
                <span>
                    👤 <b><?= $p['user_id'] ?></b> meminjam  
                    📚 <b><?= $p['buku_id'] ?></b>
                </span>
                <span class="badge">Aktif</span>
            </li>
        <?php endforeach ?>
    </ul>
</div>

</body>
</html>
