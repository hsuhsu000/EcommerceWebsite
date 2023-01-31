<?php 
session_start();
if(!isset($_SESSION['auth']))
{
    header("location: admin_index.php");
    exit();
}


?>