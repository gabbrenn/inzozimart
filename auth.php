<?php
session_start();
include('admin/include/db.php');

// Handle Sign Up
if (isset($_POST['signup'])) {
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // Check if email already exists
    $check_email = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $check_email->execute(['email' => $email]);

    if ($check_email->rowCount() > 0) {
        $error = "Email is already registered!";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (full_name, email, password) VALUES (:full_name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute(['full_name' => $full_name, 'email' => $email, 'password' => $hashed_password])) {
            $success = "Sign-up successful!";
        } else {
            $error = "Error: Unable to sign up.";
        }
    }
}

// Handle Sign In
if (isset($_POST['signin'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // Check if the email exists
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['email']= $user['email'];
            $_SESSION['user']['name']= $user['full_name'];
            $success = "Sign-in successful!";
            header("Location: index.php");
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No user found with this email!";
    }
}
?>
