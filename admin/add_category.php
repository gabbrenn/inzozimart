<?php
include 'include/nav.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);

    // Check if category already exists
    $stmt = $pdo->prepare("SELECT category_id FROM categories WHERE category_name = :name LIMIT 1");
    $stmt->execute(['name' => $name]);
    $existingCategory = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingCategory) {
        echo "<script>alert('Category already exists!');</script>";
    } else {
        // Insert new category
        $stmt = $pdo->prepare("INSERT INTO categories (category_name) VALUES (:name)");
        if ($stmt->execute(['name' => $name])) {
            echo "<script>alert('Category added successfully!'); window.location.href='categories.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to add category.');</script>";
        }
    }
}
?>
<!-- Main Content -->
<main class="flex-1 p-6">
<a href="categories.php">Back</a>
<form method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
<div class="mb-4">
    <label class="block font-medium mb-1">Category Name</label>
    <input type="text" name="name" class="w-full p-2 border rounded" required>
</div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add Category</button>
</form>
</main>
<?php include 'include/footer.php';?>