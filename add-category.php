<?php
include("admin/confs/Connection.php");
if(isset($_GET['insert']))
{
    $name=$_GET['name'];
    $sql="INSERT INTO categories(category_name)VALUES('$name')";
    $conn->query($sql);
}


header("location:category-list.php");

?>
