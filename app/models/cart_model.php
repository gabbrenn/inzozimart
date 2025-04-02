<?php
class Cart_model extends Model {
    private $tables = ['categories','products','cart']; // Define the users table
    private $columns = ['category_id','product_name','image'];
    public function __construct() {
        parent::__construct();
    }

    public function cartAll() {
        try {
            $stmt = $this->db->query("SELECT cart.*, products.* FROM cart 
                         JOIN products ON cart.product_id = products.id 
                         ORDER BY cart.cart_id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    public function cartDelete($id){
        return parent::delete($this->tables[2],'cart_id',$id);
    }
}
?>
