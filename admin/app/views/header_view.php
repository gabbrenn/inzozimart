<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | InzoziMart</title>
    <link rel="icon" href="app/img/logo.png" type="image/icon type">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-black">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
<aside class="w-64 bg-black text-white hidden md:block p-6">
    <h2 class="text-xl font-bold text-fuchsia-500 mb-6">InzoziMart Admin</h2>

    <!-- User Profile Section -->
    <div class="flex items-center space-x-4 mb-6">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="User Avatar" class="w-12 h-12 rounded-full border border-gray-500">
        <div>
            <p class="text-lg font-semibold"><?= htmlspecialchars($_SESSION['admin']['name']) ?></p>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav>
        <ul class="space-y-4">
            <li><a href="dashboard" class="block p-2 hover:bg-gray-800 rounded <?=@($page=='dashboard')?'bg-gray-900':''?>">Dashboard</a></li>
            <li><a href="product" class="block p-2 hover:bg-gray-800 rounded <?=@($page=='product')?'bg-gray-900':''?>">Products</a></li>
            <li><a href="category" class="block p-2 hover:bg-gray-800 rounded <?=@($page=='category')?'bg-gray-900':''?>">Categories</a></li>
            <li><a href="#" class="block p-2 hover:bg-gray-800 rounded" onclick="return alert('Sorry! System Is Still on development!')">Orders</a></li>
            <li><a href="users.php" class="block p-2 hover:bg-gray-800 rounded">Users</a></li>
            <li><a href="#" class="block p-2 hover:bg-gray-800 rounded" onclick="return alert('Sorry! System Is Still on development!')">Settings</a></li>
        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="mt-6">
        <a href="logout" class="block text-center bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
            Logout
        </a>
    </div>
</aside>
