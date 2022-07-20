<?php

class M_Users {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    
    // Register user
    public function register($data) {
        $this->db->query('INSERT INTO latest_db.Users(profile_image, username, email, password) VALUES (:profile_image, :username, :email, :password) ');
        $this->db->bind('profile_image', $data['profile_image_name']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // Register profile type
    public function regProfile($data, $userId) {
        print_r($data);
        $this->db->query('INSERT INTO latest_db.ProfileTypes(user_id, profile_type, looking_to_meet) VALUES (:user_id, :profile_type, :looking_to_meet) ');
        $this->db->bind(":user_id", $userId);
        $this->db->bind('profile_type', $data['profile_type']);
        $this->db->bind('looking_to_meet', $data['looking_to_meet']);
                
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }   
    
    // Find user by email
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM latest_db.Users WHERE email = :email');
        $this->db->bind('email', $email);
        
        $row = $this->db->single();
        
        if($this->db->rowCount() > 0) {
            return true;
        } else
            return false;
    }
    
    // Login user
    public function login($email, $password) {
        $this->db->query('SELECT * FROM latest_db.Users WHERE email = :email');
        $this->db->bind('email', $email);
        
        $row = $this->db->single();
        
        $hashedPassword = $row->password;
        if(password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }    
    
}

?>