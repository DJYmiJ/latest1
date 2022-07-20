<?php

class Controller {
    
    //To load Model
    
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        
        // Instantiate the model and pass to controller mamber variable
        return new $model();
    }
    
    // To load View
    
    public function view($view, $data = []) {
        if(file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('Corresponding view does not exist.');
        }
        
    }
}

?>