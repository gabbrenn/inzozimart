<?php
session_start();
require_once('app/models/product_model.php');
class Product extends Controller{
    private $data = null;
    public function __construct(){
        if (!isset($_SESSION['admin'])) {
            header("Location:login");
            exit;
        }
       parent::__construct();
    }

    public function index(){
        $products = new Product_model();
        if (isset($_GET['delete'])) {
            $this->data['delete'] = $products->productDelete($_GET['delete']);
        }
        $this->data['page']='product';
        $this->data['products']= $products->productAll();
        $this->view->render("header_view",$this->data);
        $this->view->render("product_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>