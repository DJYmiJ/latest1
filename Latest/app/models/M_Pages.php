<?php

class M_Pages {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getUsers() {
        $this->db->query('SELECT * FROM latest_db.users');
        
        return $this->db->resultSet();
    }
    
}

?>