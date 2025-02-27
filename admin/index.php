<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
include 'include/db.php';

$message = "";

// Handle Sign Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$username, $email, $password])) {
        $message = "Account created successfully! Please log in.";
    } else {
        $message = "Sign up failed.";
    }
}

// Handle Sign In
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Auth | InzoziMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700">InzoziMart Admin</h2>

        <?php if ($message): ?>
            <p class="text-red-500 text-center mt-2"><?= $message ?></p>
        <?php endif; ?>

        <!-- Sign In Form -->
        <form id="signinForm" method="POST" class="mt-4">
            <h3 class="text-xl text-gray-800 font-semibold text-center mb-4">Sign In</h3>
            <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded-md mb-3">
            <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded-md mb-3">
            <button type="submit" name="signin" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Sign In</button>
            <p class="text-gray-600 text-center mt-3">No account? 
                <span class="text-blue-500 cursor-pointer" onclick="toggleForms()">Sign Up</span>
            </p>
        </form>

        <!-- Sign Up Form -->
        <form id="signupForm" method="POST" class="mt-4 hidden">
            <h3 class="text-xl text-gray-800 font-semibold text-center mb-4">Sign Up</h3>
            <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded-md mb-3">
            <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded-md mb-3">
            <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded-md mb-3">
            <button type="submit" name="signup" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600">Sign Up</button>
            <p class="text-gray-600 text-center mt-3">Already have an account? 
                <span class="text-blue-500 cursor-pointer" onclick="toggleForms()">Sign In</span>
            </p>
        </form>
    </div>

    <script>
        function toggleForms() {
            document.getElementById('signinForm').classList.toggle('hidden');
            document.getElementById('signupForm').classList.toggle('hidden');
        }
    </script>
</body>
</html>
