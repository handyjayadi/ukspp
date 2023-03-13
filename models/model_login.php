<?php 
class model_login extends Database{
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginpengguna($data)
    {
        $this->db->query("SELECT * FROM pengguna WHERE username=:username");
        $this->db->bind("username",$data('username'));
        return $this->db->single();
    }


}


?>