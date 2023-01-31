<html>
<head>
<title>Category List</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="admin/css/style.css">
</head>
<body>
<div class="nevigation">
 <a href="category-list.php">Manage Category</a>
 <a href="product-list.php">Manage Product</a>
 <a href="orders.php">Manage Orders</a>
 <a href="logout.php">Logout</a>
 </div>
<h1 align="center">Category List</h1>
<?php 
include("admin/confs/Connection.php");
$stmt=$conn->query("SELECT * FROM categories");
?>
<ul class="catlist">
<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{?>
	<li title="<?php echo $row['id']?>">
		[<a href="del-category.php?id=<?php echo $row['id']?>">Del</a>]
    	[<a href="edit-category.php?id=<?php echo $row['id']?>">Edit</a>]
    	<?php echo $row['category_name']?>
	</li>
<?php }?>
</ul>
<a href="new-category.php" class="new">Add New Category</a>
</body>
</html>