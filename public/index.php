<?php
require_once '../app/controllers/authcontrollers.php';
require_once '../app/controllers/bukucontrollers.php';
require_once '../app/controllers/anggotacontrollers.php';
require_once '../app/controllers/peminjamancontrollers.php';

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        (new authcontrollers())->login();
        break;
    case 'dashboard':
        (new anggotacontrollers())->dashboard();
        break;
    case 'buku':
        (new bukucontrollers())->index();
        break;
    case 'peminjaman':
        (new peminjamancontrollers())->index();
        break;
    case 'logout':
        (new authcontrollers())->logout();
        break;
}
