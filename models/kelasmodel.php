<?php 
class kelasmodel extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getallkelas()
    {
        $this->db->query("SELECT * FROM kelas");
        return $this->db->resultSet();
    }

    public function idkelas($id)
    {
        $this->db->query("SELECT * FROM kelas WHERE id_kelas=:id");
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function hapuskelas($id)
    {
        $this->db->query("DELETE FROM kelas WHERE id_kelas=:id");
        $this->db->bind('id',$id);
        return $this->db->rowCount();
    }

    public function editkelas($data){
        $this->db->query("UPDATE kelas SET nama=:kelas,kompetensi_keahlian=:jurusan WHERE id_kelas=:id");
        $this->db->bind('jurusan',$data['kompetensi_keahlian']);
        $this->db->bind('kelas',$data['nama']);
        $this->db->bind('id',$data['id']);
        return $this->db->rowCount();

    }
}

?>