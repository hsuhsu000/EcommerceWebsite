<?php
try 
{
    $conn=new PDO('mysql:host=localhost;dbname=jewelryshop',"root","");//connect database server
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//catch DDD error
} 
catch (Exception $e) 
{
    echo "Connection failed".$e->getMessage();
}
?>
