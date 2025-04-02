<?php
require_once('app/models/auth_model.php');
class Login extends Controller{
    private $data = [];
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if(isset($_POST['signin'])){
            $user = new Auth_model();
           $this->data['resp']= $user->login(["email" => $_POST['email'], "password" => $_POST['password']]);
        }
        $this->view->render("login_view", $this->data);
    }
}