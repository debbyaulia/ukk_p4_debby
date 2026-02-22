<?php
session_start();
// Pastikan controller di-include setelah session dimulai
include_once __DIR__ . '/../../controllers/c_peminjaman_adm.php';


?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Perpustakaan Digital</title>

<style>

{
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(120deg, #f4f8fc, #e3eefb);
    padding: 30px;
    color: #1e3a5f;
}

h2 {
    color: #1f4e79;
    margin-bottom: 15px;
}

.container {
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

/* ===== FORM ===== */
.form-box {
    width: 420px;
    background: #ffffff;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(31, 78, 121, 0.15);
    border-top: 6px solid #6aa9e9;
}

.form-box label {
    font-weight: 600;
    color: #1f4e79;
    margin-top: 12px;
    display: block;
}

.form-box input,
.form-box select {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    margin-bottom: 14px;
    border: 1px solid #c7dcf4;
    border-radius: 8px;
    background: #f9fbfe;
}

.form-box input:focus,
.form-box select:focus {
    outline: none;
    border-color: #6aa9e9;
}

.form-box button {
    width: 100%;
    background: #6aa9e9;
    color: white;
    border: none;
    padding: 12px;
    font-size: 15px;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
}

.form-box button:hover {
    background: #4d8fd6;
}

/* ===== TABLE ===== */
.table-box {
    flex: 1;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(31, 78, 121, 0.15);
}

th {
    background: #6aa9e9;
    color: white;
    padding: 14px;
    font-size: 14px;
}

td {
    padding: 12px;
    border-bottom: 1px solid #e3eefb;
    text-align: center;
}

tr:hover {
    background: #f2f7fd;
}

/* ===== STATUS ===== */
.badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0.5px;
}

.badge.dipinjam {
    background: #f0ad4e;
    color: #fff;
}

.badge.dikembalikan {
    background: #5cb85c;
    color: #fff;
}

/* ===== AKSI ===== */
.aksi a {
    text-decoration: none;
    font-weight: 600;
    margin: 0 6px;
}

.edit {
    color: #3178c6;
}

.hapus {
    color: #c94b4b;
}

/* ===== ICON TITLE ===== */
.title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.title span {
    font-size: 26px;
}
</style>
</head>

<body>

<div class="title">
    <span>📚</span>
    <h2>Perpustakaan Digital – Peminjaman Buku</h2>
</div>

<div class="container">

<div class="form-box">
<form method="post" action="../../controllers/c_peminjaman_adm.php">
    <input type="hidden" name="id_pinjam" value="<?= $edit['id_pinjam']; ?>">

    <label>📘 Nama Buku</label>
    <input type="text" name="nama_buku" required value="<?= $edit['nama_buku']; ?>">

    <label>👤 Nama Anggota</label>
    <input type="text" name="nama" required value="<?= $edit['nama']; ?>">

    <label>📅 Tanggal Pinjam</label>
    <input type="date" name="tgl_pinjam" required value="<?= $edit['tgl_pinjam']; ?>">

    <label>📆 Tanggal Kembali</label>
    <input type="date" name="tgl_kembali" value="<?= $edit['tgl_kembali']; ?>">

    <label>📌 Status</label>
    <select name="status">
        <option value="dipinjam" <?= $edit['status']=='dipinjam'?'selected':''; ?>>
            Dipinjam
        </option>
        <option value="dikembalikan" <?= $edit['status']=='dikembalikan'?'selected':''; ?>>
            Dikembalikan
        </option>
    </select>

    <button type="submit" name="simpan">
        <?= empty($edit['id_pinjam']) ? '💾 Simpan Peminjaman' : '🔄 Update Peminjaman'; ?>
    </button>
    
    <?php if(!empty($edit['id_pinjam'])): ?>
        <a href="peminjaman.php" style="display: block; text-align: center; margin-top: 10px; color: #777; text-decoration: none; font-size: 13px;">✖ Batal Edit</a>
    <?php endif; ?>
</form>
</div>

<div class="table-box">
<table>
<tr>
    <th>No</th>
    <th>Nama Buku</th>
    <th>Nama</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php if(empty($data_peminjaman)): ?>
<tr>
    <td colspan="7">Belum ada data peminjaman.</td>
</tr>
<?php else: ?>
    <?php $no=1; foreach ($data_peminjaman as $p): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($p['nama_buku']); ?></td>
        <td><?= htmlspecialchars($p['nama']); ?></td>
        <td><?= $p['tgl_pinjam']; ?></td>
        <td><?= $p['tgl_kembali'] ?: '-'; ?></td>
        <td>
            <span class="badge <?= $p['status']; ?>">
                <?= ucfirst($p['status']); ?>
            </span>
        </td>
        <td class="aksi">
            <a class="edit" href="?edit=<?= $p['id_pinjam']; ?>">✏ Edit</a>
            <a class="hapus" href="../../controllers/c_peminjaman_adm.php?hapus=<?= $p['id_pinjam']; ?>"
               onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">🗑 Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php endif; ?>
</table>
</div>

</div>

</body>
</html>