<?php
session_start();
require 'resources\pages\otpbyemail/PHPMailer/src/PHPMailer.php';
require 'resources\pages\otpbyemail/PHPMailer/src/SMTP.php';
require 'resources\pages\otpbyemail/PHPMailer/src/Exception.php';
require "C:/xampp/htdocs/attendancesystem/database/database_connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:forgot.php?status=error&message=Invalid email format.");
        exit();
    }

    try {
        // Check if email exists in the database
        $stmt = $pdo->prepare("SELECT Id FROM tbllecture WHERE emailAddress = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();

        if ($result) {
            // Generate OTP and expiry time
            $otp = rand(100000, 999999);
            $expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

            // Update OTP and expiry in the database
            $stmt = $pdo->prepare("UPDATE tbllecture SET otp = ?, otp_expiry = ? WHERE emailAddress = ?");
            $stmt->execute([$otp, $expiry, $email]);

            // Send OTP via email
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Gmail SMTP host
                $mail->SMTPAuth = true;
                $mail->Username = '@gmail.com'; // Your Gmail username
                $mail->Password = 'wcai mupyi'; // Gmail App password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('@gmail.com', 'Lecturer  OTP');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'OTP for Password Change';
                $mail->Body = "Your OTP is <b>$otp</b>. It is valid for 5 minutes.";

                if ($mail->send()) {
                    $_SESSION['email'] = $email;
                    header("Location:forgot.php?status=success&message=OTP sent successfully to $email!");
                    exit();
                } else {
                    header("Location:forgot.php?status=error&message=Failed to send OTP. Please try again.");
                    exit();
                }
            } catch (Exception $e) {
                header("Location:forgot.php?status=error&message=Mailer Error: {$mail->ErrorInfo}");
                exit();
            }
        } else {
            header("Location:forgot.php?status=error&message=Email not found in the database.");
            exit();
        }
    } catch (PDOException $e) {
        header("Location:forgot.php?status=error&message=Database error: {$e->getMessage()}");
        exit();
    }
}
?>
