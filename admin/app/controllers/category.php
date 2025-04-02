<?php
session_start();
require_once('app/models/category_model.php');
class Category extends Controller{
    private $data = null;
    public function __construct(){
        if (!isset($_SESSION['admin'])) {
            header("Location:login");
            exit;
        }
       parent::__construct();
    }

    public function index(){
        $category = new Category_model();
        if (isset($_GET['delete'])) {
            $this->data['delete'] = $category->categoryDelete($_GET['delete']);
        }
        $this->data['page']='category';
        $this->data['categories']= $category->categoryAll();
        $this->view->render("header_view",$this->data);
        $this->view->render("category_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>