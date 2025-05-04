

<?php
//handle user login logics 

// ye array agar koi error raise hota hai ..to woh errors store karega
$errors = [];

//check karenge server post method ko support karta hai ya nahi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    //filter_input  remove unwanted characters and reduce the risk of malicious input. ..aur email,password,user_type form se fetch karenge
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $userType = $_POST['user_type'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors['password'] = 'Password cannot be empty';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        exit();

    }
    /* $pdo is an instance of the PHP Data Objects (PDO) class
    , which is a database access abstraction layer in PHP. It provides a secure
     and uniform way to interact with different types of databases, such as MySQL
    */
    if ($userType == "administrator") {
        $stmt = $pdo->prepare("SELECT * FROM tbladmin WHERE emailAddress = :email");
    } elseif ($userType == "lecture") {
        $stmt = $pdo->prepare("SELECT * FROM tbllecture WHERE emailAddress = :email");
    }
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

  
    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = [
            'id' => $user['Id'],
            'email' => $user['emailAddress'],
            'name' => $user['firstName'],
            'role' => $userType,
        ];

        header('Location:home');
        exit();
    } else {
        $errors['login'] = 'Invalid email or password';
        $_SESSION['errors'] = $errors;
    }
}
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}


function display_error($error, $is_main = false)
{
    global $errors;
    if (isset($errors["{$error}"])) {

        echo '<div class="' . ($is_main ? 'error-main' : 'error') . '">
                  <p>' . $errors["{$error}"] . '</p>
           </div>';
    }
    unset($_SESSION['errors']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login to access dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="resources/assets/css/login_styles.css">
   <style>
    .animate-charcter
{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 30% auto;
  color: #fff;
  background-clip: text;

  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 60px;
}

@keyframes textclip {
  to {
    background-position:50% center;
  }
}
    </style>

</head>

<body>
   
   <div>
       <div class="wave"></div>
       <div class="wave"></div>
       <div class="wave"></div>
    
   
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row  justify-content-center w-100">
            <div class="col-8 container col-sm-6 col-md-4 col-lg-4">
                
            <div class="col-md-12 text-center mb-1">
          <h3 class="animate-charcter"><b>Login</b></h3>
            </div>
 
    
            <?php
        display_error('login', true);
        ?>

        <form method="POST" action="">
            <div class="row mb-3 mt-4">
                <div class="col-12">

            <div class="input-group">
            <i class="fas fa-times"></i>
                <select name="user_type" id="" required>
                    <option value="">Select User</option>
                    <option value="lecture">Lecture</option>
                    <option value="administrator">Admin</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">

            <div class="input-group">
            <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <?php
                display_error('email');
                ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">

            <div class="input-group password">
            <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i id="eye" class="fa fa-eye"></i>
                <?php
                display_error('password')
                ?>
            </div>
        </div>
    </div>
    <div class="row mb-2">

    <!-- Link for Forgot Password -->
    <div class="col-8 text-end">
        <p class="recover">
            <a href="forgot.php">Forgot your Password?</a>
        </p>
    </div>
</div>

    <div class="row">
        <div class="col-12">
         
            <input type="submit" class="btn" value="Sign In" name="login">
        </form>
    </div>
</div>
        
    </div>
</div>

</div>
</div>
<script src="resources/assets/javascript/script.js"></script>
</body>

</html>