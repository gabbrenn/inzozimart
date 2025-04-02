<?php
require_once('app/models/auth_model.php');
class Register extends Controller{
    private $data = [];
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if(isset($_POST['signup'])){
            $user = new Auth_model();
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
           $this->data['resp']= $user->register(["username"=>$_POST['username'],"email" => $_POST['email'], "password" => $hashedPassword]);
        }
        $this->view->render("register_view", $this->data);
    }
}