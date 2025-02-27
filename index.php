<?php
session_start();
include 'admin/include/db.php';  // Ensure db.php contains the PDO connection code

// Fetch Categories
$categoryQuery = $pdo->query("SELECT * FROM categories");
$categories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch Products
$productQuery = $pdo->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 6");  // You can adjust the number of products here
$products = $productQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InzoziMart - Home</title>
    <link rel="icon" href="img/logo.png" type="image/icon type">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black">
<!-- Modal -->
    <div id="myModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white text-black p-6 rounded-lg w-96">
            <h2 class="text-2xl font-semibold mb-4">Important Message</h2>
            <p>Access Admin Panel by click <a href="admin/" class="text-blue-500">Here</a> then create your account</p>
            <button id="closeModal" class="mt-4 w-full bg-fuchsia-500 text-white py-2 rounded-lg hover:bg-fuchsia-600 transition-all">Close</button>
        </div>
    </div>
<header class="bg-black p-4 text-white">
    <div class="container mx-auto flex flex-wrap justify-between items-center gap-4">
        <h1 class="text-2xl font-bold">InzoziMart</h1>
        
        <!-- Responsive Search Bar -->
        <div class="relative flex items-center w-full sm:w-96 bg-white border border-gray-300 rounded-full shadow-md overflow-hidden">
            <input type="text" placeholder="Search products..." class="w-full px-4 py-2 text-black focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button class="bg-black text-white px-5 py-2 rounded-r-full hover:bg-fuchsia-500 transition-all">Search</button>
        </div>
        
        <nav class="w-full sm:w-auto">
            <ul class="flex flex-wrap justify-center sm:justify-end space-x-4">
                <li><a href="#" class="hover:border-b-2 border-fuchsia-500">Home</a></li>
                <li><a href="#" class="hover:border-b-2 border-fuchsia-500">Shop</a></li>
                <li><a href="#" class="hover:border-b-2 border-fuchsia-500">Cart</a></li>

                <!-- Check if user is logged in -->
                <?php if (isset($_SESSION['user'])): ?>
                   <!-- Logged-in user: Avatar with dropdown -->
<li class="relative">
    <button class="flex items-center space-x-2" id="avatar-button">
        <img src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($_SESSION['user']['email']))) ?>" alt="User Avatar" class="w-8 h-8 rounded-full">
    </button>
    <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg hidden group-hover:block z-50" id="dropdown-menu">
        <ul>
            <li><strong class="block px-4 py-2"><?= $_SESSION['user']['name'] ?></strong></li>
            <li><a href="logout.php" class="block px-4 py-2 text-red-500">Logout</a></li>
        </ul>
    </div>
</li>
                <?php else: ?>
                    <!-- Not logged in: Login button -->
                    <li><a href="signin.php" class="hover:border-b-2 border-fuchsia-500">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

    
    <!-- Hero Section -->
    <section class="relative h-80 bg-cover bg-center" style="background-image: url('https://cdn.shopify.com/s/files/1/0070/7032/articles/ecommerce_20platforms_3c2ab809-41ff-4185-9fef-52df34de95e4.png');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center text-center p-6">
            <div>
                <h2 class="text-4xl font-bold text-white">Welcome to InzoziMart</h2>
                <p class="text-lg text-gray-200 mt-2">Your one-stop shop for quality products at the best prices.</p>
            </div>
        </div>
    </section>
    
    <main class="container mx-auto p-6">
        <!-- Product Categories -->
        <section class="mb-8">
            <h2 class="text-3xl font-bold mb-4 text-center">Categories</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php foreach ($categories as $category): ?>
                    <div class="bg-fuchsia-200 p-4 hover:border-b-2 border-fuchsia-500 text-center rounded shadow">
                        <?php echo htmlspecialchars($category['category_name']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        
        <!-- Featured Products -->
        <section>
            <h2 class="text-3xl font-bold mb-4 text-center">Recent Products</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($products as $product): ?>
                    <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition">
                        <img src="admin/<?php echo htmlspecialchars($product['image']); ?>" alt="Product" class="w-full h-48 object-cover rounded">
                        <p class="text-lg font-semibold mt-2"><?php echo htmlspecialchars($product['product_name']); ?></p>
                        <p class="text-gray-600"><?php echo '$' . number_format($product['price'], 2); ?> <span class="text-red-500 line-through"><?php echo '$' . number_format($product['old_price'], 2); ?></span></p>
                        <div class="flex items-center mt-2">⭐⭐⭐⭐☆</div>
                        <button class="mt-2 bg-fuchsia-400 text-white px-4 py-2 rounded hover:bg-fuchsia-500 transition-all duration-300">Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    
    <footer class="bg-black text-white text-center p-8 mt-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 text-sm text-left">
            <div>
                <h3 class="text-lg font-bold mb-2">About Us</h3>
                <p>InzoziMart is your go-to e-commerce platform for high-quality products at unbeatable prices. Shop with us today!</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">Shop</a></li>
                    <li><a href="#" class="hover:underline">Cart</a></li>
                    <li><a href="#" class="hover:underline">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Stay Connected with Us</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Facebook</a></li>
                    <li><a href="#" class="hover:underline">Twitter</a></li>
                    <li><a href="#" class="hover:underline">Instagram</a></li>
                    <li><a href="#" class="hover:underline">LinkedIn</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-2">Newsletter</h3>
                <p>Subscribe to our newsletter for updates on new arrivals and exclusive deals.</p>
                <div class="flex mt-2">
                    <input type="email" placeholder="Your email" class="w-full p-2 text-black rounded-l-lg border border-gray-300 focus:outline-none">
                    <button class="bg-fuchsia-400 text-white px-4 py-2 rounded-r-lg hover:bg-fuchsia-700 transition-all">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="flex justify-center space-x-6 mt-6">
            <p class="">&copy; 2025 InzoziMart. All rights reserved</p>
            <a href="#" class="hover:underline">Privacy Policy</a>
            <a href="#" class="hover:underline">Terms of Service</a>
            <a href="#" class="hover:underline">Refund Policy</a>
        </div>
    </footer>

    <script>

     // Show the modal on page load
     window.onload = function() {
            document.getElementById('myModal').classList.remove('hidden');
        };

        // Close the modal when the close button is clicked
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('myModal').classList.add('hidden');
        });

        const avatarButton = document.getElementById('avatar-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    // Toggle the visibility of the dropdown on click
    avatarButton.addEventListener('click', function (event) {
        event.stopPropagation();  // Prevent the click event from bubbling up
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown if clicking outside
    document.addEventListener('click', function (event) {
        if (!avatarButton.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
</body>
</html>
