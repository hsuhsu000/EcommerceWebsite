<html>
<head>
<title>Admin_Index</title>
<link rel="stylesheet" href="admin/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1 class="login_header">Admin Login Form</h1>
<div>
	<div class="login_img">
		<?php echo"<img src='D:\HND\E-Commerce\SHEIN\unnamed.png' style='width:100%; height:100%'>";?>
	</div>

	<div class="form">
		<form action="" method="GET">
		<label for="name">Name</label>
		<input type="text" placeholder="Enter Username" name="name" id="name"><br>
		<label for="password">Password</label>
		<input type="password" placeholder="Enter Password" name="password" id="password"><br>
		<input type="submit" name="btnsubmit" value="Submit">
		</form>
	</div>
	
	<div class="error">
	<?php
        session_start();
            if(isset($_GET['btnsubmit'])){
                if($_GET['name']=='admin' and $_GET['password']==123){
                $_SESSION['auth']=true;
                echo "Your UserName and Password is Correct";
                header("location:category-list.php");
            }
            else{
                echo '<p align="right">*****Wrong UserName or Password.Try Again!!******</p>';
            }
        }
    ?>
	</div>
</div>
</body>
</html>


