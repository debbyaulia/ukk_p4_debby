<?php
require_once 'koneksi.php';

class M_User extends Koneksi
{
    // Register
    public function register($username, $password, $role, $kelas)
    {
        $sql = "INSERT INTO user (username, password, role, kelas) VALUES (?, ?, ?, ?)";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ssss", $username, $password, $role, $kelas);

        return $stmt->execute();
    }

    // Login
    public function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}