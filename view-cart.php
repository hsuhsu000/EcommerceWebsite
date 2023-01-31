<?php
session_start();
if(!isset($_SESSION['cart'])){
    header("location:product.php");
    exit();
}
include("admin/confs/Connection.php");
$unameErr=$pwdErr=$emErr=$phErr=$genErr=$cityErr="";        //set "" to all variables
if ( $_SERVER['REQUEST_METHOD']=="POST")
{
    $_SESSION['auth']=$username;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    
    $username=validDate($username);
    $password=validDate($password);
    $email=validDate($email);
    $phone=validDate($phone);
    $gender=validDate($gender);
    $city=validDate($city);
    
    
    if (empty($username))
    {
        $unameErr="Username is required";   //name=""
    }
    if (empty($password))
    {
        $pwdErr="Password is required"; //password=""
    }
    if (!empty($password))
    {
        $pwdCount=strlen($password);
        if($pwdCount<8)
            $pwdErr="Password must be at least 8 characters";
    }
    
    if (empty($email))
    {
        $emErr="Email is required";       //email=""
    }
    if (!empty($email))
    {
        If( !filter_var($email,FILTER_VALIDATE_EMAIL))     //Check if $email is a valid email address
        $emErr="email format is not valid";
    }
    if (empty($phone))
    {
        $phErr="Phone Number is required";     //phone=""
    }
    if (empty($gender))
    {
        $genErr="Gender is required";   //Gender=""
    }
    if (empty($city))
    {
        $cityErr="City is required";     //name=""
    }
    if(empty($unameErr) && empty($pwdErr) && empty($emErr) && empty($phoneErr) && empty($genErr) && empty($cityErr))
    {
        try{
            $pwd_hash = password_hash($password, PASSWORD_BCRYPT);
            echo "password hash. ".$pwd_hash;
            $stmt = $conn->prepare("insert into user (username,password,email,phone,gender,city) values (?,?,?,?,?,?)");
            $stmt->execute([$username,$pwd_hash,$email,$phone,$gender,$city]);
            $rcount = $stmt->rowCount();// affected row - inserted row
            if ($rcount == 1){
                echo "inserted successfully";
                header("location:order-form.php");
            }
            else echo "insert failure";
            
        }catch(PDOException $e)
        {
            echo $e->getMessage()." error code ". $e->getCode();
        }
    }    
}
function validDate($data)
{
    $data= trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);//change from special character < > to &lt; &gt;
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
    
    <p style="color:brown; text-align: left;font-size: 20px ;">Dear Customer, please complete the page registration before logging in, if you don't have an account already.</p>
     
     
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <fieldset><legend><h3 style="color:brown;">Registration Form</h3></legend>
                <span style="color:red"> <?php if(isset($unameErr))echo $unameErr;?></span><br>
                    User Name <input type="text" name="username"  placeholder="enter username" required autofocus><br>
                <span style="color:red"><?php  if(isset($pwdErr))echo $pwdErr;?></span><br>
                    Password&nbsp;&nbsp;&nbsp; <input type="password" name="password"  placeholder="enter password" required ><br>
                <span style="color:red"><?php if(isset($emErr))echo $emErr;?></span><br>
                    Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email"  placeholder="enter email" required ><br>
                <span style="color:red"><?php if(isset($phErr))echo $phErr;?></span><br>
                    Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phone"  placeholder="enter phone" required ><br>
                <span style="color:red"><?php if(isset($genErr))echo $genErr;?></span><br>
                    gender&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;female <input type="radio" name="gender"  value="F"> Male <input type= "radio" name="gender" value="M"> 
                <span style="color:red"><?php if(isset($cityErr))echo $cityErr;?></span><br>
                <br>City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="city">
                    <option>select City </option>
                    <option value="Yangon">Yangon</option>
                    <option value="Mandalay">Mandalay</option>
                    <option value="NayPyiTaw">NayPyiTaw</option>
                    <option value="Bago">Bago</option>
				</select>
			
			<input type="submit" value="Register"></fieldset>
		</form>
	<p style="color:brown; text-align: left;font-size: 20px ;">If you have already an account, plz click into Login Form!!!!</p>
	<a href="login1.php">Login Form</a>
	<a href="home.php">Home</a>
    
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