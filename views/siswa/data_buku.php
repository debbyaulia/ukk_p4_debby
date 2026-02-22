<?php
session_start();

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'siswa') {
    header("Location: ../auth/login.php");
    exit;
}

require_once __DIR__ . '/../../models/koneksi.php';
require_once __DIR__ . '/../../models/m_buku.php';
require_once __DIR__ . '/../../models/m_peminjaman.php';

$database = new Koneksi();
$koneksi = $database->koneksi;

$buku = new Buku($koneksi);
$peminjaman = new Peminjaman($koneksi);

$dataBuku = $buku->semuaBuku();
$dataPinjam = $peminjaman->bukuDipinjamByUser($_SESSION['id_user']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Buku</title>
<style>
body { font-family: "Segoe UI", sans-serif; background: #eef5ff; margin: 0; padding: 30px; color: #2c3e50; }
h2 { color: #2f5fb3; }
.container { max-width: 900px; margin: auto; background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
.top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
a.logout { background: #e74c3c; color: #fff; padding: 8px 14px; border-radius: 6px; text-decoration: none; }
table { width: 100%; border-collapse: collapse; margin-top: 15px; }
th { background: #4f7dd9; color: white; padding: 10px; }
td { padding: 10px; border-bottom: 1px solid #e0e6f0; text-align: center; }
.btn { padding: 6px 12px; border-radius: 6px; font-size: 14px; text-decoration: none; color: #fff; }
.btn-pinjam { background: #4f7dd9; }
.btn-kembali { background: #27ae60; }
.habis { color: #999; font-style: italic; }
.section { margin-top:40px; }
</style>
</head>
<body>

<div class="container">

<div class="top-bar">
    <h2>📚 Data Buku Perpustakaan</h2>
    <a href="../auth/logout.php" class="logout">Logout</a>
</div>

<!-- TABEL SEMUA BUKU -->
<table>
<tr>
<th>No</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Stok</th>
<th>Aksi</th>
</tr>

<?php $no=1; foreach($dataBuku as $row): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['judul'] ?></td>
<td><?= $row['pengarang'] ?></td>
<td><?= $row['stok'] ?></td>
<td>
<?php if($row['stok'] > 0): ?>
<a class="btn btn-pinjam" href="../../controllers/BukuController.php?aksi=pinjam&id=<?= $row['id_buku'] ?>">Pinjam</a>
<?php else: ?>
<span class="habis">Habis</span>
<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>
</table>

<!-- TABEL BUKU DIPINJAM -->
<div class="section">
<h2>📖 Buku Yang Sedang Dipinjam</h2>

<table>
<tr>
<th>No</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Tanggal Pinjam</th>
<th>Aksi</th>
</tr>

<?php if(count($dataPinjam) > 0): ?>
<?php $no=1; foreach($dataPinjam as $row): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['judul'] ?></td>
<td><?= $row['pengarang'] ?></td>
<td><?= $row['tanggal_pinjam'] ?></td>
<td>
<a class="btn btn-kembali" href="../../controllers/BukuController.php?aksi=kembali&id=<?= $row['id_peminjaman'] ?>">Kembalikan</a>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="5">Belum ada buku dipinjam</td>
</tr>
<?php endif; ?>

</table>
</div>

</div>
</body>
</html>
