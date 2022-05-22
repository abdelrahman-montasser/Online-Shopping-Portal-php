<?php
session_start();
if(isset( $_SESSION["username"]) &&  $_SESSION["username"] != "" ) {
  
    
} else {
    header('location:login.php');
}
?>