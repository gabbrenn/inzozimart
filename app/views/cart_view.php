
<main class="container mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-center">Shopping Cart</h2>
    <?php if (isset($delete['message'])) {
        echo $delete['message'];
    }?>
    <?php if (!empty($cart)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($cart as $item): ?>
                <div class="bg-gray-100 p-4 rounded shadow flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="admin/<?= $item['image'] ?>" alt="Product" class="w-20 h-20 object-cover rounded">
                        <div>
                            <p class="text-lg font-semibold"><?= $item['product_name'] ?></p>
                            <p class="text-gray-600">$<?= $item['price'] ?></p>
                        </div>
                    </div>
                    <a href="?remove=<?= $item['cart_id'] ?>" class="text-red-500 hover:underline">Remove</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-6">
            <a href="#" onclick="return alert('Sorry! System Is Still on development!')" class="bg-fuchsia-500 text-white px-6 py-2 rounded hover:bg-fuchsia-600 transition-all">Proceed to Checkout</a>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600">Your cart is empty.</p>
    <?php endif; ?>
</main>

