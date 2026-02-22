<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Perpustakaan</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            height: 100vh;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            background-color: #ffffff;
            width: 380px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .register-box .icon {
            text-align: center;
            font-size: 42px;
            margin-bottom: 10px;
            color: #1e88e5;
        }

        .register-box h2 {
            text-align: center;
            color: #1565c0;
            margin-bottom: 5px;
        }

        .register-box p {
            text-align: center;
            font-size: 14px;
            color: #607d8b;
            margin-bottom: 25px;
        }

        .register-box input,
        .register-box select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #bbdefb;
            font-size: 14px;
        }

        .register-box input:focus,
        .register-box select:focus {
            outline: none;
            border-color: #1e88e5;
            box-shadow: 0 0 6px rgba(30, 136, 229, 0.3);
        }

        .register-box button {
            width: 100%;
            padding: 10px;
            background-color: #1e88e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .register-box button:hover {
            background-color: #1565c0;
        }

        .register-box .login {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-box .login a {
            color: #1e88e5;
            text-decoration: none;
            font-weight: 500;
        }

        .register-box .login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-box">
    <div class="icon">📚</div>
    <h2>Register Perpustakaan</h2>
    <p>Daftarkan akun baru untuk akses sistem</p>

    <form method="post" action="../../controllers/c_login.php">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <select name="role" id="role" onchange="cekRole()" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="siswa">Siswa</option>
        </select>

        <input type="text" name="kelas" id="kelas" placeholder="Kelas">

        <button type="submit" name="register">Register</button>
    </form>

    <div class="login">
        Sudah punya akun? <a href="login.php">Login</a>
    </div>
</div>

<script>
function cekRole() {
    let role = document.getElementById('role').value;
    let kelas = document.getElementById('kelas');

    if (role === 'admin') {
        kelas.value = '';
        kelas.style.display = 'none';
    } else {
        kelas.style.display = 'block';
    }
}
</script>

</body>
</html>