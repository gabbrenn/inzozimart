<!-- Main Content -->
<main class="flex-1 p-6 overflow-auto">
            <header class="flex justify-between items-center bg-white shadow mb-3 p-4 rounded-md">
                <h1 class="text-xl font-bold">Manage Products</h1>
                <button class="md:hidden bg-fuchsia-500 text-white px-4 py-2 rounded" onclick="toggleSidebar()">Menu</button>
            </header>
            <div class="flex justify-between mb-4">
                <input type="text" id="searchInput" placeholder="Search products..." class="w-1/3 p-2 text-black rounded-md border border-fuchsia-500 focus:outline-none" onkeyup="searchProducts()">
                <a href="create_product" class="bg-fuchsia-500 text-white px-4 py-2 rounded-md hover:bg-fuchsia-600 transition-all">Add Product</a>
            </div>
            
            <!-- Products Table -->
            <span class="bg-warning"><?=isset($delete['message'])?$delete["message"]:''?></span>
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <table id="productTable" class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 border-b border-gray-700">
                            <th class="p-3">Product Image</th>
                            <th class="p-3">Product Name</th>
                            <th class="p-3">Category</th>
                            <th class="p-3">Price</th>
                            <th class="p-3">Stock</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $row): ?>
                        <tr class="border-b border-gray-200">
                            <td class="p-3">
                                <img src="<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['product_name']) ?>" class="w-16 h-16 rounded">
                            </td>
                            <td class="p-3"><?= htmlspecialchars($row['product_name']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($row['category_name']) ?></td>
                            <td class="p-3"><span class="px-3 py-1 bg-green-200 rounded">$<?= htmlspecialchars($row['price']) ?></span></td>
                            <td class="p-3"><?= htmlspecialchars($row['stock']) ?></td>
                            <td class="p-3 text-center">
                                <a href="update_product?id=<?= $row['id'] ?>" class="text-blue-400 hover:underline">Edit</a>
                                <a href="?delete=<?= $row['id'] ?>" class='text-red-400 hover:underline ml-4' onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

<script>
    function searchProducts() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#productTable tbody tr");

        rows.forEach(row => {
            let name = row.cells[1]?.textContent.toLowerCase() || "";
            let category = row.cells[2]?.textContent.toLowerCase() || "";

            if (name.includes(input) || category.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
