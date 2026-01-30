<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Blockchain Based Health Care Record Sharing System</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="wedlock register form a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css -->
<link rel="stylesheet" href="11/css/style.css" type="text/css" media="all" />
<!--// css -->
<link href="//fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
</head>
<body>
	<section class="agile-header">
		<div class="agile-heading">
			<h1 style="color: #1d1d1d;
    font-weight: 900;
    text-shadow: 2px 2px #d0d0d0;">Blockchain Based Health Care Record Sharing System</h1>
		</div>
		<div class="agile-form">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="agile-email">
					<p>email-address</p>
					<input type="email" name="email" placeholder="email-address" required>
				</div>
				<div class="agile-password">
					<p>Mobile</p>
					<input type="text" name="mobile" placeholder="Mobile" required>
				</div>
				<a href="hospital-log.php">Login</a>
				<div class="agile-submit">
					<input type="submit" value="Login">
				</div>
			</form>
		</div>
		<div class="clear"></div>
		 <footer>
			
		  </footer>
		
	</section>

</body>
</html>

    <?php
require "includes/DB_Functions.php"; 
if(isset($_POST['email']) && isset($_POST['mobile'])){
$name=strip_tags($_POST['email']);
$mobile=($_POST['mobile']); 
$stmt = $db->prepare("SELECT * FROM  hospital WHERE email='$name' AND contact='$mobile'");
$stmt->execute();
if($stmt->rowCount()==1)
{
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

$name=$row['password'];
echo "<script>alert('Your Password is: $name');</script>"; 

}

}
else
{
echo "<script>alert('Sorry You Have Enter Incorrect Email & Mobile');</script>"; 
}
}                    
?> 
