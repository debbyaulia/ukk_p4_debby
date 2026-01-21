<?php

require_once '../app/models/peminjaman.php';
require_once '../app/core/controllers.php';

class peminjamancontrollers extends controllers {
    public function index() {
        $pinjam = new peminjaman();
        $this->view('siswa/peminjaman', [
            'data' => $pinjam->all()
        ]);
    }
}
