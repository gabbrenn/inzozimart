<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=vladimir_22rp06799", "root", "wordpass", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "<p class='text-red-500'>Connection failed: " . $e->getMessage() . "</p>";
}
?>
