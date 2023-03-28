<?php 

class pengajuanMapel_models {
    private $table = 'pengajuan_mapel';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengajuanMapel()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPengajuanmapelById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_mapel=:kode_mapel');
        $this->db->bind('kode_mapel', $id);
        return $this->db->single();
    }

    public function tambahDataPengajuanMapel($data)
    {
        $query = "INSERT INTO pengajuan_mapel
                    VALUES
                  (null, :kode_mapel, :mapel_mapel, :namabarang_mapel, :spesifikasibarang_mapel, :bulan_mapel, :jumlah_mapel, :satuan_mapel, :hargasatuan_mapel, :totalharga_mapel, :baranguntuk_mapel, :keterangan_mapel)";

        $this->db->query($query);
        $this->db->bind('mapel_mapel', $data['mapel_mapel']);
        $this->db->bind('namabarang_mapel', $data['namabarang_mapel']);
        $this->db->bind('spesifikasibarang_mapel', $data['spesifikasibarang_mapel']);
        $this->db->bind('bulan_mapel', $data['bulan_mapel']);
        $this->db->bind('jumlah_mapel', $data['jumlah_mapel']);
        $this->db->bind('satuan_mapel', $data['satuan_mapel']);
        $this->db->bind('hargasatuan_mapel', $data['hargasatuan_mapel']);
        $this->db->bind('totalharga_mapel', $data['totalharga_mapel']);
        $this->db->bind('baranguntuk_mapel', $data['baranguntuk_mapel']);
        $this->db->bind('keterangan_mapel', $data['keterangan_mapel']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengajuanMapel($id)
    {
        $query = "DELETE FROM pengajuan_mapel WHERE kode_mapel = :kode_mapel";

        $this->db->query($query);
        $this->db->bind('kode_mapel', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPengajuanMapel($data)
    {
        $query = "UPDATE pengajuan_mapel SET
                    mapel_mapel = :mapel_mapel,
                    namabarang_mapel = :namabarang_mapel,
                    spesifikasibarang_mapel = :spesifikasibarang_mapel,
                    bulan_mapel = :bulan_mapel,
                    jumlah_mapel = :jumlah_mapel,
                    satuan_mapel = :satuan_mapel,
                    hargasatuan_mapel = :hargasatuan_mapel
                    totalharga_mapel = :totalharga_mapel,
                    jumlah_mapel = :jumlah_mapel,
                    tglpembembalian = :tglpembembalian,
                WHERE kode_mapel = :kode_mapel";

        $this->db->query($query);
        $this->db->bind('mapel_mapel', $data['mapel_mapel']);
        $this->db->bind('namabarang_mapel', $data['namabarang_mapel']);
        $this->db->bind('spesifikasibarang_mapel', $data['spesifikasibarang_mapel']);
        $this->db->bind('bulan_mapel', $data['bulan_mapel']);
        $this->db->bind('jumlah_mapel', $data['jumlah_mapel']);
        $this->db->bind('satuan_mapel', $data['satuan_mapel']);
        $this->db->bind('hargasatuan_mapel', $data['hargasatuan_mapel']);


        return $this->db->rowCount();
    }


    public function cariDataPengajuanMapel()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pengajuan_mapel WHERE mapel_mapel LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}