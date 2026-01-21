<?php

require_once 'model.php';

class Peminjaman extends Model {
    public function all() {
        return $this->db->query("SELECT * FROM peminjaman")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pinjam($user_id, $buku_id) {
        $stmt = $this->db->prepare(
            "INSERT INTO peminjaman VALUES (NULL, ?, ?, NOW())"
        );
        return $stmt->execute([$user_id, $buku_id]);
    }
}
