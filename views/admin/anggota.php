<?php
// Data anggota
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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
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
            width: 80%;
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

<h2>Data Anggota</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kelas</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($anggota as $a): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['alamat'] ?></td>
        <td><?= $a['kelas'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
