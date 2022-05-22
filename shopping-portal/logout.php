<?php
session_start();
if(isset($_SESSION["username"])){
	
session_destroy();
echo 'You have been logged out. <a href="login.php">Go back</a>';
}