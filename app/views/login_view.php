<?php
// include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up | InzoziMart</title>
    <link rel="icon" href="app/img/logo.png" type="image/icon type">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen p-4">
    <!-- Modal for error messages -->
    <div id="error-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
            <h3 id="status" class="text-red-500 font-semibold mb-4">Error</h3>
            <p id="message" class="text-white mb-4"></p>
            <button onclick="closeModal()" class="bg-fuchsia-500 text-white py-2 px-4 rounded-lg hover:bg-fuchsia-600 transition-all">Close</button>
        </div>
    </div>

    <div class="w-full max-w-4xl bg-gray-800 rounded-lg shadow-lg flex flex-col md:flex-row overflow-hidden">
        <!-- Left Side: Welcome Section -->
        <div class="hidden md:flex flex-col justify-center items-center p-8 w-1/2 bg-fuchsia-500 text-center">
            <a href="." ><h2 class="text-3xl font-bold mb-4">Welcome to InzoziMart</h2></a>
            <p class="text-gray-200">Your one-stop shop for high-quality products at unbeatable prices. Join us now and explore amazing deals!</p>
        </div>
        
        <!-- Right Side: Sign In Form Section -->
        <div class="w-full md:w-1/2 p-8" id="signin-section">
            <h2 class="text-2xl font-bold text-center mb-6">Sign In</h2>
            <form method="POST">
    <div class="mb-4">
        <label class="block text-gray-400 mb-2">Email</label>
        <input type="email" name="email" placeholder="Enter your email" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-400 mb-2">Password</label>
        <input type="password" name="password" placeholder="Enter your password" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500" required>
    </div>
    <div class="mb-4 flex justify-between items-center">
        <label class="flex items-center text-gray-400">
            <input type="checkbox" class="mr-2">
            Remember me
        </label>
        <a href="#" class="text-fuchsia-500 hover:underline">Forgot Password?</a>
    </div>
    <button type="submit" name="signin" class="w-full bg-fuchsia-500 text-white py-3 rounded-lg hover:bg-fuchsia-600 transition-all">Sign In</button>
</form>

            <div class="my-4 text-center">
                <p class="text-gray-400">or</p>
                <button class="w-full flex items-center justify-center bg-white text-black py-3 rounded-lg mt-2 shadow-md hover:bg-gray-200 transition-all">
                <img src="https://img.icons8.com/?size=512&id=17949&format=png" alt="Google Logo" class="w-5 h-5 mr-2">
                    Continue with Google
                </button>
            </div>
            <p class="mt-4 text-center text-gray-400">Don't have an account? <a href="register" class="text-fuchsia-500 hover:underline" onclick="toggleForms()">Sign Up</a></p>
        </div>

        <script>
         // Function to display error modal
         function showMessage(status,message) {
            document.getElementById('status').innerText = status;
            document.getElementById('message').innerText = message;
            document.getElementById('error-modal').classList.remove('hidden');
        }

        // Close modal
        function closeModal() {
            document.getElementById('error-modal').classList.add('hidden');
        }

        // If there is an error message from PHP, display it
        <?php if (isset($resp['status'])): ?>
            showMessage("<?=$resp['status']?>","<?=$resp['message']?>");
        <?php if ($resp['status'] == "OK"): ?>
            setTimeout(() => {
                const currentPath = window.location.pathname;
                const newPath = currentPath.replace(/[^/]+$/, "");
                location.replace(newPath);
            }, 2000); // Optional delay before redirecting
        <?php endif; ?>
        <?php endif; ?>
    </script>
</body>
</html>
