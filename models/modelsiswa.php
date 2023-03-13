<?php 
class modelsiswa extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getallsiswa()
    {
        $this->db->query("SELECT * FROM siswa");
        return $this->db->resultSet();
    }

    public function getIdSiswa($id)
    {
        $this->db->query('SELECT * FROM siswa where id_siswa=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function insertkelas($data)
    {
        $this->db->query("INSERT INTO kelas VALUES (NULL, :nama, :kompetensi)");
        $this->db->bind('nama',$data['namakelas']);
        $this->db->bind('kompetensi',$data['jurusan']);
        return $this->db->rowCount();
    }

}

?>