<?php

class M_Posts {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Posts
    
    public function getPosts() {
        $this->db->query('SELECT * FROM latest_db.v_posts');
        
        $results = $this->db->resultSet();
        
        return $results;
    }
    
    public function getPostById($postId) {
        $this->db->query('SELECT * FROM latest_db.v_posts WHERE post_id = :id');
        $this->db->bind(':id', $postId);
        
        $row = $this->db->single();
        
        return $row;
    }
    
    public function create($data) {
        $this->db->query('INSERT INTO latest_db.Posts(user_id, image, title, body) VALUES(:user_id, :image, :title, :body) ');
        $this->db->bind(':image', $data['image_name']);
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        
        // Execute
        
        if($this->db->execute()) {
            return true; 
        } else {
            return false;
        }
        
    }
    
    public function edit($data) {
        $this->db->query('UPDATE latest_db.Posts set image = :image, title = :title, body = :body WHERE id = :id ');
        $this->db->bind(':image', $data['image_name']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':id', $data['post_id']);
        
        // Execute
        
        if($this->db->execute()) {
            return true; 
        } else {
            return false;
        }
        
    }
    
    public function delete($data) {
        $this->db->query('DELETE FROM latest_db.posts WHERE id = :id ');
        $this->db->bind(':id', $data['post_id']);
        
        // Execute
        
        if($this->db->execute()) {
            return true; 
        } else {
            return false;
        }
        
    }
    
    // Post interactions
    
    // Like
    
    /* public function checkLikedOrNot($postId, $userId) {
        $this->db->query('SELECT * FROM latest_db.v_posts WHERE post_id = :post_id AND user_id = :user_id AND likes = 1');
        $this->db->bind('post_id', $postId);
        $this->db->bind('user_id', $userId);
        
        $row = $this->db->single();
        
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } */
    
    public function incLikes($postId) {
        $this->db->query('UPDATE latest_db.Posts SET likes = likes + 1 WHERE id = :post_id ');
        $this->db->bind(':post_id', $postId);
       
        // Execute
        
        if($this->db->execute()) {
            return $this->getLikes($postId); 
        } else {
            return false;
        }
    }
    
    public function decLikes($postId) {
        $this->db->query('UPDATE latest_db.Posts SET likes = likes - 1 WHERE id = :post_id ');
        $this->db->bind(':post_id', $postId);
       
        // Execute
        
        if($this->db->execute()) {
            return $this->getLikes($postId); 
        } else {
            return false;
        }
    }
    
    public function getLikes($postId) {
        $this->db->query('SELECT likes FROM latest_db.v_posts WHERE post_id = :id');
        $this->db->bind(':id', $postId);
        
        $row = $this->db->single();
        
        return $row;
    }
    
    // Dislike
    
    /* public function checkDislikedOrNot($postId, $userId) {
        $this->db->query('SELECT * FROM latest_db.v_posts WHERE post_id = :post_id AND user_id = :user_id AND dislikes = 1');
        $this->db->bind('post_id', $postId);
        $this->db->bind('user_id', $userId);
        
        $row = $this->db->single();
        
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } */
    
    public function incDislikes($postId) {
        $this->db->query('UPDATE latest_db.Posts SET dislikes = dislikes + 1 WHERE id = :post_id ');
        $this->db->bind(':post_id', $postId);
       
        // Execute
        
        if($this->db->execute()) {
            return $this->getDislikes($postId); 
        } else {
            return false;
        }
    }
    
    public function decDislikes($postId) {
        $this->db->query('UPDATE latest_db.Posts SET dislikes = dislikes - 1 WHERE id = :post_id ');
        $this->db->bind(':post_id', $postId);
       
        // Execute
        
        if($this->db->execute()) {
            return $this->getDislikes($postId); 
        } else {
            return false;
        }
    }
    
    public function getDislikes($postId) {
        $this->db->query('SELECT dislikes FROM latest_db.v_posts WHERE post_id = :id');
        $this->db->bind(':id', $postId);
        
        $row = $this->db->single();
        
        return $row;
    }
    
    // Post likes/dislikes interactions
    
    public function addPostInteraction($postId, $userId, $interaction) {
        $this->db->query('INSERT INTO latest_db.PostInteractions(post_id, user_id, interaction) VALUES (":post_id, :user_id, :interaction")');
        $this->db->bind(":post_id", $postId);
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":interaction", $interaction);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function setPostInteraction($postId, $userId, $interaction) {
        
        $this->db->query('UPDATE latest_db.PostInteractions SET interaction = :interaction WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(":post_id", $postId);
        $this->db->bind(":user_id", $userId);
        $this->db->bind(":interaction", $interaction);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getPostInteraction($postId, $userId) {
        
        console.log("hello1");
        
        $this->db->query('SELECT * FROM latest_db.PostInteractions WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(":post_id", $postId);
        $this->db->bind(":user_id", $userId);
                
        $row = $this->db->single();
        
        return $row;
    }
    
    public function doesPostInteractionExist($postId, $userId) {
        $this->db->query('SELECT * FROM latest_db.PostInteractions WHERE post_id = :post_id AND user_id = :user_id');
        $this->db->bind(":post_id", $postId);
        $this->db->bind(":user_id", $userId);
                
        $results = $this->db->single();
        
        $results = $this->db->rowCount();
        
        if($results > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    
}
    


?>