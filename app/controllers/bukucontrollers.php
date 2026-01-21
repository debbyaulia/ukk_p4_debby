<?php

require_once '../app/models/buku.php';
require_once '../app/core/controllers.php';

class bukucontroller extends controller {
    public function index() {
        $buku = new Buku();
        $this->view('admin/buku', [
            'buku' => $buku->all()
        ]);
    }
}
