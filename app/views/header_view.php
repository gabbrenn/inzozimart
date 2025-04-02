
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InzoziMart - Home</title>
    <link rel="icon" href="app/img/logo.png" type="image/icon type">
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
                <li><a href="welcome" class="hover:border-b-2 border-fuchsia-500">Home</a></li>
                <li><a href="#" class="hover:border-b-2 border-fuchsia-500" onclick="return alert('Sorry! System Is Still on development!')">Shop</a></li>
                <li><a href="cart" class="hover:border-b-2 border-fuchsia-500">Cart <?php if(count($cart)>0):?><span class="bg-yellow-300 rounded px-2"><?=@count($cart)?></span><?php endif;?></a></li>

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
            <li><a href="logout" class="block px-4 py-2 text-red-500">Logout</a></li>
        </ul>
    </div>
</li>
                <?php else: ?>
                    <!-- Not logged in: Login button -->
                    <li><a href="login" class="hover:border-b-2 border-fuchsia-500">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
