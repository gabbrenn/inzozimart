
<!-- Delete Category (delete_category.php) -->
<?php
try {
    $id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM categories WHERE category_id = :id");
$stmt->execute(['id' => $id]);
header("Location: categories.php");
exit();
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Connection failed: " . $e->getMessage() . "</p>";
}

?>