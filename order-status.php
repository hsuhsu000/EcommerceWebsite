<?php
include("admin/confs/Connection.php");
$id=$_GET['id'];
$status=$_GET['status'];
$sql=$conn->query("UPDATE orders SET status=$status, modified_date=now() WHERE id=$id ");
header("location:orders.php");
?>
