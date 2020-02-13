<?php 
// de viet ham cho controller goi model va view vo xai

class Controller {

    public function model($m){
        require_once "./mvc/models/".$m.".php";
        return new $m;
    }

    public function view($v, $data=[]){
        require_once "./mvc/views/".$v.".php";
    }


}