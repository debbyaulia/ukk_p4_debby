<!-- <?php

require_once 'model.php';

class Buku extends Model {
    public function all() {
        return $this->db->query("SELECT * FROM buku")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambah($judul, $penulis) {
        $stmt = $this->db->prepare("INSERT INTO buku VALUES (NULL, ?, ?)");
        return $stmt->execute([$judul, $penulis]);
    }
} -->

<?php
include 'koneksi.php';
$query = mysqli_query($database, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>

<h2>Data Buku</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID Buku</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Stok</th>
    </tr>

    <?php while ($data = mysqli_fetch_array($query)) { ?>
    <tr>
        <td><?= $data['id_buku']; ?></td>
        <td><?= $data['judul']; ?></td>
        <td><?= $data['pengarang']; ?></td>
        <td><?= $data['stok']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
