<?php 
class pembayaran_model extends Database{

    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getallpembayaran()
    {
        $this->db->query("SELECT * FROM pembayaran");
        return $this->db->resultSet();
    }

    public function getidpembayaran($id)
    {
        $this->db->query("SELECT * FROM pembayaran WHERE id_pembayaran=:id");
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function createpembayaran($data)
    {
        $this->db->query("INSERT INTO pembayaran VALUES (null,:tahun_ajaran,:nominal)");
        $this->db->bind('tahun_ajaran',$data['tahunajaran']);
        $this->db->bind('nominal',$data['nominal']);
        return $this->db->rowCount();
    }

    public function editpembayaran($data)
    {
        $this->db->query("UPDATE pembayaran SET tahun_ajaran=:tahunajaran, nominal=:nominal WHERE id_pembayaran=:id");
        $this->db->bind('tahunajaran',$data['tahunajaran']);
        $this->db->bind('nominal',$data['nominal']);
        $this->db->bind('id',$data['id']);
        return $this->db->rowCount();

    }

    public function hapuspembayaran($id)
    {
        $this->db->query('DELETE FROM pembayaran WHERE id_pembayaran=:id');
        $this->db->bind('id',$id);
        return $this->db->rowCount();
    }
}
?>