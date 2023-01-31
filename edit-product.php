<html>
<head>
<title>Edit Type</title>
<link rel="stylesheet" href="admin/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php 
include("admin/confs/Connection.php");
$id=$_GET['id'];
$result=$conn->prepare("SELECT * FROM types WHERE id=$id");
$result->execute(['$id']);
$row=$result->fetch(PDO::FETCH_ASSOC);
?>
<h1>Edit Product</h1>
<form action="update-product.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<label for="tname">Type Name</label>
<input type="text" name="tname" id="tname" value="<?php echo $row['type_name']?>">
<label for="pname">Product Name</label>
<input type="text" name="pname" id="pname" value="<?php echo $row['product_name']?>">
<label for="catid">Category Name</label>
<select name="catid" id="catid">
<option value="0">----Choose----</option>
<?php    
    $stmt=$conn->prepare("SELECT id,category_name FROM categories");
    $stmt->execute();
    while($categories=$stmt->fetch(PDO::FETCH_ASSOC))
    {
?>
 	<option value="<?php echo $categories['id']?>"
 	<?php if($categories['id']==$row['catid']) echo "selected"?>>
 	<?php echo $categories['category_name']?>
 	</option>
 <?php 
 }
 ?>
</select>
<br><br>

<img src="admin/covers/<?php echo $row['cover']?>" alt="" height="150">
<label for="cover">Change Cover</label>
<input type="file" name="cover" id="cover">
<label for="price">Price</label>
<input type="text" name="price" id="price" value="<?php echo $row['price']?>">
<br><br>
<input type="submit" name="new" value="Update Product">
<a href="product-list.php">Back</a>
</form>
</body>
</html>
