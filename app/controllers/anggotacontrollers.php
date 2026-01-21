<?php

require_once '../app/core/controllers.php';

class anggotacontrollers extends controllers {
    public function dashboard() {
        $this->view('siswa/dashboard');
    }
}
