<?php
include 'include/nav.php';
try {
    // Fetch all users from the database
$stmt = $pdo->query("SELECT id, full_name, email, created_at FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Connection failed: " . $e->getMessage() . "</p>";
}
?>
        
        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            <header class="flex justify-between items-center bg-white shadow mb-3 p-4 rounded-md">
                <h1 class="text-xl font-bold">Manage Products</h1>
                <button class="md:hidden bg-fuchsia-500 text-white px-4 py-2 rounded" onclick="toggleSidebar()">Menu</button>
            </header>
            <div class="flex justify-between mb-4">
                <input type="text" id="searchInput" placeholder="Search User..." class="w-1/3 p-2 text-black rounded-md border border-fuchsia-500 focus:outline-none" onkeyup="searchProducts()">

            </div>
            
            <!-- Products Table -->
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <table id="productTable" class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 border-b border-gray-700">
                        <th class="p-3">ID</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Date Created</th>
                        <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr class="border-b border-gray-200">
                            <td class="p-3"><?= htmlspecialchars($user['id']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($user['full_name']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($user['email']) ?></td>
                            <td class="p-3"><?= htmlspecialchars($user['created_at']) ?></td>
                            <td class="p-3 text-center">
                                <a href="?id=<?= $user['id'] ?>" class="text-blue-400 hover:underline" onclick="return alert('Sorry! System Is Still on development!')">Edit</a>
                                <a href="?id=<?= $user['id'] ?>" class='text-red-400 hover:underline ml-4' onclick="return alert('Sorry! System Is Still on development!')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php
include 'include/footer.php';
?>

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
