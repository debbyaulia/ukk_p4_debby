<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Perpustakaan</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #ffffff;
            padding: 30px 35px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            color: #1565c0;
            margin-bottom: 10px;
        }

        .login-container p {
            text-align: center;
            color: #607d8b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .login-container input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #bbdefb;
            border-radius: 8px;
            font-size: 14px;
        }

        .login-container input:focus {
            outline: none;
            border-color: #1e88e5;
            box-shadow: 0 0 5px rgba(30, 136, 229, 0.3);
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background: #1e88e5;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-container button:hover {
            background: #1565c0;
        }

        .login-container .register {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container .register a {
            color: #1e88e5;
            text-decoration: none;
            font-weight: 500;
        }

        .login-container .register a:hover {
            text-decoration: underline;
        }

        .icon {
            text-align: center;
            font-size: 40px;
            margin-bottom: 10px;
            color: #1e88e5;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="icon">📚</div>
    <h2>Login Perpustakaan</h2>
    <p>Silakan masuk untuk mengakses sistem</p>

    <form method="post" action="../../controllers/c_login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <div class="register">
        Belum punya akun? <a href="register.php">Daftar di sini</a>
    </div>
</div>

</body>
</html>