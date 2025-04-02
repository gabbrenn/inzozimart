<?php
session_start();
require_once('app/models/product_model.php');
class Dashboard extends Controller{
    private $data = [];
    public function __construct(){
        if (!isset($_SESSION['admin'])) {
            header("Location:login");
            exit;
        }
       parent::__construct();
    }

    public function index(){
        $products = new Product_model();
        $this->data['products']= $products->productAll();
        $this->data['categories']= $products->categoryAll();
        $this->data['page']='dashboard';
        $this->view->render("header_view",$this->data);
        $this->view->render("dashboard_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>