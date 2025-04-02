<!-- Main Content -->
<main class="flex-1 p-6">
<div class="mb-4">
    <a href="product" class="bg-fuchsia-500 text-white px-4 py-2 rounded-md hover:bg-fuchsia-600 transition-all">Back</a>
</div>
    <h1 class="text-2xl font-bold mb-4">Update Product</h1>

    <?php if (isset($update['message'])): ?>
        <div class=" max-w-lg flex items-center p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success! </span><?=$update['message']?>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md max-w-lg">
        <div class="mb-4">
            <input type="number" name="product_id" hidden value="<?=$_GET['id']?>">
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