<?php
class Product_model extends Model {
    private $tables = ['categories','products','cart']; // Define the users table
    private $columns = ['category_id','product_name','image'];
    public function __construct() {
        parent::__construct();
    }

    // Save user data correctly by passing the table name
    public function categoryAll() {
            return parent::getAll($this->tables[0]);
    }

    public function cartAdd($data){
        return parent::save($this->tables[2],$data);
    }

    public function cartAll() {
        return parent::getAll($this->tables[2]);
}
    public function productAll() {
        try {
            $stmt = $this->db->query("SELECT products.*, categories.category_name FROM products 
                         JOIN categories ON products.category_id = categories.category_id 
                         ORDER BY products.id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    public function productOne($id) {
        return parent::getOne($this->tables[1],'id',$id);
    }
}
?>
