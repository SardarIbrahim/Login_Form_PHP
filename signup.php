<?php include 'Header.php' ?>

<main class="container">
    <div class="card">
      <h2><span>Register Here</span></h2>

      <?php 
      if(isset($_GET['error'])){
        if($_GET['error']=='emptyfields'){
          echo '<h4 class="animate">Please fill in all fields</h4>';
        }
        elseif($_GET['error']=='invalidnameemail'){
          echo '<h4 class="animate">Please put valid name and email</h4>';
        }
        elseif($_GET['error']=='InvalidEmail'){
          echo '<h4 class="animate">Please enter valid email</h4>';
        }
        elseif($_GET['error']=='InvalidName'){
          echo '<h4 class="animate">Please enter valid name</h4>';
        }
        elseif($_GET['error']=='PasswordCheck'){
          echo '<h4 class="animate">Please enter correct password again</h4>';
        }
        elseif($_GET['error']=='usernameTaken'){
          echo '<h4 class="animate">UserName Taken..</h4>';
        }
        
      }
      else if(isset($_GET['signup'])=='success'){
        echo '<h4 class="animate">Signed up successfully</h4>';
      }
      
      ?>
      <form class="form-group" action="includes/signup_script.php" method="POST">

          <input type="text" id="name" name="name" placeholder="Enter Name" autocomplete="off">
        
          <input type="email" id="email" name="email" placeholder="Enter Email" autocomplete="off">
      
          <input type="password" name="password" id="pass" autocomplete="off" placeholder="Enter Password" required>
        
          <input type="password" name="password-repeat" id="pass" autocomplete="off" placeholder="Repeat Password" required>
        


        <div class="input">
          <button type="submit" name="sign-submit" class="btn-submit">Sign up</button>
        </div>
      </form>
    </div>
  </main>