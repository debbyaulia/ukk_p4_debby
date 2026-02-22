<?php
class Peminjaman {
    private $conn;
    private $table = "peminjaman";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil buku yang sedang dipinjam berdasarkan nama user
    public function bukuDipinjamByUser($nama) {

        $query = "SELECT * FROM peminjaman 
                  WHERE nama = ? AND status = 'dipinjam'
                  ORDER BY id_pinjam DESC";

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare gagal: " . $this->conn->error);
        }

        $stmt->bind_param("s", $nama);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Simpan peminjaman
    public function pinjam($nama, $nama_buku) {

        $query = "INSERT INTO peminjaman (nama_buku, nama, tgl_pinjam, status)
                  VALUES (?, ?, CURDATE(), 'dipinjam')";

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare gagal: " . $this->conn->error);
        }

        $stmt->bind_param("ss", $nama_buku, $nama);
        return $stmt->execute();
    }

    // Kembalikan buku
    public function kembalikan($id_pinjam) {

        $query = "UPDATE peminjaman 
                  SET status = 'kembali', tgl_kembali = CURDATE()
                  WHERE id_pinjam = ?";

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare gagal: " . $this->conn->error);
        }

        $stmt->bind_param("i", $id_pinjam);
        return $stmt->execute();
    }
}
?>
