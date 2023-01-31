<?php
include("admin/confs/Connection.php");
$id=$_POST['id'];
$name=$_POST['name'];
$stmt=$conn->prepare("UPDATE categories SET category_name='$name' WHERE id=$id");
$stmt->execute([$name,$id]);
header("location: category-list.php");
?>