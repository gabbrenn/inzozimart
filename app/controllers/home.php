<?php
class Home extends Controller{
    private $data = null;
    public function __construct(){
      
       parent::__construct();
    }

    public function index(){
       // $name = "Alice";
       
        $data['students'] = ["name" => "Alice", "regNo" =>"22RP00666"];
        $data['name'] = "Jean Luc";
        $this->view->render("header_view",$data);
        $this->view->render("home_view",$data);
        $this->view->render("footer_view",$data);
       /* foreach($data as $key => $value){
            global $$key;
            $$key = $value; 
        }
        require_once 'app/views/header_view.php';
        require_once 'app/views/home_view.php';
        require_once 'app/views/footer_view.php';*/
    }
}
?>