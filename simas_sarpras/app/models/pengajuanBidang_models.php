<?php 

class pengajuanBidang_models {
    private $table = 'pengajuan_bidang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengajuanbidang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPengajuanbidangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_bidang=:kode_bidang');
        $this->db->bind('kode_bidang', $id);
        return $this->db->single();
    }

    public function tambahDataPengajuanbidang($data)
    {
        $query = "INSERT INTO pengajuan_bidang
                    VALUES
                  (null, :kode_bidang, :bidang_bidang, :namabarang_bidang, :spesifikasibarang_bidang, :bulan_bidang, :jumlah_bidang, :satuan_bidang, :hargasatuan_bidang, :totalharga_bidang, :baranguntuk_bidang, :keterangan_bidang)";

        $this->db->query($query);
        $this->db->bind('bidang_bidang', $data['bidang_bidang']);
        $this->db->bind('namabarang_bidang', $data['namabarang_bidang']);
        $this->db->bind('spesifikasibarang_bidang', $data['spesifikasibarang_bidang']);
        $this->db->bind('bulan_bidang', $data['bulan_bidang']);
        $this->db->bind('jumlah_bidang', $data['jumlah_bidang']);
        $this->db->bind('satuan_bidang', $data['satuan_bidang']);
        $this->db->bind('hargasatuan_bidang', $data['hargasatuan_bidang']);
        $this->db->bind('totalharga_bidang', $data['totalharga_bidang']);
        $this->db->bind('baranguntuk_bidang', $data['baranguntuk_bidang']);
        $this->db->bind('keterangan_bidang', $data['keterangan_bidang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengajuanbidang($id)
    {
        $query = "DELETE FROM pengajuan_bidang WHERE kode_bidang = :kode_bidang";

        $this->db->query($query);
        $this->db->bind('kode_bidang', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPengajuanbidang($data)
    {
        $query = "UPDATE pengajuan_bidang SET
                    bidang_bidang = :bidang_bidang,
                    namabarang_bidang = :namabarang_bidang,
                    spesifikasibarang_bidang = :spesifikasibarang_bidang,
                    bulan_bidang = :bulan_bidang,
                    jumlah_bidang = :jumlah_bidang,
                    satuan_bidang = :satuan_bidang,
                    hargasatuan_bidang = :hargasatuan_bidang
                    totalharga_bidang = :totalharga_bidang,
                    jumlah_bidang = :jumlah_bidang,
                    tglpembembalian = :tglpembembalian,
                WHERE kode_bidang = :kode_bidang";

        $this->db->query($query);
        $this->db->bind('bidang_bidang', $data['bidang_bidang']);
        $this->db->bind('namabarang_bidang', $data['namabarang_bidang']);
        $this->db->bind('spesifikasibarang_bidang', $data['spesifikasibarang_bidang']);
        $this->db->bind('bulan_bidang', $data['bulan_bidang']);
        $this->db->bind('jumlah_bidang', $data['jumlah_bidang']);
        $this->db->bind('satuan_bidang', $data['satuan_bidang']);
        $this->db->bind('hargasatuan_bidang', $data['hargasatuan_bidang']);


        return $this->db->rowCount();
    }


    public function cariDataPengajuanbidang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pengajuan_bidang WHERE bidang_bidang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}