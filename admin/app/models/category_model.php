<?php
class Category_model extends Model {
    private $tables = ['categories']; // Define the users table
    private $columns = ['category_id','category_name'];
    public function __construct() {
        parent::__construct();
    }

    // Save user data correctly by passing the table name
    public function categoryAll() {
            return parent::getAll($this->tables[0]);
    }
    public function categoryOne($id) {
        return parent::getOne($this->tables[0], $this->columns[0], $id);
    }
    public function categoryAdd($data){
        if (parent::getOne($this->tables[0], $this->columns[1], $data['category_name'])) {
            return ["status" => "FAIL", "message" => "Category exists"];
        } elseif (parent::save($this->tables[0], $data)) {
            return ["status" => "OK", "message" => "Category Added Successfully"];
        }
    }

    public function categoryUpdate($id, $data){
        if(parent::update($this->tables[0], $this->columns[0], $id, $data)){
            header("Location:category");
        }
    }

    public function categoryDelete($id){        
        // Check if the category exists before deleting it
        if (!parent::getOne($this->tables[0],$this->columns[0],$id)) {
            return ["status" => "FAIL", "message" => "Category not exists"];
        }
        if (parent::delete($this->tables[0],$this->columns[0],$id)) {
            return ["status" => "OK", "message" => "Category Deleted Successfully"];
        }
    }
}
?>
