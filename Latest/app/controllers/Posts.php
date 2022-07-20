<?php

class Posts extends Controller {
    public function __construct() {
        $this->postsModel = $this->model('M_Posts');
    }
    
    // Main Post Functions
    
    // Index
    public function index() {
        
        $posts = $this->postsModel->getPosts();
        
        $data = [
            'posts' => $posts
        ];
        
        $this->view('posts/v_index', $data);
    }
    
    // Create
    public function create() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            // Validate the data first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Input data
            $data = [
                'image' => $_FILES['image'],
                'image_name' => time() . '_' . $_FILES['image']['name'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                    
                'image_err' => '',
                'title_err' => '',
                'body_err' => ''
            ];
            
            // Validate
            if($data['image']['size'] > 0) {
                if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/img/postImgs/')) {
                    // done
                } else {
                    $data['image_err'] = 'Uploading image failed.';
                    die('Uploading image failed.');
                }
            } else {
                $data['image_name'] = '';
            }
            
            if(empty($data['title'])) {
                $data['title_err'] = 'Please enter a Title.';
            }
            
            if(empty($data['body'])) {
                $data['body_err'] = 'Please enter some content.';
            }
            
            if(empty($data['image_err']) && empty($data['title_err']) && empty($data['body_err'])) {
                if($this->postsModel->create($data)) {
                    flash('post_msg', 'Post has been Submitted');
                    redirect('Posts/index');
                } else {
                    die('Something went wrong...');
                }
            } else {
                // Load view with errors
                $this->view('posts/v_create', $data);
            }
                    
            
        } else {
            $data = [
                'image' => '',
                'image_name' => '',
                'title' => '',
                'body' => '',
                
                'image_err' => '',
                'title_err' => '',
                'body_err' => ''
            ];
            
            $this->view('posts/v_create', $data);
        }
    }
    
    // Edit/Update
    public function edit($postId) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            // Validate the data first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Input data
            $data = [
                'image' => $_FILES['image'],
                'image_name' => time() . '_' . $_FILES['image']['name'],
                'post_id' => $postId,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                
                'image_err' => '',
                'title_err' => '',
                'body_err' => ''
            ];
            
            // Validate
            
            $post = $this->postsModel->getPostById($postId);
            $oldImage = PUBROOT . '/img/postImgs/' . $post->image;
            
            // Post updated
            // Image not changed
            if($_POST['removeIntend'] == 'removed') {
                deleteImage($oldImage);
                
                $data['image_name'] = '';
            } else {
            
            if($_FILES['image']['name'] == '') {
                $data['image_name'] = $post->image;
            } else { // image changed
                updateImage($oldImage, $data['image']['tmp_name'], $data['image_name'], '/img/postImgs/');
            }
            }
            
            if($data[''])
            
            if(empty($data['title'])) {
                $data['title_err'] = 'Please update the Title.';
            }
            
            if(empty($data['body'])) {
                $data['body_err'] = 'Please update the content.';
            }
            
            if(empty($data['image_err']) && empty($data['title_err']) && empty($data['body_err'])) {
                if($this->postsModel->edit($data)) {
                    flash('post_msg', 'Post has been Updated');
                    redirect('Posts/index');
                } else {
                    die('Something went wrong...');
                }
            } else {
                // Load view with errors
                $this->view('posts/v_edit', $data);
            }
                    
            
        } else {
            $post = $this->postsModel->getpostById($postId);
            
            // Check the owner
            if($post->user_id != $_SESSION['user_id']) {
                redirect('Posts/v_edit');
            }
            
            $data = [
                'image' => '',
                'image_name' => $post->image,
                'post_id' => $postId,
                'title' => $post->title,
                'body' => $post->body,
                
                'image_err' => '',
                'title_err' => '',
                'body_err' => ''
            ];
            
            $this->view('posts/v_edit', $data);
        }
    }
    
    // Backup delete
    /*public function delete($postId) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
           $post = $this->postsModel->getpostById($postId);
            
            // Check the owner
            if($post->user_id != $_SESSION['user_id']) {
                redirect('Posts/v_index');
            } 
            
            if($this->postsModel->delete($postId)) {
                flash('post_msg', 'Post has been Deleted.');
                redirect('Posts/v_index');
            } else {
                die('Something went wrong!');
            } 
        } else {
          redirect('Posts/v_delete');
        }
    }
        */
    
    // Delete
    public function delete($postId) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            // Validate the data first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Input data
            $data = [
                'post_id' => $postId,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                                
                'title_err' => '',
                'body_err' => ''
            ];
            
            // Validate
            if(empty($data['title'])) {
                $data['title_err'] = 'Please update the Title.';
            }
            
            if(empty($data['body'])) {
                $data['body_err'] = 'Please update the content.';
            }
            
            if(empty($data['title_err']) && empty($data['body_err'])) {
                
                $post = $this->postsModel->getPostById($postId);
                $oldImage = PUBROOT . '/img/postImgs/' . $post->image;
                deleteImage($oldImage);
                
                if($this->postsModel->delete($data)) {
                    flash('post_msg', 'Post has been Deleted');
                    redirect('Posts/index');
                } else {
                    die('Something went wrong...');
                }
            } else {
                // Load view with errors
                $this->view('posts/v_delete', $data);
            }
                    
            
        } else {
            $post = $this->postsModel->getpostById($postId);
            
            // Check the owner
            if($post->user_id != $_SESSION['user_id']) {
                redirect('Posts/v_delete');
            }
            
            $data = [
                'post_id' => $postId,
                'title' => $post->title,
                'body' => $post->body,
                
                'title_err' => '',
                'body_err' => ''
            ];
            
            $this->view('posts/v_delete', $data);
        }
    }
    
    // Post Interactions
    // Likes
    public function addLike($postId) {
        $userId = $_SESSION['user_id'];
        
        if($this->postsModel->checkLikedOrNot($postId, $userId)) {
            // If already liked
            $likes = $this->postsModel->decLikes($postId);
            
            echo $likes->likes;
            
        } else {
            // If not liked
            // if user disliked
            //if($this->postModel->checkDislikedOrNot($postId, $userId)) {
            //    $this->postsModel->decLikes($postId);
            //}
            
            $likes = $this->postsModel->incLikes($postId);
            
            echo $likes->likes;
            
        }
    }
    
    public function addDislike($postId) {
        $userId = $_SESSION['user_id'];
        
        if($this->postsModel->checkDislikedOrNot($postId, $userId)) {
            // If already liked
            $likes = $this->postsModel->decDislikes($postId);
            
            echo $dislikes->dislikes;
            
        } else {
            // If not liked
            // if user disliked
            //if($this->postModel->checkDislikedOrNot($postId, $userId)) {
            //    $this->postsModel->decLikes($postId);
            //}
            
            $dislikes = $this->postsModel->incDislikes($postId);
            
            echo $dislikes->dislikes;
            
        }
    }
    
    public function incPostsLikes($postId) {
        $likes = $this->postsModel->incLikes($postId); 
        
        $userId = $_SESSION['user_id'];
        
        if($this->postsModel->doesPostInteractionExist($postId, $userId)) {
            $res = $this->postsModel->setPostInteraction($postId, $userId, 'liked');
        } else {
            $res = $this->postsModel->addPostInteraction($postId, $userId, 'liked');
        }
        
        if($likes != false && $res != false) {
            echo $likes->likes;
        }
    }
    
    public function decPostsLikes($postId) {
        $likes = $this->postsModel->decLikes($postId); 
        
        $userId = $_SESSION['user_id'];
        
        if($this->postsModel->doesPostInteractionExist($postId, $userId)) {
            $res = $this->postsModel->setPostInteraction($postId, $userId, 'like removed');
        } else {
            $res = $this->postsModel->addPostInteraction($postId, $userId, 'like removed');
        }
        
        if($likes != false && $res != false) {
            echo $likes->likes;
        }
    }
    
    public function incPostsDislikes($postId) {
        $dislikes = $this->postsModel->incDislikes($postId); 
        
        $userId = $_SESSION['user_id'];
        
        if($this->postsModel->doesPostInteractionExist($postId, $userId)) {
            $res = $this->postsModel->setPostInteraction($postId, $userId, 'disliked');
        } else {
            $res = $this->postsModel->addPostInteraction($postId, $userId, 'disliked');
        }
        
        if($dislikes != false && $res != false) {
            echo $dislikes->dislikes;
        }
    }
    
    public function decPostsDislikes($postId) {
        $dislikes = $this->postsModel->decDislikes($postId); 
        
        $userId = $_SESSION['user_id'];
        
        if($this->postsModel->doesPostInteractionExist($postId, $userId)) {
            $res = $this->postsModel->setPostInteraction($postId, $userId, 'dislike removed');
        } else {
            $res = $this->postsModel->addPostInteraction($postId, $userId, 'dislike removed');
        }
        
        if($dislikes != false && $res != false) {
            echo $dislikes->dislikes;
        }
    }
}
