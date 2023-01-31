<html>
<head>
<title>Edit Category</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="admin/css/style.css">
</head>
<body>
<h1>Edit Category</h1>
<?php 
include("admin/confs/Connection.php");
$id=$_GET['id'];
$stmt=$conn->prepare("SELECT * FROM categories WHERE id=$id");
$stmt->execute([$id]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<form action="update-category.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
<label for="name">Category Name</label>
<input type="text" name="name" value="<?php  echo $row['category_name']?>">
<br><br>
<input type="submit" value="Update Category">
<a href="category-list.php">Back</a>
</form>
</body>
</html>
