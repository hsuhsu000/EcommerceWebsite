<html>
<head>
<title>Type List</title>
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

<h1>Product List</h1>
<?php 
    
    include("admin/confs/Connection.php");
    $stmt=$conn->query("SELECT types.*,categories.category_name 
                        FROM types LEFT JOIN categories
                        ON types.catid=categories.id
                        ");
?>
<ul class="product">
	<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)){?>

		<li>
		<img src="admin/covers/<?php echo $row['cover']?>"
			alt="" align="left" height="200" width="180">
			
		<b>Type Name    :<?php echo $row['type_name']?></b><br>
		<i>Product Name :<?php echo $row['product_name']?></i><br>
		<i>Category Name:<?php echo $row['category_name']?></i>
		<div>Price		:<?php echo $row['price']?>MMK</div>
		
		[<a href="del-product.php?id=<?php echo $row['id']?>">del</a>]
		[<a href="edit-product.php?id=<?php echo $row['id']?>">edit</a>]		
		<br><br><br><br><br><br>
		</li>
		<?php 
            }
		?>
	
</ul>
<a href="new-product.php" class="new">New Product</a>	
</body>
</html>
