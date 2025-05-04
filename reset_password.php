<?php
session_start();
require "C:/xampp/htdocs/attendancesystsem/databse/database_connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hash the new password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if (empty($password)) {
        die("Password cannot be empty.");
    }

    try {
        // Update the password and reset OTP fields
        $stmt = $pdo->prepare("UPDATE tbllecture SET password = ?, otp = NULL, otp_expiry = NULL WHERE emailAddress = ?");
        $stmt->execute([$password, $email]);

        if ($stmt->rowCount() > 0) {
            echo "Password reset successfully.";
           header('Location:login');
           die();
        } else {
            echo "Failed to reset password. Please try again.";
        }

        // Destroy the session
        session_destroy();
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
