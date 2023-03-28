<?php 

class fasilitasSekolah_models {
    private $table = 'fasilitas';
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
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_fasilitas=:kode_fasilitas');
        $this->db->bind('kode_fasilitas', $id);
        return $this->db->single();
    }

    public function tambahDataPerbaikan($data)
    {
        $query = "INSERT INTO fasilitas
                    VALUES
                  (null, :kode_fasilitas, :nama_fasilitas, :jumlah_fasilitas, :keteragan_fasilitas)";

        $this->db->query($query);
        $this->db->bind('nama_fasilitas', $data['nama_fasilitas']);
        $this->db->bind('jumlah_fasilitas', $data['jumlah_fasilitas']);
        $this->db->bind('keterangan_fasilitas', $data['keterangan_fasilitas']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPerbaikan($id)
    {
        $query = "DELETE FROM fasilitas WHERE kode_fasilitas = :kode_fasilitas";

        $this->db->query($query);
        $this->db->bind('kode_fasilitas', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPerbaikan($data)
    {
        $query = "UPDATE fasilitas SET
                    nama_fasilitas = :nama_fasilitas,
                    jumlah_fasilitas = :jumlah_fasilitas,
                    keterangan_fasilitas = :keterangan_fasilitas
                WHERE kode_fasilitas = :kode_fasilitas";

        $this->db->query($query);
        $this->db->bind('nama_fasilitas', $data['nama_fasilitas']);
        $this->db->bind('jumlah_fasilitas', $data['jumlah_fasilitas']);
        $this->db->bind('keterangan_fasilitas', $data['keterangan_fasilitas']);

        return $this->db->rowCount();
    }


    public function cariDataPerbaikan()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM fasilitas WHERE nama_fasilitas LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
