<?php
session_start();
include("admin/confs/Connection.php");
//include_once "databaseConnection.php";
//include_once "design.php";
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
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
    <p style = "color:brown; text-align: left;font-size: 20px ; padding-top: 50px;">If you already have an account, plz log in!!!!</p>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"method="post">
        <fieldset><legend><h2>User Login Form</h2></legend>
        <span style="color:red"><?php if( isset($uErr)) echo $uErr ?></span><br>
        User Name <input type="text" name="username" placeholder="Enter User Name" autofocus required><br>
        <span style="color:red"><?php if( isset($pErr)) echo $pErr ?></span><br>
        Password &nbsp;&nbsp; <input type="password" name="password" placeholder="Enter Password"  required><br><br>
        <input type="submit" value="Login">
        </fieldset>
        </form>
        <a href="view-cart.php">Back</a>
        
        <br><br><br><br><br><br>
        
        
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

