<?php
/**
 * Class which establishes a connection to the database
 */
require_once 'src/config.php';

class Model {
    public $db;

    public function __construct() {
        try {
            $this->db = new PDO(
                DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER,
                DB_PWD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function save($table, $data) {
        try {
            $qb = "INSERT INTO ".$table."(";
            $num = count($data);
            $i = 0;
            $qm = "";
            $values = [];

            foreach ($data as $column => $value) {
                $qb .= $i > 0 ? "," . $column : $column;
                $qm .= $i > 0 ? ",?" : "?";
                array_push($values, $value);
                ++$i;
            }

            $qb .= ") VALUES (" . $qm . ")";
            $stm = $this->db->prepare($qb);
            $stm->execute($values);

            return ["status" => "OK", "message" => "Data inserted successfully", "id" => $this->db->lastInsertId()];
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    /**
     * Fetch all records from a table
     */
    public function getAll($table) {
        try {
            $stmt = $this->db->query("SELECT * FROM $table");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    /**
     * Fetch a single record by ID
     */
    public function getOne($table, $column, $value) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE $column = ?");
            $stmt->execute([$value]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    /**
     * Fetch a single record by Email
     */
    public function getEmail($table, $email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    /**
     * Update a record by ID
     */
    public function update($table, $location, $id, $data) {
        try {
            $columns = "";
            $values = [];
            foreach ($data as $column => $value) {
                $columns .= "$column = ?, ";
                $values[] = $value;
            }
            $columns = rtrim($columns, ", "); // Remove the trailing comma
            $values[] = $id; // Add the ID for the WHERE clause

            $query = "UPDATE $table SET $columns WHERE $location = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute($values);

            return ["status" => "OK", "message" => "Record updated successfully"];
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }

    /**
     * Delete a record by ID
     */
    public function delete($table, $column, $value) {
        try {
            $stmt = $this->db->prepare("DELETE FROM $table WHERE $column = ?");
            $stmt->execute([$value]);

            return ["status" => "OK", "message" => "Record deleted successfully"];
        } catch (PDOException $e) {
            return ["status" => "FAIL", "message" => "Something went wrong", "error" => $e->getMessage()];
        }
    }
}
?>
