<?php include 'Header.php';
?>

<main>
  <div class="card">
    <?php
    if(isset($_SESSION['userID'])){
     echo "<h2 class='animate'>Welcome You are logged in Successfully</h2>";}
    else{
          echo "<h2 class='animate'> You are not logged in </h2>";}    
?>
    </div>
</main>
