<?php
session_start();
if(!isset($_SESSION['cart'])){
    header("location:product.php");
    exit();
}
include("admin/confs/Connection.php");


if($_SERVER['REQUEST_METHOD']=="POST")
{
    $uErr=$pErr="";
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $username=valid($username);
    $password=valid($password);
    if(empty($username))
    {
        $uErr="Username should not be space";
    }
    if(empty($password))
    {
        $pErr="Password should not be space";
    }
    if(!empty($username) && !empty($password))
    {
        $stmt=$conn->prepare("Select id,password from user where username=?");
        //$hash_code = password_hash($password, PASSWORD_BCRYPT);
        $stmt->execute([$username]); // specific uesrname value from form field
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
        //user password/hascode from table
        if(password_verify($password, $row['password']))
        {
            $_SESSION['id']=$row['id'];
            $_SESSION['uname']=$username;
            $_SESSION['isLoggedIn']= true;
            header("location:order-form.php");
        }
        else $uErr="username or password incorrect";
        
    }
}
function valid($data)
{
    $data=trim($data);//" ayeaye  "--->"ayeaye"
    $data=stripcslashes($data);//remove slashes
    $data=htmlspecialchars($data);//<script>Attacked</script>---->&1t; convert special character<>->&it
    return $data;
}





?>

<html>
<head>
<title>View Cart</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>View Cart</h1>
	<div class="categorylist">
	<ul>
		<li><a href="product.php">&laquo; Continue Shopping</a></li>
		<li><a href="clear-cart.php" class="del">&times; Clear Cart</a></li>
	</ul>
	</div>

	<div class="productview">
	<table>
		<tr>
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Unit Price</th>
		<th>Price</th>
		</tr>
	
	<?php 
	$total=0;
	foreach ($_SESSION['cart'] as $id=>$qty):
	   $result=$conn->prepare("SELECT product_name, price FROM types WHERE id=$id");
	   $result->execute(['$id']);
	   $row=$result->fetch(PDO::FETCH_ASSOC);
	   $total+= $row['price'] * $qty;
	?>
	
	<tr>
		<td><?php echo $row['product_name']?></td>
		<td><?php echo $qty?><?php ?>
		<td><?php echo $row['price']?></td>
		<td><?php echo $row['price'] * $qty ?></td>
	</tr>
	<?php endforeach; ?>
	
	<tr>
		<td colspan="3" align="right"><b>Total:</b></td>
		<td><?php echo $total;?></td>
	</tr>
	</table>
	
	<div class="order-form">
    
    
    <h2> Order Now </h2>
    <form action="order-submit.php" method="post">
     <label for="name">Your Name </label>
     <input type="text" name="name" id="name">
     
     <label for="email">Email</label>
     <input type="text" name="email" id="email">
     
     <label for="phone">Phone</label>
     <input type="text" name="phone" id="phone">
     
     <label for="address">Address</label>
     <textarea name="address" id="address"></textarea>
     
     <br><br>
     <input type="submit" value="Submit Order">
     <a href="home.php"> Continue Shopping</a>   
     
    </form>
   </div>
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