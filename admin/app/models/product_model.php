<?php
require_once('app/functions/uploadfile.php');
class Product_model extends Model {
    private $tables = ['categories','products']; // Define the users table
    private $columns = ['category_id','product_name','image'];
    public function __construct() {
        parent::__construct();
    }

    // Save user data correctly by passing the table name
    public function categoryAll() {
            return parent::getAll($this->tables[0]);
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


    public function productAdd($data,$file){
        if (parent::getOne($this->tables[1], $this->columns[1], $data['product_name'])) {
            return ["status" => "FAIL", "message" => "Product alredy exists"];
        }

        $uploader = new UploadFile(); // Initialize uploader class
        $uploadResult = $uploader->upload($file); // Call the upload function

        if ($uploadResult) { // Check if the upload was successful
            $data['image'] = $uploadResult; // Store the file path

            // Check if the image already exists in the database
            if (parent::getOne($this->tables[1], $this->columns[2], $data['image'])) {
                return ["status" => "FAIL", "message" => "Image already exists"];
            }

            // Save the product if the image is unique
            if (parent::save($this->tables[1], $data)) {
                return ["status" => "OK", "message" => "Product Added Successfully"];
            }
        } 
        else {
            return ["status" => "FAIL", "message" => $uploader->getErrorMessage()];
        }   
    }


    public function productUpdate($data, $file, $id) {
        $pro = parent::getOne($this->tables[1], 'id', $id);
        //Check if a new image is uploaded
        if ($file) {
            // Delete old image if it exists
            if (!empty($pro['image']) && file_exists($pro['image'])) {
                unlink($pro['image']);
            }
    
            // Upload new image
            $uploader = new UploadFile(); // The constructor already processes the upload
            $uploadResult = $uploader->upload($file);
    
            if ($uploadResult) {
                $data['image'] = $uploadResult;
            } else {
                return ["status" => "FAIL", "message" => "File upload failed."];
            }
        }
    
        // Check if product name already exists (excluding the current product)
        $existingProduct = parent::getOne($this->tables[1], $this->columns[1], $data['product_name']);
        if ($existingProduct && $existingProduct['id'] != $id) {
            return ["status" => "FAIL", "message" => "Product already exists"];
        }
    
        return parent::update($this->tables[1], 'id', $id, $data);
    }
    

    public function productDelete($id){
        $pro=parent::getOne($this->tables[1],'id',$id);
        // Check if the file exists before deleting it
        if (file_exists($pro['image'])) {
            unlink($pro['image']);
        }
        if (parent::delete($this->tables[1],'id',$id)) {
            return ["status" => "OK", "message" => "Product Deleted Successfully"];
        }
    }
}
?>
