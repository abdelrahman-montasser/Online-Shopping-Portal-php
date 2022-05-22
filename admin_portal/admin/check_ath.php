<?php
session_start();
if(isset( $_SESSION["admin_id"]) &&  $_SESSION["admin_id"] != "") {
  
    
} else {
    header('location:login.php');
}
?>