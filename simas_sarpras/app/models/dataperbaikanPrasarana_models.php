<?php 

class dataperbaikanPrasarana_models {
    private $table = 'data_perbaikan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPerbaikan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPerbaikanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_perbaikan=:nama_perbaikan');
        $this->db->bind('nama_perbaikan', $id);
        return $this->db->single();
    }

    public function tambahDataPerbaikan($data)
    {
        $query = "INSERT INTO data_perbaikan
                    VALUES
                  (null, :nama_perbaikan, :sumberdana_perbaikan, :keterangan_perbaikan)";

        $this->db->query($query);
        $this->db->bind('sumberdana_perbaikan', $data['sumberdana_perbaikan']);
        $this->db->bind('keterangan_perbaikan', $data['keterangan_perbaikan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPerbaikan($id)
    {
        $query = "DELETE FROM data_perbaikan WHERE nama_perbaikan = :nama_perbaikan";

        $this->db->query($query);
        $this->db->bind('nama_perbaikan', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPerbaikan($data)
    {
        $query = "UPDATE data_perbaikan SET
                    sumberdana_perbaikan = :sumberdana_perbaikan,
                    keterangan_perbaikan = :keterangan_perbaikan
                  WHERE nama_perbaikan = :nama_perbaikan";

        $this->db->query($query);
        $this->db->bind('sumberdana_perbaikan', $data['sumberdana_perbaikan']);
        $this->db->bind('speifikasi_Perbaikan', $data['speifikasi_Perbaikan']);

        return $this->db->rowCount();
    }


    public function cariDataPerbaikan()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM data_perbaikan WHERE nama_perbaikan LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
