<!-- <?php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require __DIR__ . '/../../config/database.php';

        $this->pdo = new PDO(
            "mysql:host={$config['host']};dbname={$config['peminjaman_buku']}",
            $config['user'],
            $config['pass']
        );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function connect() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
} -->

<?php


// Inisialisasi kelas atau membuat kelas diusahakan nama kelas sama dengan nama file
// Properti dan function (isi kelas)
class koneksi {
    // Untuk membuat koneksi ke database kita menggunakan fungsi fungsi bawaan dari php mysqli_connect(server, username, pass, db)  
    // Publik modifire
    // Access modifier atau modifier akses digunakan untuk menentukan tingkat aksesibilitas atau visibilitas proerti dan metode dalam sebuah kelas : 

        // public (Modifier ini memungkinkan properti atau metode diakses dari mana saja: dari dalam kelas, dari kelas turunan, dan dari luar kelas)
        // private (Modifier ini memungkinkan properti atau metode hanya dapat diakses dari dalam kelas itu sendiri) 
        // protected (Modifier ini memungkinkan properti atau metode diakses hanya dari dalam kelas itu sendiri dan dari kelas yang mewarisinya (kelas turunan))
        

    // Karena tidak boleh diakses dikelas manapun jadi menggunakan private
    private $server = "localhost";
    private $username = "root";
    private $pass = "";
    private $db = "peminjaman_buku";


    // Berfungsi untuk mengembalikan nilai dari koneksi ke db jika koneksinya berhasil
    public $koneksi;

    // Dalam Pemrograman berorientasi objek (OOP) di php, fungsi__construct adalah fungsi khusus yang disebut constructor. Fungsi ini secara otomatis dipanggil ketika sebuah objek dari kelas dibuat. Konstruktor berfungsi untuk menginisialisasi nilai awal atau melakukan tindakan tertentu saat objek dibuat, seperti menetapkan nilai properti atau menyiapkan koneksi ke db

    // $this -> memanggil properti didalam kelas
    function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->server,
            $this->username,
            $this->pass,
            $this->db
        );


        // Buat memilih database yang akan kita gunakan
        mysqli_select_db($this->koneksi, $this->db);

        if ($this->koneksi) {
            // echo "Koneksi ke Db " . $this->db . " Berhasil";
            // mengembalikan nilai koneksi jika koneksinya berhasil
            return $this->koneksi;
        } else {
            echo "Koneksi ke Db Gagal";
        }
        
    }
}

// karena belum bikin variabel objek dari kelas koneksi jadi di browser tidak muncul apa apa
// jika sudah dibikin maka akan muncul
$koneksi = new koneksi();

?>

