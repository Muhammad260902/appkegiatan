<?php
class SubKegiatanModel
{
    private $table = 'tb_subkegiatan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSubkegiatan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getSubkegiatanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_subkegiatan=:id_subkegiatan');
        $this->db->bind('id_subkegiatan', $id);

        return $this->db->single();
    }

    public function tambahSubkegiatan($data)
    {
        $query = "INSERT INTO tb_subkegiatan(kode_sub_kegiatan, nama_sub_kegiatan) VALUES (:kode_sub_kegiatan, :nama_sub_kegiatan)";
        $this->db->query($query);
        $this->db->bind('kode_sub_kegiatan', $data['kode_sub_kegiatan']);
        $this->db->bind('nama_sub_kegiatan', $data['nama_sub_kegiatan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSubkegiatan($data)
    {
        $query = 'UPDATE tb_subkegiatan SET kode_sub_kegiatan=:kode_sub_kegiatan, nama_sub_kegiatan=:nama_sub_kegiatan WHERE id_subkegiatan=:id_subkegiatan';
        $this->db->query($query);
        $this->db->bind('id_subkegiatan', $data['id_subkegiatan']);
        $this->db->bind('kode_sub_kegiatan', $data['kode_sub_kegiatan']);
        $this->db->bind('nama_sub_kegiatan', $data['nama_sub_kegiatan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSubkegiatan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_subkegiatan=:id_subkegiatan');
        $this->db->bind('id_subkegiatan', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariSubkegiatan()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_sub_kegiatan LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
