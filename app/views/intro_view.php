
    
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
                <?php
                    foreach ($categories as $category):
                ?>
                    <div class="bg-fuchsia-200 p-4 hover:border-b-2 border-fuchsia-500 text-center rounded shadow">
                        <?=$category['category_name']?>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        
        <!-- Featured Products -->
        <section>
            <h2 class="text-3xl font-bold mb-4 text-center">Recent Products</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                    foreach ($products as $product):
                ?>
                    <div class="bg-gray-100 p-4 rounded shadow hover:shadow-lg transition">
                        <img src="admin/<?=$product['image']?>" alt="Product" class="w-full h-48 object-cover rounded">
                        <p class="text-lg font-semibold mt-2"><?=$product['product_name']?></p>
                        <p class="text-gray-600">$<?=$product['price']?> <span class="text-red-500 line-through">$<?=$product['price']+($product['price']*50/100)?></span></p>
                        <div class="flex items-center mt-2">⭐⭐⭐⭐☆</div>
                        <a href="?add=<?=$product['id']?>"><button class="mt-2 bg-fuchsia-400 text-white px-4 py-2 rounded hover:bg-fuchsia-500 transition-all duration-300">Add to Cart</button></a>
                    </div>
                <?php endforeach;?>
            </div>
        </section>
    </main>