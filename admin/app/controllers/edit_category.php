<?php
session_start();
require_once('app/models/category_model.php');
class Edit_category extends Controller{
    private $data = [];
    public function __construct(){
        if (!isset($_SESSION['admin'])) {
            header("Location:login");
            exit;
        }
       parent::__construct();
    }

    public function index(){
        $category = new Category_model();
        if(isset($_GET['id'])){
           $this->data['category']= $category->categoryOne($_GET['id']);
        }
        if(isset($_POST['submit'])){
            $category = new Category_model();
            $id = $_POST['id'];
            $this->data['resp']= $category->categoryUpdate($id, ["category_name"=>$_POST['name']]);
        }
        $this->data['page']='category';
        $this->view->render("header_view",$this->data);
        $this->view->render("edit_category_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>