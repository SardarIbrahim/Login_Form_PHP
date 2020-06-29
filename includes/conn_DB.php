<?php

$serverName="localhost";
$db_User="root";
$db_Pass="Ibrahim@555";
$db_Name="loginsystem";

$conn=mysqli_connect($serverName,$db_User,$db_Pass,$db_Name);

// If Connection Fails
if(!$conn){
  die('Sorry Some Error Occured').mysqli_connect_error();
}