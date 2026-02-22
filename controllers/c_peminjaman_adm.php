<?php
include_once __DIR__ . '/../models/m_peminjaman_adm.php';

$peminjaman = new peminjaman();

// Inisialisasi variabel edit agar form tidak kosong saat pertama load
$edit = [
    'id_pinjam'   => '',
    'nama_buku'   => '',
    'nama'        => '',
    'tgl_pinjam'  => '',
    'tgl_kembali' => '',
    'status'      => ''
];

// PROSES SIMPAN ATAU UPDATE
if (isset($_POST['simpan'])) {

//MENANGKAP ISI INPUTAN 
    $data = [
        'nama_buku'   => $_POST['nama_buku'],
        'nama'        => $_POST['nama'],
        'tgl_pinjam'  => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali'],
        'status'      => $_POST['status']
    ];

    if (empty($_POST['id_pinjam'])) {
        $peminjaman->simpan($data);
    } else {
        $peminjaman->update($_POST['id_pinjam'], $data);
    }

    header("Location: ../views/admin/peminjaman_adm.php");
    exit;
}

// PROSES HAPUS
if (isset($_GET['hapus'])) {
    $peminjaman->hapus($_GET['hapus']);
    header("Location: ../views/admin/peminjaman_adm.php");
    exit;
}

// PROSES AMBIL DATA UNTUK EDIT
if (isset($_GET['edit'])) {
    $result = $peminjaman->getById($_GET['edit']);
    if ($result) {
        $edit = $result;
    }
}

// AMBIL SEMUA DATA UNTUK TABEL
$data_peminjaman = $peminjaman->tampil_data();