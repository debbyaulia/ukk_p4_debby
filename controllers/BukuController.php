<?php
session_start();

require_once __DIR__ . '/../models/koneksi.php';
require_once __DIR__ . '/../models/m_buku.php';
require_once __DIR__ . '/../models/m_peminjaman.php';

$database = new Koneksi();
$db = $database->koneksi;

$buku = new Buku($db);
$peminjaman = new Peminjaman($db);

$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'pinjam') {

    $id_buku = $_GET['id'];
    $id_user = $_SESSION['id_user'];

    if ($buku->kurangiStok($id_buku)) {
        $peminjaman->pinjam($id_user, $id_buku);
    }

    header("Location: ../views/siswa/data_buku.php");
    exit;
}

if ($aksi == 'kembali') {

    $id_peminjaman = $_GET['id'];

    // Ambil id_buku dulu
    $query = "SELECT id_buku FROM peminjaman WHERE id_peminjaman = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id_peminjaman);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $id_buku = $result['id_buku'];

    if ($peminjaman->kembalikan($id_peminjaman)) {
        $buku->tambahStok($id_buku);
    }

    header("Location: ../views/siswa/data_buku.php");
    exit;
}
?>
