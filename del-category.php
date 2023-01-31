<?php
include("admin/confs/Connection.php");
$id=$_GET['id'];
$stmt=$conn->prepare("DELETE FROM categories where id=$id");
$stmt->execute([$id]);
header("location: category-list.php");
?>