<?php
class PengadaanModel
{
    private $table = 'tb_pengadaan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengadaan()
    {
        $this->db->query('SELECT tb_pengadaan.*, tb_subkegiatan.kode_sub_kegiatan FROM ' . $this->table . ' JOIN tb_subkegiatan ON tb_subkegiatan.kode_subkegiatan = tb_pengadaan.kode_sub_kegiatan');
        $this->db->query('SELECT tb_pengadaan.*, tb_subkegiatan.nama_sub_kegiatan FROM ' . $this->table . ' JOIN tb_subkegiatan ON tb_subkegiatan.nama_sub_kegiatan = tb_pengadaan.nama_sub_kegiatan');
        return $this->db->resultSet();
    }

    public function getPengadaanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahPengadaan($data)
    {
        $query = "INSERT INTO tb_pengadaan(kode_sub_kegiatan, nama_sub_kegiatan, nama_barang, satuan, jumlah, harga, total ) VALUES (:kode_sub_kegiatan, :nama_sub_kegiatan, :nama_barang, :satuan, :jumlah, :harga, :total)";
        $this->db->query($query);
        $this->db->bind('kode_sub_kegiatan', $data['kode_sub_kegiatan']);
        $this->db->bind('nama_sub_kegiatan', $data['nama_sub_kegiatan']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('total', $data['total']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPengadaan($data)
    {
        $query = 'UPDATE tb_pengadaan SET kode_sub_kegiatan=:kode_sub_kegiatan, nama_sub_kegiatan=:nama_sub_kegiatan, nama_barang=:nama_barang, satuan=:satuan, jumlah=:jumlah, harga=:harga, total=:total WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('kode_sub_kegiatan', $data['kode_sub_kegiatan']);
        $this->db->bind('nama_sub_kegiatan', $data['nama_sub_kegiatan']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('total', $data['total']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePengadaan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPengadaan()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_barang LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
