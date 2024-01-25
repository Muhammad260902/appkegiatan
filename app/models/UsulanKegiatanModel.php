<?php
class UsulanKegiatanModel
{
    private $table = 'tb_usulan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUsulan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getUsulanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahUsulan($data)
    {
        $query = "INSERT INTO tb_usulan(menu_usulan, persyaratan, kegiatan) VALUES (:menu_usulan, :persyaratan, :kegiatan)";
        $this->db->query($query);
        $this->db->bind('menu_usulan', $data['menu_usulan']);
        $this->db->bind('persyaratan', $data['persyaratan']);
        $this->db->bind('kegiatan', $data['kegiatan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataUsulan($data)
    {
        $query = 'UPDATE tb_usulan SET menu_usulan=:menu_usulan, persyaratan=:persyaratan, kegiatan=:kegiatan WHERE id=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('menu_usulan', $data['menu_usulan']);
        $this->db->bind('persyaratan', $data['persyaratan']);
        $this->db->bind('kegiatan', $data['kegiatan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteUsulan($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariUsulan()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE menu_usulan LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
