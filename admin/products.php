<?php
    include 'include/nav.php';
?>
        
        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            <header class="flex justify-between items-center bg-white shadow mb-3 p-4 rounded-md">
                <h1 class="text-xl font-bold">Manage Products</h1>
                <button class="md:hidden bg-fuchsia-500 text-white px-4 py-2 rounded" onclick="toggleSidebar()">Menu</button>
            </header>
            <div class="flex justify-between mb-4">
                <input type="text" placeholder="Search products..." class="w-1/3 p-2 text-black rounded-md border border-fuchsia-500 focus:outline-none">
                <button class="bg-fuchsia-500 text-white px-4 py-2 rounded-md hover:bg-fuchsia-600 transition-all">Add Product</button>
            </div>
            
            <!-- Products Table -->
<div class="bg-white p-4 rounded-lg shadow-lg">
    <table class="w-full text-left">
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
            <tr class="border-b border-gray-200">
                <td class="p-3">
                    <img src="https://i5.walmartimages.com/seo/VILINICE-Noise-Cancelling-Headphones-Wireless-Bluetooth-Over-Ear-Headphones-with-Microphone-Black-Q8_b994b99c-835f-42fc-8094-9f6be0f9273b.be59955399cdbd1c25011d4a4251ba9b.jpeg" alt="Wireless Headphones" class="w-16 h-16 rounded">
                </td>
                <td class="p-3">Wireless Headphones</td>
                <td class="p-3">Electronics</td>
                <td class="p-3">$120</td>
                <td class="p-3">50</td>
                <td class="p-3 text-center">
                    <button class="text-blue-400 hover:underline">Edit</button>
                    <button class="text-red-400 hover:underline ml-4">Delete</button>
                </td>
            </tr>
            <tr class="border-b border-gray-200">
                <td class="p-3">
                    <img src="https://m.media-amazon.com/images/I/61vIdWlDGcL._AC_SL1500_.jpg" alt="Smartphone" class="w-16 h-16 rounded">
                </td>
                <td class="p-3">Smartphone</td>
                <td class="p-3">Electronics</td>
                <td class="p-3">$699</td>
                <td class="p-3">30</td>
                <td class="p-3 text-center">
                    <button class="text-blue-400 hover:underline">Edit</button>
                    <button class="text-red-400 hover:underline ml-4">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

        </main>
        <?php
    include 'include/footer.php';
?>