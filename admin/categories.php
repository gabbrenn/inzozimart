
<?php
include 'include/nav.php';
try {
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $stmt = $pdo->prepare("DELETE FROM categories WHERE category_id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: categories.php");
    }
    // Fetch inserted data
    $stmt = $pdo->query("SELECT * FROM categories ORDER BY category_id DESC");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Connection failed: " . $e->getMessage() . "</p>";
}
?>
<!-- Main Content -->
<main class="flex-1 p-6 overflow-auto">
    <header class="flex justify-between items-center bg-white shadow mb-3 p-4 rounded-md">
        <h1 class="text-xl font-bold">Category</h1>
        <button class="md:hidden bg-fuchsia-500 text-white px-4 py-2 rounded" onclick="toggleSidebar()">Menu</button>
    </header>
    <div class="flex justify-between mb-4">
        <input type="text" id="searchInput" placeholder="Search Category..." class="w-1/3 p-2 text-black rounded-md border border-fuchsia-500 focus:outline-none" onkeyup="searchProducts()">
        <a href="add_category.php" class="bg-fuchsia-500 text-white px-4 py-2 rounded-md hover:bg-fuchsia-600 transition-all">Add Category</a>
    </div>
    <!-- Products Table -->
<div class="bg-white p-4 rounded-lg shadow-lg">
        
        <table class="w-full text-left" >
            <thead>
                <tr class="text-gray-400 border-b border-gray-700">
                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td class="p-2"> <?= $category['category_id'] ?> </td>
                    <td class="p-2"> <?= htmlspecialchars($category['category_name']) ?> </td>
                    <td class="p-2">
                        <a href="edit_category.php?id=<?= $category['category_id'] ?>" class="text-blue-500">Edit</a>
                        <a href="?delete=<?= $category['category_id'] ?>" class="text-red-400 hover:underline ml-4" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
                </main>