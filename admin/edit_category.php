<?php
include 'include/nav.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM categories WHERE category_id = :id");
$stmt->execute(['id' => $id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $stmt = $pdo->prepare("UPDATE categories SET category_name = :name WHERE category_id = :id");
    $stmt->execute(['name' => $name, 'id' => $id]);
    header("Location: categories.php");
    exit();
}
?>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($category['category_name']) ?>" required>
    <button type="submit">Update Category</button>
</form>
<?php include 'include/footer.php';?>