<?php 

class databarangMasuk_models {
    private $table = 'barang_masuk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMasuk()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMasukById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMasuk($data)
    {
        $query = "INSERT INTO barang_masuk
                    VALUES
                  (null, :id, :tgl_masuk, :foto_masuk, :uraian_masuk, :jumlah_masuk, :satuan_masuk, :keterangan_masuk)";

        $this->db->query($query);
        $this->db->bind('tgl_masuk', $data['tgl_masuk']);
        $this->db->bind('foto_masuk', $data['foto_masuk']);
        $this->db->bind('uraian_masuk', $data['uraian_masuk']);
        $this->db->bind('jumlah_masuk', $data['jumlah_masuk']);
        $this->db->bind('satuan_masuk', $data['satuan_masuk']);
        $this->db->bind('keterangan_masuk', $data['keterangan_masuk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMasuk($id)
    {
        $query = "DELETE FROM barang_masuk WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMasuk($data)
    {
        $query = "UPDATE barang_masuk SET
                    tgl_masuk = :tgl_masuk,
                    foto_masuk = :foto_masuk,
                    uraian_masuk = :uraian_masuk,
                    jumlah_masuk = :jumlah_masuk,
                    satuan_masuk = :satuan_masuk,
                    keterangan_masuk = :keterangan_masuk,
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('tgl_masuk', $data['tgl_masuk']);
        $this->db->bind('speifikasi_Masuk', $data['speifikasi_Masuk']);
        $this->db->bind('uraian_masuk', $data['uraian_masuk']);
        $this->db->bind('jumlah_masuk', $data['jumlah_masuk']);
        $this->db->bind('satuan_masuk', $data['satuan_masuk']);
        $this->db->bind('keterangan_masuk', $data['keterangan_masuk']);

        return $this->db->rowCount();
    }


    public function cariDataMasuk()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang_masuk WHERE tgl_masuk LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
