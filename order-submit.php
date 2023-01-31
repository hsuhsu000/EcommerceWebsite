<?php
session_start();
include("admin/confs/Connection.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql="INSERT INTO orders(name, email, phoneno, address, status, created_date, modified_date) VALUES ('$name','$email','$phone','$address', 0, now(), now())";
$conn->query($sql);
$order_id = $conn->lastInsertId();

foreach($_SESSION['cart'] as $id => $qty) {
    $sql="INSERT INTO order_items (order_id, type_id, qty) VALUES ($order_id,$id,$qty)";
    $conn->query($sql);
}
unset($_SESSION['cart']);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Order Submitted</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Order Submitted</h1>
    <div class="msg">
    Your order has been submitted. We'll deliver the items soon.
    <a href="home.php" class="done">Jewelry Store Home</a>
  </div>
 
 <!-- ##### start of footer #####  -->
	<div class="footer">
	
	<div class="icon">
	<img src="admin\covers\phone-icon-clip-art--royalty--7.png"  width="80%" height="20%">
	<br><br>
	<img src="admin\covers\58485698e0bb315b0f7675a8.png"  width="80%" height="20%">
	<br><br>
	<img src="admin\covers\location-icon-map-png--1.png"  width="80%" height="20%">
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
	<img src="admin\covers\KBZ-pay.png"  width="30%" height="80%">
	<img src="admin\covers\10ddba1ce134c404b310c98f67440098_icon.png"  width="15%" height="80%">
	<img src="admin\covers\credit_card_PNG78.png"  width="20%" height="80%">
	</div>

	<div class="secondrow">
	<img src="admin\covers\363_Visa_Credit_Card_logo-512.png"  width="20%" height="90%">
	<img src="admin\covers\unnamed.png"  width="30%" height="70%">
	</div>
	</div>
	
	<div class="socialmedia">
	<b>Find us On</b><br><br><br>
	<img src="admin\covers\fb.png"  width="20%" height="30%">
	<img src="admin\covers\ig.png"  width="20%" height="30%">
	<img src="admin\covers\twitter.png"  width="20%" height="30%">
	<img src="admin\covers\youtube.png"  width="20%" height="30%">
	</div>
	
	</div>
	<div class="secondfooter">
	&copy;<?php echo date("Y")?>.All right reserved.
	</div>
	<!-- ##### end of footer ##### -->
</body>
</html>


