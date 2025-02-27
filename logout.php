<?php
session_start();

session_unset();
session_destroy();
header("Location: index.php"); // Or you can use the home page: "Location: index.php"
exit();
?>
