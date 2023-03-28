<?php 

class asetbarangAset_models {
    private $table = 'aset_aset';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllasetaset()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getasetasetById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_aset=:kode_aset');
        $this->db->bind('kode_aset', $id);
        return $this->db->single();
    }

    public function tambahDataasetaset($data)
    {
        $query = "INSERT INTO aset_aset
                    VALUES
                  (null, :kode_aset, :namabarang_aset, :sumberdana_aset, :jumlah_aset, :tempat_aset, :waktu_aset, :penerima_aset)";

        $this->db->query($query);
        $this->db->bind('namabarang_aset', $data['namabarang_aset']);
        $this->db->bind('sumberdana_aset', $data['sumberdana_aset']);
        $this->db->bind('jumlah_aset', $data['jumlah_aset']);
        $this->db->bind('tempat_aset', $data['tempat_aset']);
        $this->db->bind('waktu_aset', $data['waktu_aset']);
        $this->db->bind('penerima_aset', $data['penerima_aset']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataasetaset($id)
    {
        $query = "DELETE FROM aset_aset WHERE kode_aset = :kode_aset";

        $this->db->query($query);
        $this->db->bind('kode_aset', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataasetaset($data)
    {
        $query = "UPDATE aset_aset SET
                    namabarang_aset = :namabarang_aset,
                    sumberdana_aset = :sumberdana_aset,
                    jumlah_aset = :jumlah_aset,
                    tempat_aset = :tempat_aset,
                    waktu_aset = :waktu_aset,
                    penerima_aset = :penerima_aset,
                WHERE kode_aset = :kode_aset";

        $this->db->query($query);
        $this->db->bind('namabarang_aset', $data['namabarang_aset']);
        $this->db->bind('sumberdana_aset', $data['sumberdana_aset']);
        $this->db->bind('jumlah_aset', $data['jumlah_aset']);
        $this->db->bind('tempat_aset', $data['tempat_aset']);
        $this->db->bind('waktu_aset', $data['waktu_aset']);
        $this->db->bind('penerima_aset', $data['penerima_aset']);


        return $this->db->rowCount();
    }


    public function cariDataasetaset()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM aset WHERE namabarang_aset LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
