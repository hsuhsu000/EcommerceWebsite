<?php
include("admin/confs/Connection.php");
$id=$_GET['id'];
$stmt=$conn->prepare("DELETE from types where id=$id");
$stmt->execute([$id]);
header("location:product-list.php");
?>