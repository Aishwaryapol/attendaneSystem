<?php
$host = "localhost";

// Your database name
$database = "attendancedatabse";

// Database user (default is root unless configured otherwise)
$user = "root";

// Password (default is an empty string in XAMPP)
$password = "Mukaidevi@1";

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Set the default fetch mode to FETCH_ASSOC for convenience
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Connection success (Optional)
    // echo "Connected successfully"; // Uncomment for debugging
} catch (PDOException $e) {
    // Exit script and display connection error message
    die("Connection failed: " . $e->getMessage());
}
?>
