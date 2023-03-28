<?php 

class pengajuanWaka_models {
    private $table = 'pengajuan_waka';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengajuanWaka()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPengajuanWakaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_waka=:kode_waka');
        $this->db->bind('kode_waka', $id);
        return $this->db->single();
    }

    public function tambahDataPengajuanWaka($data)
    {
        $query = "INSERT INTO pengajuan_waka
                    VALUES
                  (null, :kode_waka, :waka_waka, :namabarang_waka, :spesifikasibarang_waka, :bulan_waka, :jumlah_waka, :satuan_waka, :hargasatuan_waka, :totalharga_waka, :baranguntuk_waka, :keterangan_waka)";

        $this->db->query($query);
        $this->db->bind('waka_waka', $data['waka_waka']);
        $this->db->bind('namabarang_waka', $data['namabarang_waka']);
        $this->db->bind('spesifikasibarang_waka', $data['spesifikasibarang_waka']);
        $this->db->bind('bulan_waka', $data['bulan_waka']);
        $this->db->bind('jumlah_waka', $data['jumlah_waka']);
        $this->db->bind('satuan_waka', $data['satuan_waka']);
        $this->db->bind('hargasatuan_waka', $data['hargasatuan_waka']);
        $this->db->bind('totalharga_waka', $data['totalharga_waka']);
        $this->db->bind('baranguntuk_waka', $data['baranguntuk_waka']);
        $this->db->bind('keterangan_waka', $data['keterangan_waka']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengajuanWaka($id)
    {
        $query = "DELETE FROM pengajuan_waka WHERE kode_waka = :kode_waka";

        $this->db->query($query);
        $this->db->bind('kode_waka', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPengajuanWaka($data)
    {
        $query = "UPDATE pengajuan_waka SET
                    waka_waka = :waka_waka,
                    namabarang_waka = :namabarang_waka,
                    spesifikasibarang_waka = :spesifikasibarang_waka,
                    bulan_waka = :bulan_waka,
                    jumlah_waka = :jumlah_waka,
                    satuan_waka = :satuan_waka,
                    hargasatuan_waka = :hargasatuan_waka
                    totalharga_waka = :totalharga_waka,
                    jumlah_waka = :jumlah_waka,
                    tglpembembalian = :tglpembembalian,
                WHERE kode_waka = :kode_waka";

        $this->db->query($query);
        $this->db->bind('waka_waka', $data['waka_waka']);
        $this->db->bind('namabarang_waka', $data['namabarang_waka']);
        $this->db->bind('spesifikasibarang_waka', $data['spesifikasibarang_waka']);
        $this->db->bind('bulan_waka', $data['bulan_waka']);
        $this->db->bind('jumlah_waka', $data['jumlah_waka']);
        $this->db->bind('satuan_waka', $data['satuan_waka']);
        $this->db->bind('hargasatuan_waka', $data['hargasatuan_waka']);


        return $this->db->rowCount();
    }


    public function cariDataPengajuanWaka()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pengajuan_waka WHERE waka_waka LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}