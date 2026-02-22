<?php
class Buku {

    private $conn;
    private $table = "buku";

    // constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Ambil semua data buku
    public function semuaBuku() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id_buku DESC";
        $result = $this->conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Kurangi stok saat dipinjam
    public function kurangiStok($id_buku) {
        $query = "UPDATE " . $this->table . " 
                  SET stok = stok - 1 
                  WHERE id_buku = ? AND stok > 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_buku);

        return $stmt->execute();
    }

    // Tambah stok saat dikembalikan
    public function tambahStok($id_buku) {
        $query = "UPDATE " . $this->table . " 
                  SET stok = stok + 1 
                  WHERE id_buku = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_buku);

        return $stmt->execute();
    }

}
?>
