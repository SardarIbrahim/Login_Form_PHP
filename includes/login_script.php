<?php 

if(isset($_POST['login-btn'])){


  require_once 'conn_DB.php';

  // Grabbing Inputs
  $userName=$_POST['name'];
  $userPass=$_POST['password'];

  if(empty($userName) OR empty($userPass)){
    header("Location: ../index.php?error=fieldsempty");
  }
  else{

    $sql= "SELECT * FROM users WHERE uiduser=? OR Email=?;";

    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../index.php");
      exit();
    }
    else{

      mysqli_stmt_bind_param($stmt,"ss",$userName,$userName);

      mysqli_stmt_execute($stmt);

      $result=mysqli_stmt_get_result($stmt);

      if($row=mysqli_fetch_assoc($result)){


        // password check
        $password=password_verify($userPass,$row['Pass']);

        if(!$password){
          header("Location: ../index.php?error=WrongPassword");
          exit();
        }
        else{
          // Starting Session

          session_start();

          $_SESSION['userID']=$row['User_id'];
          $_SESSION['userName']=$row['uiduser'];

          header("Location: ../index.php?Login=Success");
          exit();
        }
      }
      else{
        header("Location: ../index.php?error=NoUser");
        exit();
      }
    }
  }
}
else{
  header("Location: ../index.php");
  exit();
}