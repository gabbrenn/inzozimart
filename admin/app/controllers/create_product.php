<?php
session_start();
require_once('app/models/product_model.php');
class Create_product extends Controller{
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
            $product_name = $_POST['product_name'];
            $category = $_POST['category']; // Category ID from the dropdown
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $image_name = $_FILES['image']['name'];
            $image_path = "uploads/" . $image_name;
            $this->data['product']=$product->productAdd([
                "product_name"=>$product_name,
                "category_id"=>$category,
                "price"=>$price,
                "stock"=>$stock,
            ],$_FILES['image']);

            
        }
        $this->data['page']='product';
        $this->data['categories'] = $product->categoryAll();
        $this->view->render("header_view",$this->data);
        $this->view->render("create_product_view",$this->data);
        $this->view->render("footer_view",$this->data);
    }
}
?>