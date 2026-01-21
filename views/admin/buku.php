<?php
// Data buku
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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #666;
            padding: 10px 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even){
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0f7fa;
        }
    </style>
</head>
<body>

<h2>Data Buku</h2>

<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($buku as $b): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $b['judul'] ?></td>
        <td><?= $b['penulis'] ?></td>
        <td><?= $b['stok'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
