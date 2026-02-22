<?php
session_start();

// Data awal
if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [
        ['nama' => 'Debby', 'alamat' => 'Padalarang', 'kelas' => 'XII RPL 2'],
        ['nama' => 'Rizki', 'alamat' => 'Cimareme', 'kelas' => 'XII IPS 2'],
        ['nama' => 'Siti', 'alamat' => 'Cimahi', 'kelas' => 'XI IPA 2'],
    ];
}

$anggota = $_SESSION['anggota'];

// CREATE & UPDATE
if (isset($_POST['simpan'])) {
    $data = [
        'nama'   => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        'kelas'  => $_POST['kelas']
    ];

    if ($_POST['id'] === '') {
        $_SESSION['anggota'][] = $data;
    } else {
        $_SESSION['anggota'][$_POST['id']] = $data;
    }

    header("Location: ?");
    exit;
}

// DELETE
if (isset($_GET['hapus'])) {
    unset($_SESSION['anggota'][$_GET['hapus']]);
    $_SESSION['anggota'] = array_values($_SESSION['anggota']);
    header("Location: ?");
    exit;
}

// EDIT
$edit = ['nama'=>'', 'alamat'=>'', 'kelas'=>'', 'id'=>''];
if (isset($_GET['edit'])) {
    $edit = $_SESSION['anggota'][$_GET['edit']];
    $edit['id'] = $_GET['edit'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data Anggota Perpustakaan</title>
    <style>
        body {
            font-family: "Georgia", serif;
            background: #eaf2fb;
            padding: 20px;
            color: #1e2a38;
        }

        h2 {
            color: #0b3c5d;
            border-bottom: 3px solid #1f6fb2;
            padding-bottom: 5px;
            width: fit-content;
        }

        table {
            border-collapse: collapse;
            width: 85%;
            margin-top: 20px;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #b6cce5;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #1f6fb2;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background: #f2f7fc;
        }

        a {
            text-decoration: none;
            color: #1f6fb2;
            font-weight: bold;
        }

        a:hover {
            color: #0b3c5d;
        }

        .form-box {
            width: 400px;
            padding: 20px;
            border: 1px solid #b6cce5;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            color: #0b3c5d;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            border: 1px solid #b6cce5;
            border-radius: 4px;
        }

        input:focus {
            outline: none;
            border-color: #1f6fb2;
            box-shadow: 0 0 5px rgba(17, 107, 182, 0.5);
        }

        button {
            padding: 10px 20px;
            background: #1f6fb2;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #0b3c5d;
        }
    </style>
</head>
<body>

<h2>📘 Form Anggota Perpustakaan</h2>

<div class="form-box">
    <form method="post">
        <input type="hidden" name="id" value="<?= $edit['id'] ?>">

        <label>Nama</label>
        <input type="text" name="nama" required value="<?= $edit['nama'] ?>">

        <label>Alamat</label>
        <input type="text" name="alamat" required value="<?= $edit['alamat'] ?>">

        <label>Kelas</label>
        <input type="text" name="kelas" required value="<?= $edit['kelas'] ?>">

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>

<h2>📚 Data Anggota</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kelas</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($anggota as $i => $a): ?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['alamat'] ?></td>
        <td><?= $a['kelas'] ?></td>
        <td>
            <a href="?edit=<?= $i ?>">✏ Edit</a>
            <a href="?hapus=<?= $i ?>" onclick="return confirm('Hapus data?')">🗑 Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>