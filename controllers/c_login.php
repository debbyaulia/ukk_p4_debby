<?php
session_start();
require_once '../models/m_login.php';

$user = new M_User();

// REGISTER
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];
    $kelas    = $_POST['kelas'];

    if ($role == 'admin') {
        $kelas = null;
    }

    if ($user->register($username, $password, $role, $kelas)) {
        echo "<script>
                alert('Register berhasil');
                window.location='../views/auth/login.php';
              </script>";
    } else {
        echo "<script>alert('Register gagal');</script>";
    }
}

// LOGIN
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $user->login($username, $password);

    if ($data) {
        $_SESSION['id_user']  = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $data['role'];
        $_SESSION['kelas']    = $data['kelas'];

        if ($data['role'] == 'admin') {
            header("Location: ../views/admin/dasboard.php");
        } else {
            header("Location: ../views/siswa/dasboard.php");
        }
        exit;
    } else {
        echo "<script>alert('Username atau password salah');</script>";
    }
}

// LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../views/auth/login.php");
    exit;
}