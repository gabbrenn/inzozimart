<!-- Delete Product (delete_product.php) -->
<?php
include 'include/db.php'; // Ensure your database connection is included

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the product image path before deletion
        $stmt = $pdo->prepare("SELECT image FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product && !empty($product['image'])) {
            $imagePath = $product['image'];

            // Check if the file exists before deleting it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the product from the database
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);

        header("Location: products.php");
        exit();
    } else {
        echo "<p class='text-red-500'>Error: Product ID is missing.</p>";
    }
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Connection failed: " . $e->getMessage() . "</p>";
}
?>
