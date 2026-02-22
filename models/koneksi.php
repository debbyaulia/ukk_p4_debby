<?php
class Koneksi
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "peminjaman_buku";

    public $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );

        if (!$this->koneksi) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    }
}
