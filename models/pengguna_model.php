<?php 

class pengguna_model extends Database{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPengguna()
    {
        $this->db->query("SELECT * FROM pengguna");
        return  $this->db->resultSet();
    }

    public function idpengguna($id){
        $this->db->query("SELECT * FROM pengguna WHERE id_pengguna=:id");
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahpengguna($post)
    {
        if ($post['password'] != $post['password2']) {
            return 0;
        }

        $password = password_hash($post["password"], PASSWORD_DEFAULT);
        $query = "INSERT INTO pengguna VALUES(null,:username,:password,:role)";
        $this->db->query($query);
        $this->db->bind('username',$post["username"]);
        $this->db->bind('password',$password);
        $this->db->bind('role',$post['role']);
        $result = $this->db->rowCount();
        return $result;
    }

    public function hapususer($data)
    {
        $this->db->query("CALL hapuspengguna(:id)");
        $this->db->bind('id',$data);
        return $this->db->rowCount();
    }

    public function updateuser($data)
    {
        $this->db->query("UPDATE pengguna SET username=:username WHERE id_pengguna = :id_pengguna");
        $this->db->bind('username',$data['username']);
        $this->db->bind('id_pengguna',$data['id_pengguna']);
        return $this->db->rowCount();
    }

    public function selectpenggunalogin($data)
   {

    $this->db->query('SELECT * FROM pengguna WHERE username=:username');
    $this->db->bind('username',$data['username']);
    return $this->db->single();
   }


}

?>