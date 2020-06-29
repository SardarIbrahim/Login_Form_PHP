<?php

if(isset($_POST['sign-submit'])){
  
  // Including The Connection File Here

  require_once 'conn_DB.php';

  // Grabbing Inputs

  $userName=htmlentities($_POST['name']);
  $userEmail=htmlentities($_POST['email']);
  $userPass=$_POST['password'];
  $passRepeat=$_POST['password-repeat'];

  if(empty($userName) OR empty($userEmail) OR empty($userPass) OR empty($passRepeat)){

    // Setting Up The Values in the fields that are correct in URL
    header("Location: ../signup.php?error=emptyfields&name=".$userName."&email=".$userEmail);

    // Not letting the script to run if mistake is made
    exit();
  }

  elseif(!filter_var($userEmail,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$userName)){
    header("Location: ../signup.php?error=invalidnameemail");
    exit();
  }

  elseif(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
    header("Location:../signup.php?error=InvalidEmail&name=".$userName);
    exit();
  }

  elseif(!preg_match("/^[a-zA-z0-9]*$/",$userName)){
    header("Location:../signup.php?error=InvalidName&email=".$userEmail);
    exit();
  }

  // Checking For Password 
  elseif($userPass !==$passRepeat){
    header("Location:../signup.php?error=PasswordCheck&email=".$userEmail."&name=".$userName);
    exit();
  }
  else
  {
    // UserName is taken or not connecting to DB

    $sql= "SELECT uiduser FROM users WHERE uiduser=?";

    // Using Prepared Statments for efficiently executing repeated SQL code 
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location:../signup.php?error=sqlerrortop");
      exit();
    }
    else{

      mysqli_stmt_bind_param($stmt,"s",$userName);

      mysqli_stmt_execute($stmt);

      mysqli_stmt_store_result($stmt);

      $resultCheck= mysqli_stmt_num_rows($stmt);

      if($resultCheck > 0){
        header("Location: ../signup.php?error=usernameTaken&email=".$userEmail);
        exit(); 
      }
      else{

        // Inserting Data
        $sql= "INSERT INTO users (uiduser,Email,Pass) VALUES (?,?,?)";
     
       // Using Prepared Statments for efficiently executing repeated SQL code 
       $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../signup.php?error=sqlerror");
      exit();

      }
      else{
        // Hashing Password Using B-Cript
        $hasedPass= password_hash($userPass,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"sss",$userName,$userEmail,$hasedPass);

        mysqli_stmt_execute($stmt);
  
        mysqli_stmt_store_result($stmt);

        header("Location: ../signup.php?signup=success");
      }

    }


  }

}
// Closing Statements and Connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

else{
  header("Location: ../signup.php");
}