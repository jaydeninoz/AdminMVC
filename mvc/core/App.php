<?php 
class App{
    
    protected $controller = 'Home';
    protected $method = "SayHi";
    protected $params = [];
    
    public function __construct(){
        $url = $this->urlProcess();
        // controller/method/params   
        
        // Controller
        if (file_exists('./mvc/controllers/'.$url[0].'.php')) {
            $this->controller = $url[0];
            unset($url[0]); # neu ton tai thi huy di de lay params
        }
        
        require_once "./mvc/controllers/".$this->controller.".php";
        
        $this->controller = new $this->controller;
        // $home = new home;

        // Method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]); # neu ton tai thi huy di de lay params
            }
        }

        // Params
        $this->params = $url ? array_values($url) :  [];

        // Call the function 
        call_user_func_array([$this->controller, $this->method], $this->params);

        

        // models

        // views
    }

    public function urlProcess(){
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $arr = explode("/", filter_var(trim($url, "/"))); 
            return $arr;
        }
    }
}

// echo 'jay';