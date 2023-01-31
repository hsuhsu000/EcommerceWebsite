<?php
 session_start();
 unset($_SESSION["name"]);
 unset($_SESSION["password"]);
 echo 'You have cleaned session';
 header("location: login.php");
 ?>
 