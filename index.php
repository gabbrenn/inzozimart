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
    <header class="bg-black p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">InzoziMart</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">Shop</a></li>
                    <li><a href="#" class="hover:underline">Cart</a></li>
                    <li><a href="#" class="hover:underline">Login</a></li>
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
                <div class="bg-gray-100 p-4 text-center rounded shadow">Electronics</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Fashion</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Home Appliances</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Beauty & Personal Care</div>
                <!-- <div class="bg-gray-100 p-4 text-center rounded shadow">Sports & Outdoors</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Toys & Games</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Automotive</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Books & Stationery</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Health & Wellness</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Furniture</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Groceries</div>
                <div class="bg-gray-100 p-4 text-center rounded shadow">Pet Supplies</div> -->
            </div>
        </section>
        
        <!-- Featured Products -->
        <section>
            <h2 class="text-3xl font-bold mb-4 text-center">Recent Products</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition">
                    <img src="https://5.imimg.com/data5/SELLER/Default/2022/11/KE/VX/MV/116453489/white-casual-shoes-for-men-1000x1000.jpg" alt="Product" class="w-full h-48 object-cover rounded">
                    <p class="text-lg font-semibold mt-2">PVC Comfort Foam White Casual Shoes For Men</p>
                    <p class="text-gray-600">$100 <span class="text-red-500 line-through">$120</span></p>
                    <div class="flex items-center mt-2">⭐⭐⭐⭐☆</div>
                    <button class="mt-2 bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-all duration-300">Add to Cart</button>
                </div>
                <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition">
                    <img src="https://files.cdn.printful.com/o/upload/bfl-image/52/10412_l_camping%20graphics%20by%20BOSS.jpg" alt="Product" class="w-full h-48 object-cover rounded">
                    <p class="text-lg font-semibold mt-2">Softest T-Shirt | Black</p>
                    <p class="text-gray-600">$150 <span class="text-red-500 line-through">$180</span></p>
                    <div class="flex items-center mt-2">⭐⭐⭐⭐⭐</div>
                    <button class="mt-2 bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-all duration-300">Add to Cart</button>
                </div>
                <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition">
                    <img src="https://poetrydesigns.com/cdn/shop/products/14k-gold-cubic-zirconia-necklace-bracelet-earring-set-for-wedding-anyajewelry-sets-313020.jpg" alt="Product" class="w-full h-48 object-cover rounded">
                    <p class="text-lg font-semibold mt-2">14k Gold & Cubic Zirconia Necklace Bracelet Earring Set for Wedding-Anya</p>
                    <p class="text-gray-600">$200 <span class="text-red-500 line-through">$250</span></p>
                    <div class="flex items-center mt-2">⭐⭐⭐⭐☆</div>
                    <button class="mt-2 bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition-all duration-300">Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="bg-black text-white text-center p-4 mt-6">
        <p>&copy; 2025 InzoziMart. All rights reserved.</p>
        <div class="flex justify-center space-x-4 mt-2">
            <a href="#" class="hover:underline">Facebook</a>
            <a href="#" class="hover:underline">Twitter</a>
            <a href="#" class="hover:underline">Instagram</a>
        </div>
    </footer>
</body>
</html>
