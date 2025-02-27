<?php
include 'include/nav.php';
$message = "";

// Fetch categories for the dropdown
$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch product details based on ID
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Product not found!");
    }
} else {
    die("Invalid request!");
}

// Update product details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image_path = $product['image']; // Keep existing image by default

    // Handle image update
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . $image_name;

        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        // Delete the old image if it exists
        if (!empty($product['image']) && file_exists($product['image'])) {
            unlink($product['image']);
        }

        move_uploaded_file($image_tmp, $image_path);
    }

    $stmt = $pdo->prepare("UPDATE products SET product_name=?, category_id=?, price=?, stock=?, image=? WHERE id=?");
    $stmt->execute([$product_name, $category_id, $price, $stock, $image_path, $product_id]);

    $message = "Product updated successfully!";
    echo "<script>alert('$message'); window.location.href='products.php';</script>";
}
?>

<!-- Main Content -->
<main class="flex-1 p-6">
    <h1 class="text-2xl font-bold mb-4">Update Product</h1>

    <?php if ($message): ?>
        <p class="mb-4 text-green-600"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="update_product.php?id=<?= $product_id ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md max-w-lg">
        <div class="mb-4">
            <label class="block font-medium mb-1">Product Name</label>
            <input type="text" name="product_name" class="w-full p-2 border rounded" value="<?= htmlspecialchars($product['product_name']) ?>" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Category</label>
            <select name="category_id" class="w-full p-2 border rounded" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>" <?= $product['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['category_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Price</label>
            <input type="number" name="price" step="0.01" class="w-full p-2 border rounded" value="<?= htmlspecialchars($product['price']) ?>" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Stock</label>
            <input type="number" name="stock" class="w-full p-2 border rounded" value="<?= htmlspecialchars($product['stock']) ?>" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Current Image</label>
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image" class="w-32 h-32 object-cover rounded border">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Change Image (Optional)</label>
            <input type="file" name="image" accept="image/*" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Update Product</button>
    </form>
</main>

<?php include 'include/footer.php'; ?>
