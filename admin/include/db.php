<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=inzozi", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Connection failed: " . $e->getMessage() . "</p>";
}
?>