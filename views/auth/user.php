<?php
//include_once '..controllers/user.php';
session_start();

// Contoh data user
$users = [
    [
        "username" => "Yanto",
        "password" => "12345",
        "role" => "admin",
        "kelas" => "-"
    ],
    [
        "username" => "debby",
        "password" => "12345",
        "role" => "siswa",
        "kelas" => "XII RPL 2"
    ],
];

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];
    $kelas    = $_POST['kelas'];

    foreach ($users as $user) {
        if (
            $user['username'] === $username &&
            $user['password'] === $password &&
            $user['role'] === $role &&
            ($role === 'admin' || $user['kelas'] === $kelas)
        ) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['kelas'] = $kelas;

            header("Location: dasboard_siswa.php");
            exit;
        }
    }

    $error = "Data login tidak sesuai!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
* {
    box-sizing: border-box;
}
body {
    margin: 0;
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #b2dfdb, #e0f2f1);
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-card {
    background: #fff;
    width: 380px;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,.15);
}
.login-card h2 {
    text-align: center;
    color: #00796b;
    margin-bottom: 25px;
}
.login-card input,
.login-card select {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border-radius: 12px;
    border: 1px solid #b2dfdb;
    font-size: 14px;
}
.login-card button {
    width: 100%;
    padding: 12px;
    background: #00796b;
    color: white;
    border: none;
    border-radius: 14px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}
.error {
    text-align: center;
    color: red;
    margin-bottom: 10px;
}
</style>
</head>
<body>

<div class="login-card">
    <h2>🔐 Login</h2>

    <?php if (isset($error)) : ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="siswa">Siswa</option>
        </select>

        <input type="text" name="kelas" placeholder="Kelas (contoh: XI RPL 1)">

        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>