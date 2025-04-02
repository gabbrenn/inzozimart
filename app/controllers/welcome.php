<?php
session_start();
require_once 'app/models/product_model.php';
class Welcome extends Controller{
    private $data = [];
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $product = new Product_model();
        if (isset($_GET['add'])) {
            $this->data['cart'] = $product->cartAdd(["product_id"=>$_GET['add']]);
        }
        $this->data['cart'] = $product->cartAll();
        $this->data['categories'] = $product->categoryAll();
        $this->data['products'] = $product->productAll();
        $this->view->render("header_view", $this->data);
        $this->view->render("intro_view", $this->data);
        $this->view->render("footer_view", $this->data);
    }
}