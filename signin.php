<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up | InzoziMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-4xl bg-gray-800 rounded-lg shadow-lg flex flex-col md:flex-row overflow-hidden">
        <!-- Left Side: Welcome Section -->
        <div class="hidden md:flex flex-col justify-center items-center p-8 w-1/2 bg-fuchsia-500 text-center">
            <a href="index.php"><h2 class="text-3xl font-bold mb-4">Welcome to InzoziMart</h2></a>
            <p class="text-gray-200">Your one-stop shop for high-quality products at unbeatable prices. Join us now and explore amazing deals!</p>
        </div>
        
        <!-- Right Side: Sign In Form Section -->
        <div class="w-full md:w-1/2 p-8" id="signin-section">
            <h2 class="text-2xl font-bold text-center mb-6">Sign In</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Email</label>
                    <input type="email" placeholder="Enter your email" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Password</label>
                    <input type="password" placeholder="Enter your password" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>
                <div class="mb-4 flex justify-between items-center">
                    <label class="flex items-center text-gray-400">
                        <input type="checkbox" class="mr-2">
                        Remember me
                    </label>
                    <a href="#" class="text-fuchsia-500 hover:underline">Forgot Password?</a>
                </div>
                <button class="w-full bg-fuchsia-500 text-white py-3 rounded-lg hover:bg-fuchsia-600 transition-all">Sign In</button>
            </form>
            <div class="my-4 text-center">
                <p class="text-gray-400">or</p>
                <button class="w-full flex items-center justify-center bg-white text-black py-3 rounded-lg mt-2 shadow-md hover:bg-gray-200 transition-all">
                <img src="https://img.icons8.com/?size=512&id=17949&format=png" alt="Google Logo" class="w-5 h-5 mr-2">
                    Continue with Google
                </button>
            </div>
            <p class="mt-4 text-center text-gray-400">Don't have an account? <a href="#" class="text-fuchsia-500 hover:underline" onclick="toggleForms()">Sign Up</a></p>
        </div>

        <!-- Right Side: Sign Up Form Section (Initially Hidden) -->
        <div class="w-full md:w-1/2 p-8 hidden" id="signup-section">
            <h2 class="text-2xl font-bold text-center mb-6">Sign Up</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Full Name</label>
                    <input type="text" placeholder="Enter your full name" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Email</label>
                    <input type="email" placeholder="Enter your email" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-400 mb-2">Password</label>
                    <input type="password" placeholder="Create a password" class="w-full p-3 text-black rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                </div>
                <button class="w-full bg-fuchsia-500 text-white py-3 rounded-lg hover:bg-fuchsia-600 transition-all">Sign Up</button>
            </form>
            <div class="my-4 text-center">
                <p class="text-gray-400">or</p>
                <button class="w-full flex items-center justify-center bg-white text-black py-3 rounded-lg mt-2 shadow-md hover:bg-gray-200 transition-all">
                <img src="https://img.icons8.com/?size=512&id=17949&format=png" alt="Google Logo" class="w-5 h-5 mr-2">
                    Continue with Google
                </button>
            </div>
            <p class="mt-4 text-center text-gray-400">Already have an account? <a href="#" class="text-fuchsia-500 hover:underline" onclick="toggleForms()">Sign In</a></p>
        </div>
    </div>

    <script>
        function toggleForms() {
            document.getElementById('signin-section').classList.toggle('hidden');
            document.getElementById('signup-section').classList.toggle('hidden');
        }
    </script>
</body>
</html>
