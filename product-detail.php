<!Doctype html>
<html>
<head>
<title>Product Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Product Detail</h1>
<?php 
include("admin/confs/Connection.php");
$id=$_GET['id'];
$type=$conn->query("SELECT * FROM types WHERE id=$id");
$row=$type->fetch(PDO::FETCH_ASSOC);
?>

<div class="detail">
<a href="product.php" class="back">&laquo; Go Back</a>
<br><br><br>
<img src="admin/covers/<?php echo $row['cover']?>">

<h2>Product Name:<?php echo $row['product_name']?></h2>
<h2>Price:<?php echo $row['price']?>MMK</h2>
<h2>Product Type:<?php echo $row['type_name']?></h2>
<a href="add-to-cart.php?id=<?php echo $id?>" class="add-to-cart">Add to cart</a>
</div>

<!-- ##### start of footer #####  -->
	<div class="footer">	
	<div class="icon">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\phone-icon-clip-art--royalty--7.png"  width="80%" height="20%">
	<br><br>
	<img src="D:\HND\E-Commerce\SHEIN\New folder\58485698e0bb315b0f7675a8.png"  width="80%" height="20%">
	<br><br>
	<img src="D:\HND\E-Commerce\SHEIN\New folder\location-icon-map-png--1.png"  width="80%" height="20%">
	</div>
	
	<div class="info">
	<b>09782253965</b><br><br>
	<b>ringsandblings002@gmail.com</b><br><br>
	<b>No 808, 8th Street, Thamaing 1 quarter, 
	Mayangone Township</b>	
	</div>
		
	<div class="payment">
	<b>We Accept</b><br><br>	
	<div class="firstrow">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\KBZ-pay.png"  width="30%" height="80%">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\10ddba1ce134c404b310c98f67440098_icon.png"  width="15%" height="80%">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\credit_card_PNG78.png"  width="20%" height="80%">
	</div>

	<div class="secondrow">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\363_Visa_Credit_Card_logo-512.png"  width="20%" height="90%">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\unnamed.png"  width="30%" height="70%">
	</div>
	</div>
		
	<div class="socialmedia">
	<b>Find us On</b><br><br><br>
	<img src="D:\HND\E-Commerce\SHEIN\New folder\fb.png"  width="20%" height="30%">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\ig.png"  width="20%" height="30%">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\twitter.png"  width="20%" height="30%">
	<img src="D:\HND\E-Commerce\SHEIN\New folder\youtube.png"  width="20%" height="30%">	
	</div>
	
	</div>	
	<div class="secondfooter">
	&copy;<?php echo date("Y")?>.All right reserved.
	</div>
	<!-- ##### end of footer ##### -->
</body>
</html>


