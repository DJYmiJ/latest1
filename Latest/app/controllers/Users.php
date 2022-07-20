<?php

class Users extends Controller {
    public function __construct() {
       // echo "This is the Users Controller";
        $this->userModel = $this->model('M_Users');
    }
    
    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            // Validate the data first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Input data
            $data = [
                'profile_image' => $_FILES['profile_image'],
                'profile_image_name' => time() . '_' . $_FILES['profile_image']['name'],
                
                'user_dob' => $_POST['user_dob'],
                
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                
                'user_dob_err' => '',
                
                'profile_image_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            
            // Valdate each input
            // Validate profile image_type_to_extension
            if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/img/profileImgs/')) {
                // Done
            } else {
                $data['profile_image_err'] = 'Profile Picture upload was unsuccessful';
            }
            
            
            // Age Validation
            if(empty($data['user_dob'])) {
                $data['user_dob_err'] = 'Please enter your Date of Birth.';
            } else {
                $data['user_dob'] < (date('Y') - date('Y', strtotime($dob)));
            }
            
            
            
            
            
            // Validate name
            if(empty($data['username'])) {
                $data['username_err'] = 'Please enter a Username.';
            }
            
            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter an Email Address.';
            } else {
                // Check amail already exists
                if($this->userModel->findUserByEmail($data['email']) == true ) {
                    $data['email_err'] = 'This Email Address is already registered.';
                }
            }
            
            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a Password.';
            } elseif (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm the Password.';
            } else { 
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match!';
                }
            }
            
            // If Validation is completed with no errors - register user
            
            if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'] && empty($data['profile_image_err']))) {
                
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                
                // Register user
                if($this->userModel->register($data)) {
                    // Crete a flash message
                    flash('reg_flash', 'You have successfully Registered! :)');
                    
                    redirect('Users/regProfile');
                    
                } else {
                    
                    die('Something went wrong... Please try again.');
                    
                }
            }
            
            else {
                // Load view
                $this->view('users/v_register', $data);
            }
            
            
        } else {
            // Initial form
            $data = [
                'profile_image' => '',
                'profile_image_name' => '',
                'username' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                
                'user_dob_err' => '',
                
                'profile_image_err' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            
            // Load view
            $this->view('users/v_register', $data);
            
        }
    }
    
    public function regProfile() {
        $userId = $_SESSION['user_id'];
        //print_r($_POST['profile_type']);
        //print_r($_POST['looking_to_meet']);
        print_r($_SESSION['user_id']);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            // Validate the data first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            
            // Input data
            $data = [
                'profile_type' => $_POST['profile_type'],
                'looking_to_meet' => implode( ';' , $_POST['looking_to_meet']),
                
                
                'profile_type_err' => '',
                'looking_to_meet_err' => ''
                
            ];
            
            print_r($data);
            
            
            // Valdate each input
            // Validate name
            if(empty($data['profile_type'])) {
                $data['profile_type_err'] = 'Please enter a Profile Type.';
            }
            
            // Validate email
            if(empty($data['looking_to_meet'])) {
                $data['looking_to_meet_err'] = 'Please enter a range of people you would like to meet.';
            } 
            
            
            
            // If Validation is completed with no errors - register user
            
            if(empty($data['profile_type_err']) && empty($data['looking_to_meet_err']) ) {
                
                
                
                // Register user
                if($this->userModel->regProfile($data, $userId)) {
                    // Crete a flash message
                    flash('reg_flash', 'You have successfully Registered! :)');
                    
                    redirect('Users/regProfile2');
                    
                } else {
                    
                    die('Something went wrong... Please try again.');
                    
                }
            }
            
            else {
                // Load view
                $this->view('users/v_regProfile', $data);
            }
            
            
        } else {
            // Initial form
            $data = [
                'profile_type' => '',
                'looking_to_meet' => '',
                
                
                'profile_type_err' => '',
                'looking_to_meet_err' => ''
                
            ];
            
            // Load view
            $this->view('users/v_regProfile', $data);
            
        }
    }
    
    public function regProfile2() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            // Validate the data first
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Input data
            $data = [
                'display_name' => $_POST['profileType'],
                'profile_town' => $_POST['lookingToMeet'],
                
                
                'display_name_err' => '',
                'profile_town_err' => ''
                
            ];
            
            // Valdate each input
            // Validate name
            if(empty($data['display_name'])) {
                $data['display_name_err'] = 'Please enter a Profile Type.';
            }
            
            // Validate email
            if(empty($data['profile_town'])) {
                $data['profile_town_err'] = 'Please enter a range of people you would like to meet.';
            } 
            
            
            
            // If Validation is completed with no errors - register user
            
            if(empty($data['display_name_err']) && empty($data['profile_town_err']) ) {
                
                
                
                // Register user
                if($this->userModel->register($data)) {
                    // Crete a flash message
                    flash('reg_flash', 'You have successfully Registered! :)');
                    
                    redirect('Users/login');
                    
                } else {
                    
                    die('Something went wrong... Please try again.');
                    
                }
            }
            
            else {
                // Load view
                $this->view('users/v_regProfile2', $data);
            }
            
            
        } else {
            // Initial form
            $data = [
                'display_name' => '',
                'profile_town' => '',
                
                
                'display_name_err' => '',
                'profile_town_err' => ''
                
            ];
            
            // Load view
            $this->view('users/v_regProfile2', $data);
            
        }
    }
    
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Form is submitted
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                
                'email_err' => '',
                'password_err' => ''
            ];
            
            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter an Email Address.';
            } else {
                if($this->userModel->findUserByEmail($data['email'])) {
                    // User is found
                    
                } else {
                    // User not found
                    $data['email_err'] = 'User not found...';
                }
            }
            
            // Validate Password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter a Password.';
            }
            
            // If no error found
            if(empty($data['email_err']) && empty($data['password_err'])) {
                // Log user
                $loggedUser = $this->userModel->login($data['email'], $data['password']);
                
                if($loggedUser) {
                    // User is authenticated
                    // Create user sessions
                    
                    $this->createUserSession($loggedUser);
                    
                    
                } else {
                    $data['password_err'] = 'Password Incorrect';
                    
                    // Load View with errors
                    $this->view('users/v_login', $data);
                }
            } else {
                // Load View
                $this->view('users/v_login', $data);
            } }
            // Initial form
            else{
            $data = [
                'email' => '',
                'password' => '',
                
                'email_err' => '',
                'password_err' => ''
            ];
            
            // Load View
            $this->view('users/v_login', $data);
        }
    }
    
    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_profile_image'] = $user->profile_image;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['user_profile_type'] = $user->profile_type;
        
        redirect('Posts/index');
    }
    
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_profile_image']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_username']);
        session_destroy();
        
        redirect('Users/login');
    }
    
    public function isLoggedIn() {
        if(isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}

?>