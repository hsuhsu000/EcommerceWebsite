<html>
<head>
<title>New Phone</title>
<link rel="stylesheet" href="admin/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="nevigation">
 <a href="category-list.php">Manage Category</a>
 <a href="product-list.php">Manage Product</a>
 <a href="orders.php">Manage Orders</a>
 <a href="logout.php">Logout</a>
 </div>


<h1>Add New Product</h1>
<form action="add-product.php" method="post" enctype="multipart/form-data">
<label for="tname">Type Name</label>
<input type="text" name="tname">
<label for="pname">Product Name</label>
<input type="text" name="pname">
<label for="catid">Category Name</label>
<select name="catid" id="cat">
 <option value="0">----Choose----</option>
<?php   
   include("admin/confs/Connection.php");
    $stmt=$conn->query("SELECT id,category_name FROM categories");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
?>
 	<option value="<?php echo $row['id']?>">
 	<?php echo $row['category_name']?>
 	</option>
 <?php 
 }
 ?>
</select>
<br><br>

<label for="cover">Cover</label>
<input type="file" name="cover">
<label for="price">Price</label>
<input type="text" name="price">
<br><br>
<input type="submit" name="new" value="Add Type">
<a href="product-list.php">Back</a>
</form>
</body>
</html>

