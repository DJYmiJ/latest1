<?php

class Core {
    // Url format... --> /controller/method/params
    
    protected $currentController = 'Pages';
    protected $currentMethod = 'Index';
    protected $params = [];
    
    public function __construct() {
        
        // print_r($this->getURL());
        
        $url = $this->getURL();
        
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            
            // If controller exists, then load it
            
            $this->currentController = ucwords($url[0]);
            
            // Unset the controller in the url
            
            unset($url[0]);
            
            // Call the controller
            
            require_once '../app/controllers/' . $this->currentController . '.php';
            
            // Instantiate controller
            
            $this->currentController = new $this->currentController;
            
            // Check method exists in controller.
            
            if(isset($url[1])) {
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    
                    unset($url[1]);
                }
            }
            
            // Get params list
            
            $this->params = $url ? array_values($url) : [];
            
            // Call method and pass parameter list
            
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            
        }
        
    }
    
    public function getURL() {
        
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            return $url;
        }
        
    }
    
}

?>