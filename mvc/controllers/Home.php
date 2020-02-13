<?php 

class Home extends COntroller {
    public function __construct(){
        // echo 'class home';
    }
    public function SayHi(){
        echo 'home- sayHi';
    }
    public function Goodbye($a, $b){
        echo "home- sayHi $a $b";
    }
    public function SinhVien(){
        // Model
        $sv = $this->model('Students');
        $s = $sv->DanhSachSV();
        
        // VIew
        $this->view("xanh", ["hoten"=>$s]);
    }

    public function Tong($a, $b){
        // Home/Tong/1/2 
        $sv = $this->model("Students");
        $kq = $sv->TinhTong($a,$b);
        $this->view("do", ["kq"=>$kq]);


    }
}