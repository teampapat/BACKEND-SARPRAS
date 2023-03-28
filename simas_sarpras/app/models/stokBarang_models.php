<?php 

class stokBarang_models {
    private $table = 'stok';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStok()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getStokById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_stok=:kode_stok');
        $this->db->bind('kode_stok', $id);
        return $this->db->single();
    }

    public function tambahDataStok($data)
    {
        $query = "INSERT INTO stok
                    VALUES
                  (null, :kode_stok, :namabarang_stok, :sumberdana_stok, :jumlah_stok, :tempat_stok, :waktu_stok, :penerima_stok)";

        $this->db->query($query);
        $this->db->bind('namabarang_stok', $data['namabarang_stok']);
        $this->db->bind('sumberdana_stok', $data['sumberdana_stok']);
        $this->db->bind('jumlah_stok', $data['jumlah_stok']);
        $this->db->bind('tempat_stok', $data['tempat_stok']);
        $this->db->bind('waktu_stok', $data['waktu_stok']);
        $this->db->bind('penerima_stok', $data['penerima_stok']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataStok($id)
    {
        $query = "DELETE FROM stok WHERE kode_stok = :kode_stok";

        $this->db->query($query);
        $this->db->bind('kode_stok', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataStok($data)
    {
        $query = "UPDATE stok SET
                    namabarang_stok = :namabarang_stok,
                    sumberdana_stok = :sumberdana_stok,
                    jumlah_stok = :jumlah_stok,
                    tempat_stok = :tempat_stok,
                    waktu_stok = :waktu_stok,
                    penerima_stok = :penerima_stok,
                WHERE kode_stok = :kode_stok";

        $this->db->query($query);
        $this->db->bind('namabarang_stok', $data['namabarang_stok']);
        $this->db->bind('sumberdana_stok', $data['sumberdana_stok']);
        $this->db->bind('jumlah_stok', $data['jumlah_stok']);
        $this->db->bind('tempat_stok', $data['tempat_stok']);
        $this->db->bind('waktu_stok', $data['waktu_stok']);
        $this->db->bind('penerima_stok', $data['penerima_stok']);


        return $this->db->rowCount();
    }


    public function cariDataStok()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM stok WHERE namabarang_stok LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
