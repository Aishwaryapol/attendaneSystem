<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        
            body {
                font-family: Arial, sans-serif;
            }
            form {
                max-width: 400px;
                margin: auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background: #f9f9f9;
            }
            input {
                display: block;
                width: 100%;
                margin-bottom: 10px;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            button {
                padding: 10px;
                background: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background: #0056b3;
            }
        </style>
    
</head>
<body>
    <form action="verify_otp.php" method="POST">
        <h2>Verify OTP</h2>
        <label for="otp">OTP:</label>
        <input type="text" name="otp" id="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
