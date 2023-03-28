<?php 

class pengajuanJurusan_models {
    private $table = 'pengajuan_jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengajuanJurusan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPengajuanJurusanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_jurusan=:kode_jurusan');
        $this->db->bind('kode_jurusan', $id);
        return $this->db->single();
    }

    public function tambahDataPengajuanJurusan($data)
    {
        $query = "INSERT INTO pengajuan_jurusan
                    VALUES
                  (null, :kode_jurusan, :jurusan_jurusan, :namabarang_jurusan, :spesifikasibarang_jurusan, :bulan_jurusan, :jumlah_jurusan, :satuan_jurusan, :hargasatuan_jurusan, :totalharga_jurusan, :baranguntuk_jurusan, :keterangan_jurusan)";

        $this->db->query($query);
        $this->db->bind('jurusan_jurusan', $data['jurusan_jurusan']);
        $this->db->bind('namabarang_jurusan', $data['namabarang_jurusan']);
        $this->db->bind('spesifikasibarang_jurusan', $data['spesifikasibarang_jurusan']);
        $this->db->bind('bulan_jurusan', $data['bulan_jurusan']);
        $this->db->bind('jumlah_jurusan', $data['jumlah_jurusan']);
        $this->db->bind('satuan_jurusan', $data['satuan_jurusan']);
        $this->db->bind('hargasatuan_jurusan', $data['hargasatuan_jurusan']);
        $this->db->bind('totalharga_jurusan', $data['totalharga_jurusan']);
        $this->db->bind('baranguntuk_jurusan', $data['baranguntuk_jurusan']);
        $this->db->bind('keterangan_jurusan', $data['keterangan_jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPengajuanJurusan($id)
    {
        $query = "DELETE FROM pengajuan_jurusan WHERE kode_jurusan = :kode_jurusan";

        $this->db->query($query);
        $this->db->bind('kode_jurusan', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPengajuanjurusan($data)
    {
        $query = "UPDATE pengajuan_jurusan SET
                    jurusan_jurusan = :jurusan_jurusan,
                    namabarang_jurusan = :namabarang_jurusan,
                    spesifikasibarang_jurusan = :spesifikasibarang_jurusan,
                    bulan_jurusan = :bulan_jurusan,
                    jumlah_jurusan = :jumlah_jurusan,
                    satuan_jurusan = :satuan_jurusan,
                    hargasatuan_jurusan = :hargasatuan_jurusan
                    totalharga_jurusan = :totalharga_jurusan,
                    jumlah_jurusan = :jumlah_jurusan,
                    tglpembembalian = :tglpembembalian,
                WHERE kode_jurusan = :kode_jurusan";

        $this->db->query($query);
        $this->db->bind('jurusan_jurusan', $data['jurusan_jurusan']);
        $this->db->bind('namabarang_jurusan', $data['namabarang_jurusan']);
        $this->db->bind('spesifikasibarang_jurusan', $data['spesifikasibarang_jurusan']);
        $this->db->bind('bulan_jurusan', $data['bulan_jurusan']);
        $this->db->bind('jumlah_jurusan', $data['jumlah_jurusan']);
        $this->db->bind('satuan_jurusan', $data['satuan_jurusan']);
        $this->db->bind('hargasatuan_jurusan', $data['hargasatuan_jurusan']);


        return $this->db->rowCount();
    }


    public function cariDataPengajuanjurusan()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM pengajuan_jurusan WHERE jurusan_jurusan LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}