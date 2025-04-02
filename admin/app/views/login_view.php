<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Auth | InzoziMart</title>
    <link rel="icon" href="app/img/logo.png" type="image/icon type">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700"><a href="..">InzoziMart Admin</a></h2>
        <?php if (isset($resp['status'])): ?>
            <p class="text-yellow-500 text-center mt-2"><?= $resp['message'] ?></p>
        <?php endif; ?>
        <!-- Sign In Form -->
        <form id="signinForm" method="POST" class="mt-4">
            <h3 class="text-xl text-gray-800 font-semibold text-center mb-4">Sign In</h3>
            <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded-md mb-3">
            <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded-md mb-3">
            <button type="submit" name="signin" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Sign In</button>
            <p class="text-gray-600 text-center mt-3">No account? 
                <a href="register" class="text-blue-500 cursor-pointer" onclick="toggleForms()">Sign Up</a>
            </p>
        </form>
    </div>
</body>
</html>