<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Contoh login sederhana (tanpa database)
    if ($username === "Debby" && $password === "12345") {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #b2dfdb, #e0f2f1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #ffffff;
            padding: 35px 40px;
            border-radius: 20px;
            width: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #00796b;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            border: 1px solid #b2dfdb;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #00796b;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🔐 Login</h2>

    <?php if (isset($error)) : ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
                <a href="dasboard.php?page=login" class="card">
        <button type="submit" name="login">Login</button>
        
    </form>
</div>

</body>
</html>
