<?php
session_start();
require_once 'app/models/cart_model.php';
class Cart extends Controller{
    private $data = [];
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $product = new Cart_model();
        if (isset($_GET['remove'])) {
            $this->data['delete'] = $product->cartDelete($_GET['remove']);
        }
        $this->data['cart'] = $product->cartAll();
        // $this->data['categories'] = $product->categoryAll();
        // $this->data['products'] = $product->productAll();
        $this->view->render("header_view", $this->data);
        $this->view->render("cart_view", $this->data);
        $this->view->render("footer_view", $this->data);
    }
}