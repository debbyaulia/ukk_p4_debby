<?php
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            padding: 30px;
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .welcome-box {
            background: linear-gradient(135deg, #1e88e5, #42a5f5);
            color: white;
            padding: 25px;
            border-radius: 14px;
            margin-bottom: 30px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        .welcome-box h3 {
            margin: 0;
            font-size: 24px;
        }

        .welcome-box p {
            margin-top: 8px;
            font-size: 15px;
            opacity: 0.95;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: #333;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }

        .card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-desc {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        .bg-blue { color: #1e88e5; }
        .bg-green { color: #43a047; }
        .bg-orange { color: #fb8c00; }
    </style>
</head>
<body>

<div class="container">
    <h2>📊 Dashboard Admin</h2>

    <!-- Sambutan -->
    <div class="welcome-box">
        <h3>📚 Selamat Datang di Portal Perpustakaan Digital By Debby</h3>
        <p>
            Kelola data buku, peminjaman, dan anggota perpustakaan secara mudah,
            cepat, dan terintegrasi dalam satu sistem.
        </p>
    </div>

    <div class="dashboard">
        <a href="peminjaman_adm.php?page=buku" class="card">
            <div class="card-icon bg-blue">📚</div>
            <div class="card-title">Data Peminjaman</div>
            <div class="card-desc">Kelola transaksi peminjaman buku</div>
        </a>

        <a href="anggota.php?page=anggota" class="card">
            <div class="card-icon bg-green">👥</div>
            <div class="card-title">Data Anggota</div>
            <div class="card-desc">Kelola data anggota perpustakaan</div>
        </a>
    </div>
</div>

</body>
</html>