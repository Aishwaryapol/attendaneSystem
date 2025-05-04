<?php
session_start();
require "C:/xampp/htdocs/attendancesystem/database/database_connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'];
    $email = $_SESSION['email'];

    if (empty($otp)) {
        die("OTP is required.");
    }

    try {
        // Validate OTP
        $stmt = $pdo->prepare("SELECT otp, otp_expiry FROM tbllecture WHERE emailAddress = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if ($row) {
            // Check OTP and its expiry
            if ($otp === $row['otp'] && strtotime($row['otp_expiry']) > time()) {
                header("Location:reset.php");
                exit();
            } else {
                echo "Invalid or expired OTP.";
            }
        } else {
            echo "No record found.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
