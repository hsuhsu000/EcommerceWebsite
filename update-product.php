<?php
include("admin/confs/Connection.php");
$id=$_POST['id'];
$tname=$_POST['tname'];
$pname=$_POST['pname'];
$catid=$_POST['catid'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];
$price=$_POST['price'];

if($cover)
{
    move_uploaded_file($tmp, "admin/covers/$cover");
    $sql="UPDATE types SET type_name='$tname',product_name='$pname',
        catid='$catid',cover='$cover',price='$price' WHERE id=$id";
}
else {
    $sql="UPDATE types SET type_name='$tname',product_name='$pname',
        catid='$catid',price='$price' WHERE id=$id";
}
$conn->query($sql);
header("location:product-list.php");
?>