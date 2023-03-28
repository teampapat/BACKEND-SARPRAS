<?php 

class databarangKeluar_models {
    private $table = 'barang_keluar';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKeluar()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKeluarById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataKeluar($data)
    {
        $query = "INSERT INTO barang_keluar
                    VALUES
                  (null, :id, :namabarang_keluar, :spesifikasi_keluar, :jumlah_keluar, :satuan_keluar, :baranguntuk_keluar, :keterangan_keluar)";

        $this->db->query($query);
        $this->db->bind('namabarang_keluar', $data['namabarang_keluar']);
        $this->db->bind('spesifikasi_keluar', $data['spesifikasi_keluar']);
        $this->db->bind('jumlah_keluar', $data['jumlah_keluar']);
        $this->db->bind('satuan_keluar', $data['satuan_keluar']);
        $this->db->bind('baranguntuk_keluar', $data['baranguntuk_keluar']);
        $this->db->bind('keterangan_keluar', $data['keterangan_keluar']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKeluar($id)
    {
        $query = "DELETE FROM barang_keluar WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataKeluar($data)
    {
        $query = "UPDATE barang_keluar SET
                    namabarang_keluar = :namabarang_keluar,
                    spesifikasi_keluar = :spesifikasi_keluar,
                    jumlah_keluar = :jumlah_keluar,
                    satuan_keluar = :satuan_keluar,
                    baranguntuk_keluar = :baranguntuk_keluar,
                    keterangan_keluar = :keterangan_keluar,
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('namabarang_keluar', $data['namabarang_keluar']);
        $this->db->bind('speifikasi_keluar', $data['speifikasi_keluar']);
        $this->db->bind('jumlah_keluar', $data['jumlah_keluar']);
        $this->db->bind('satuan_keluar', $data['satuan_keluar']);
        $this->db->bind('baranguntuk_keluar', $data['baranguntuk_keluar']);
        $this->db->bind('keterangan_keluar', $data['keterangan_keluar']);

        return $this->db->rowCount();
    }


    public function cariDataKeluar()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM barang_keluar WHERE namabarang_keluar LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
