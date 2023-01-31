<?php

include("admin/confs/Connection.php");

$tname=$_POST['tname'];
$pname=$_POST['pname'];
$catid=$_POST['catid'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];
$price=$_POST['price'];

if($cover)
{
    move_uploaded_file($tmp, "admin/covers/$cover");
}

$sql="INSERT INTO types(type_name,product_name,catid,cover,price)
          VALUES('$tname','$pname','$catid','$cover','$price')";

$conn->query($sql);

header("location:product-list.php");

?>
