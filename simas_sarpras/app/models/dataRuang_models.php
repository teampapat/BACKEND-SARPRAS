<?php 

class dataRuang_models {
    private $table = 'data_ruang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRuang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getRuangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_ruang=:nama_ruang');
        $this->db->bind('nama_ruang', $id);
        return $this->db->single();
    }

    public function tambahDataRuang($data)
    {
        $query = "INSERT INTO data_ruang
                    VALUES
                  (null, :nama_ruang, :barangaset_ruang)";

        $this->db->query($query);
        $this->db->bind('barangaset_ruang', $data['barangaset_ruang']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataRuang($id)
    {
        $query = "DELETE FROM data_ruang WHERE nama_ruang = :nama_ruang";

        $this->db->query($query);
        $this->db->bind('nama_ruang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataRuang($data)
    {
        $query = "UPDATE data_ruang SET
                    barangaset_ruang = :barangaset_ruang
                  WHERE nama_ruang = :nama_ruang";

        $this->db->query($query);
        $this->db->bind('barangaset_ruang', $data['barangaset_ruang']);

        return $this->db->rowCount();
    }


    public function cariDataRuang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM data_ruang WHERE nama_ruang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
