<!-- Main Content -->
<main class="flex-1 p-6">
<div class="mb-4">
    <a href="product" class="bg-fuchsia-500 text-white px-4 py-2 rounded-md hover:bg-fuchsia-600 transition-all">Back</a>
</div>
    <h1 class="text-2xl font-bold mb-4">Add New Product</h1>

    <?php if (isset($product['message'])): ?>
        <p class="mb-4 text-green-600"><?= htmlspecialchars($product['message']) ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md max-w-lg">
        <div class="mb-4">
            <label class="block font-medium mb-1">Product Name</label>
            <input type="text" name="product_name" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Category</label>
            <select name="category" class="w-full p-2 border rounded" required>
                <option value="" disabled selected>Select a category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>"><?= htmlspecialchars($category['category_name']) ?></option>
                <?php endforeach; ?>
            </select>
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