
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login to access dashboard </title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="resources/assets/css/forgotpass.css">
    <style>
    
.alert {
        padding: 10px;
    
        margin-bottom: 15px;
        border-radius: 4px;
        text-align: center;
        max-width: 300px;
        margin: 0 auto;
    }
    .alert.success {
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
    }
    .alert.error {
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
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


       <div class="container">  
    <input type="checkbox" id="flip">
    <div class="cover"> 
      <div class="front"> 
        <img src="resources/images/passnew.jpg" alt="">
        <div class="text"> 
         
        </div>
      </div>
      <div class="back"> 
      <img src="resources/images/passnew.jpg" alt="">
        <div class="text"> 
        
        </div> 
      </div>
    </div>
    <div class="forms"> 
    <div style="max-width: 250px;
    padding-left: 50px;
    padding-bottom: 20px;">   <!-- Display Success or Error Message -->
         <?php if (isset($_GET['message'])): ?>
                <div class="alert <?php echo htmlspecialchars($_GET['status']); ?>">
                    <?php echo htmlspecialchars($_GET['message']); ?>
                </div>
            <?php endif; ?></div>
        <div class="form-content">
           
          <div class="login-form"> 
            <div class="title">Forgot password</div>
          <form action="send_otp.php" method="post">
            <div class="input-boxes"> 
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input id="inputtext" type="text" placeholder="Enter your email" id="email" name="email" required>
              </div>  
              <div class=" input-box">
              <button class="btn buttonclick" type="submit">Send OTP</button>
              </div>
              <div class=" input-box">
                <div class="text sign-up-text"> <label class="lbl" for="flip">Verify OTP here</label></div>
              </div>
              
          </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Verify OTP</div>
        <form action="verify_otp.php" method="POST">
            <div class="input-boxes"> 
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input id="inputtext" type="text" name="otp" id="otp"  placeholder="Enter OTP" required>
              </div>
              
              <div class=" input-box"> 
              <button class="buttonclick" type="submit">Verify OTP</button>
              </div>
              <div class="text"><a href="login" style="margin-left:150px;margin-left: 150px; font-size: 17px; 
              text-decoration: underline;  margin-top: 15px;">go to login</a></div>
              <div class="text sign-up-text"><label class="lbl" for="flip">Back </label></div>
            </div>
         </div>   
            
      </form>
        </div>
    </div>
    
       </div>
</body>
</html>