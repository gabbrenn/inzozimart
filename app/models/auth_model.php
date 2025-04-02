<?php
class Auth_model extends Model {
    private $tables = ['users']; // Define the users table

    public function __construct() {
        parent::__construct();
    }

    // Save user data correctly by passing the table name
    public function register($data) {
        if (parent::getEmail($this->tables[0], $data['email'])) {
            return ["status" => "FAIL", "message" => "Email exists"];
        } elseif (parent::save($this->tables[0], $data)) {
            return ["status" => "OK", "message" => "Account Created Successfully"];
        }
    }
    
    public function login($data) {
        // Get user by email
        $user = parent::getEmail($this->tables[0], $data['email']);
        
        if (!$user) {
            return ["status" => "FAIL", "message" => "Invalid email or password"];
        }
        
        // Verify password (assuming passwords are hashed using password_hash())
        if (!password_verify($data['password'], $user['password'])) {
            return ["status" => "FAIL", "message" => "Invalid email or password"];
        }

        // Store user session
        session_start();
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['email']= $user['email'];
        $_SESSION['user']['name']= $user['full_name']; // Assuming there's a name field

        return ["status" => "OK", "message" => "Login successful"];
    }
}
?>
