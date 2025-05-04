
<?php
session_start();
require "C:/xampp/htdocs/attendancesystem/database/database_connection.php";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
           
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff96; /* Form background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow for the form */
            width: 300px; /* Smaller form width */
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333; /* Dark text color */
        }
        label {
            margin-bottom: 10px;
            font-size: 16px;
            width: 100%;
        }
        input[type="password"] {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%; /* Full width input */
          background-color:   #ffffff96;
        }
        button {
            background-color: #007BFF; /* Blue background color */
            color: white; /* White text color */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        a {
            margin-top: 10px;
            text-decoration: underline;
            font-size: 17px;
            color: #007BFF; /* Blue text color for the link */
        }
        a:hover {
            color: #0056b3; /* Darker blue on hover */
        }

        body {
    margin: auto;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    overflow: auto;
    background: linear-gradient(315deg, rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%, rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%);
    animation: gradient 15s ease infinite;
    background-size: 400% 400%;
    background-attachment: fixed;
}

@keyframes gradient {
    0% {
        background-position: 0% 0%;
    }
    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0% 0%;
    }
}

.wave {
    background: rgb(255 255 255 / 25%);
    border-radius: 1000% 1000% 0 0;
    position: fixed;
    width: 200%;
    height: 12em;
    animation: wave 10s -3s linear infinite;
    transform: translate3d(0, 0, 0);
    opacity: 0.8;
    bottom: 0;
    left: 0;
    z-index: -1;
}

.wave:nth-of-type(2) {
    bottom: -1.25em;
    animation: wave 18s linear reverse infinite;
    opacity: 0.8;
}

.wave:nth-of-type(3) {
    bottom: -2.5em;
    animation: wave 20s -1s reverse infinite;
    opacity: 0.9;
}

@keyframes wave {
    2% {
        transform: translateX(1);
    }

    25% {
        transform: translateX(-25%);
    }

    50% {
        transform: translateX(-50%);
    }

    75% {
        transform: translateX(-25%);
    }

    100% {
        transform: translateX(1);
    }
}

    </style>
</head>
<body>
<div>
       <div class="wave"></div>
       <div class="wave"></div>
       <div class="wave"></div>
    <form action="#" method="POST">
        <h2>Reset Password</h2>
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter new password" required>
        <button type="submit">Reset Password</button>
        <a href="login">go back</a>
    </form>
</div>
</body>
</html>
