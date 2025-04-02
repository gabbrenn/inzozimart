<?php
session_start();
require_once('app/models/category_model.php');
class Create_category extends Controller{
    private $data = [];
    public function __construct(){
        if (!isset($_SESSION['admin'])) {
            header("Location:login");
            exit;
        }
       parent::__construct();
    }

    public function index(){
        if(isset($_POST['submit'])){
            $category = new Category_model();
           $this->data['resp']= $category->categoryAdd(["category_name"=>$_POST['name']]);
        }
        $this->data['page']='category';
        $this->view->render("header_view",$this->data);
        $this->view->render("create_category_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>