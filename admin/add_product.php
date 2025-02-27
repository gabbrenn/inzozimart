<?php
include 'include/nav.php'; // Include your database connection

$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Check if an image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . $image_name;

        // Check if the image already exists in the database
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE image = ?");
        $stmt->execute([$image_path]);
        $image_exists = $stmt->fetchColumn();

        if ($image_exists > 0) {
            $message = "Error: This image has already been uploaded.";
        } else {
            // Create the uploads directory if it doesn't exist
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }

            // Move the uploaded file to the destination
            move_uploaded_file($image_tmp, $image_path);

            // Insert into the database
            $stmt = $pdo->prepare("INSERT INTO products (product_name, category, price, stock, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$product_name, $category, $price, $stock, $image_path]);

            $message = "Product added successfully!";
        }
    } else {
        $message = "Error: Image upload failed.";
    }

    echo "<script>alert('$message'); window.location.href='add_product.php';</script>";
}
?>


        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Add New Product</h1>

            <?php if ($message): ?>
                <p class="mb-4 text-green-600"><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>

            <form action="add_product.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md max-w-lg">
                <div class="mb-4">
                    <label class="block font-medium mb-1">Product Name</label>
                    <input type="text" name="product_name" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Category</label>
                    <input type="text" name="category" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Price</label>
                    <input type="number" name="price" step="0.01" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Stock</label>
                    <input type="number" name="stock" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Product Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full p-2 border rounded" required>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add Product</button>
            </form>
        </main>

<?php include"include/footer.php";?>