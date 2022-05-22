<?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="/swe2_project/admin/login.php">Go back</a>';