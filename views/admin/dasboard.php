 
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
            margin-bottom: 20px;
            color: #333;
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

    <div class="dashboard">
        <a href="buku.php?page=buku" class="card">
            <div class="card-icon bg-blue">📚</div>
            <div class="card-title">Data Buku</div>
            <div class="card-desc">Kelola data buku perpustakaan</div>
        </a>

        <a href="anggota.php?page=anggota" class="card">
            <div class="card-icon bg-green">👥</div>
            <div class="card-title">Data Anggota</div>
            <div class="card-desc">Kelola data anggota</div>
        </a>

        <a href="index.php?page=laporan" class="card">
            <div class="card-icon bg-orange">📄</div>
            <div class="card-title">Laporan</div>
            <div class="card-desc">Lihat laporan peminjaman</div>
        </a>
    </div>
</div>

</body>
</html>

