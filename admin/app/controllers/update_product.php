<?php
session_start();
require_once('app/models/product_model.php');
class Update_product extends Controller{
    private $data = [];
    public function __construct(){
        if (!isset($_SESSION['admin'])) {
            header("Location:login");
            exit;
        }
       parent::__construct();
    }

    public function index(){
        $product = new Product_model();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $category = $_POST['category_id']; // Category ID from the dropdown
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $file = !isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE 
            ? null:$_FILES['image'];
            $this->data['update']=$product->productUpdate([
                "product_name"=>$product_name,
                "category_id"=>$category,
                "price"=>$price,
                "stock"=>$stock,
            ],$file,$id);
           
        }
        if(isset($_GET['id'])){
            $this->data['product']= $product->productOne($_GET['id']);
            $this->data['categories']= $product->categoryAll();
         }
        $this->data['page']='product';
        $this->view->render("header_view",$this->data);
        $this->view->render("update_product_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>