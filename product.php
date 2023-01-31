<?php
session_start();
include("admin/confs/Connection.php");
if(isset($_GET['id']))
{
    $catid=$_GET['id'];
    $types=$conn->query("SELECT * FROM types WHERE catid=$catid");
    
}
else if(isset($_GET['search']))
{
    $name=$_GET['search'];
    $types=$conn->query("SELECT * FROM types WHERE type_name='$name'");
}
else{    
    $types=$conn->query("SELECT * FROM types");    
}
$categories=$conn->query("SELECT * FROM categories");
                       
?>

<html>
<head>
<title>Rings and Blings Jewelry Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="header">
	<div class="head">
		<h2 >Rings and Blings Jewelry Store</h2>
	</div>

	<div class="search">
		<form action="" method="get">
			<input type="text" name="search" placeholder="Search by Type" class="box">
			<input type="submit" name="btn" value="search">			
		</form>
	</div>	
</div>


<div class="nevigation">
<a href="home.php">Home</a>
<a href="product.php">Product</a>
<a href="aboutus.php">About us</a>
<a href="contactus.php">Contact us</a>
<a href="faq.php">FAQ</a>
<a href="view-cart.php">Your Cart</a>
</div>

<div class="categorylist">
	<ul class="category">
		<li>
			<b><a href="product.php">All Category</a></b>
		</li>	
		<?php 
		while($row=$categories->fetch(PDO::FETCH_ASSOC))
		{?>				
		<li>		
			<b><a href="product.php?id=<?php echo $row['id']?>">			
			<?php 
			echo $row['category_name'];
			?>	
			</a></b>
		</li>
		<?php 
            }
		?>		
	</ul>
</div>

<div class="productview">
		<ul class="typelist">
			<?php 
			while($row=$types->fetch(PDO::FETCH_ASSOC))
			{?>
			<li>
			<img src="admin/covers/<?php echo $row['cover']?>" height="230" width="200">			
			<a href="product-detail.php?id=<?php echo $row['id']?>">
			<b><?php echo $row['product_name']?></b>
			</a>			
			<i>$<?php echo $row['price']?></i>			
			<b><a href="add-to-cart.php?id=<?php echo $row['id']?>" class="add-to-cart">Add to Cart</a>
			</b>
			</li>			
			<?php 
			}
			?>
		</ul>			
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