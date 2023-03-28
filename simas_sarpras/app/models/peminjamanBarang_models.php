<?php 

class peminjamanBarang_models {
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_peminjaman=:kode_peminjaman');
        $this->db->bind('kode_peminjaman', $id);
        return $this->db->single();
    }

    public function tambahDataPeminjaman($data)
    {
        $query = "INSERT INTO peminjaman
                    VALUES
                  (null, :kode_peminjaman, :tanggal_peminjaman, :nama_peminjaman, :kelas_peminjaman, :namabarang_peminjaman, :jangkawaktu, :tglpengembalian, :keterangan_peminjaman)";

        $this->db->query($query);
        $this->db->bind('tanggal_peminjaman', $data['tanggal_peminjaman']);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('kelas_peminjaman', $data['kelas_peminjaman']);
        $this->db->bind('namabarang_peminjaman', $data['namabarang_peminjaman']);
        $this->db->bind('jangkawaktu', $data['jangkawaktu']);
        $this->db->bind('tglpengembalian', $data['tglpengembalian']);
        $this->db->bind('keterangan_peminjaman', $data['keterangan_peminjaman']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPeminjaman($id)
    {
        $query = "DELETE FROM peminjaman WHERE kode_peminjaman = :kode_peminjaman";

        $this->db->query($query);
        $this->db->bind('kode_peminjaman', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataPeminjaman($data)
    {
        $query = "UPDATE peminjaman SET
                    tanggal_peminjaman = :tanggal_peminjaman,
                    nama_peminjaman = :nama_peminjaman,
                    kelas_peminjaman = :kelas_peminjaman,
                    namabarang_peminjaman = :namabarang_peminjaman,
                    jangkawaktu = :jangkawaktu,
                    tglpembembalian = :tglpembembalian,
                    keterangan_peminjaman = :keterangan_peminjaman
                WHERE kode_peminjaman = :kode_peminjaman";

        $this->db->query($query);
        $this->db->bind('tanggal_peminjaman', $data['tanggal_peminjaman']);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('kelas_peminjaman', $data['kelas_peminjaman']);
        $this->db->bind('namabarang_peminjaman', $data['namabarang_peminjaman']);
        $this->db->bind('jangkawaktu', $data['jangkawaktu']);
        $this->db->bind('tglpengembalian', $data['tglpengembalian']);
        $this->db->bind('keterangan_peminjaman', $data['keterangan_peminjaman']);


        return $this->db->rowCount();
    }


    public function cariDataPeminjaman()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM peminjaman WHERE tanggal_peminjaman LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
