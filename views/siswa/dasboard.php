<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        }

        .container {
            padding: 40px;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            color: #0d47a1;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-decoration: none;
            color: #0d47a1;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.2);
        }

        .icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
        }

        .desc {
            font-size: 14px;
            color: #555;
            margin-top: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🎒 Dashboard Siswa</h2>

    <div class="dashboard">
        <a href="peminjaman.php?page=peminjaman" class="card">
            <div class="icon">📚</div>
            <div class="title">Peminjaman</div>
            <div class="desc">Lihat & kelola buku yang dipinjam</div>
        </a>
    </div>
</div>

</body>
</html>
