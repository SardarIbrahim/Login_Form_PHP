<?php 
// Starting Session
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="signup.css">
  <title>Login And Register</title>
</head>
<body>
<header>
    <div class="container">
    <nav>  
    <h1><span>Lets</span> FLy</h1>

    <?php  
    if(isset($_SESSION['userID'])) {
    echo '<div>
      <form action="includes/logout.php" method="POST">
        <button type="submit" class="btn-login" name="logout">Log Out</button>
      </form>
      </div>';
    }
    else{
         echo    '<div>
                <form action="includes/login_script.php" method="POST">
                <input type="text" name="name" placeholder="Enter Your Name">
                <input type="password" name="password" placeholder="Enter Your Password">
                <input type="submit"  name="login-btn" value="Log In" class="btn-login">
              </form>  
            </div>
      
            <div>
            <a href="signup.php" class="btn-login">Sign Up</a>
          </div>';
    }
    ?>
      </nav>
    </div>
  </header>
</body>
</html>