<html>
<head>
<title>Add Category</title>
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

<h1>Add Category</h1>
<form action="add-category.php" method="get">
<label for="name"> Category Name</label>
<input type="text" name="name">
<input type="submit" name="insert" value="Add Category"><br><br>
<a href="category-list.php">Back</a>
</form>
</body>
</html>

