<?php
include_once __DIR__ . '/koneksi.php';

class peminjaman
{
    private $koneksi;

    public function __construct()
    {
        $db = new Koneksi();
        $this->koneksi = $db->koneksi;
    }

    public function tampil_data()
    {
        $data = [];
        // Pastikan kolom ID di database Anda adalah id_pinjam
        $query = "SELECT * FROM peminjaman ORDER BY id_pinjam DESC"; 
        $result = mysqli_query($this->koneksi, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getById($id)
    {
        $id = mysqli_real_escape_string($this->koneksi, $id);
        $query = mysqli_query($this->koneksi, "SELECT * FROM peminjaman WHERE id_pinjam='$id'");
        return mysqli_fetch_assoc($query);
    }

    public function simpan($data)
    {
        return mysqli_query($this->koneksi, "
            INSERT INTO peminjaman (nama_buku, nama, tgl_pinjam, tgl_kembali, status)
            VALUES (
                '{$data['nama_buku']}',
                '{$data['nama']}',
                '{$data['tgl_pinjam']}',
                '{$data['tgl_kembali']}',
                '{$data['status']}'
            )
        ");
    }

    public function update($id, $data)
    {
        $id = mysqli_real_escape_string($this->koneksi, $id);
        return mysqli_query($this->koneksi, "
            UPDATE peminjaman SET
                nama_buku   = '{$data['nama_buku']}',
                nama        = '{$data['nama']}',
                tgl_pinjam  = '{$data['tgl_pinjam']}',
                tgl_kembali = '{$data['tgl_kembali']}',
                status      = '{$data['status']}'
            WHERE id_pinjam='$id'
        ");
    }

    public function hapus($id)
    {
        $id = mysqli_real_escape_string($this->koneksi, $id);
        return mysqli_query($this->koneksi, "DELETE FROM peminjaman WHERE id_pinjam='$id'");
    }
}