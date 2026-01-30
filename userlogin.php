<?php
session_start();
if(isset($_SESSION['name']))
{
}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>HEALTH CARE RECORD SHARING SYSTEM WITH DATA ENCRYPTION TECHNIQUES.  
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
</head>
<body style="background-image:url(images/shutterstock_509910508_crytprographic_algerithmcfaithie.jpg);">
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				HEALTH CARE RECORD SHARING SYSTEM WITH DATA ENCRYPTION TECHNIQUES.
	
			</a>
            		
			<a class="brand" href="registerusers.php" style="float:right;">
				Register
	
			</a>
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="signup.html" class="">
							
						</a>
						
					</li>
					
					<li class="">						
						<a href="index.html" class="">
							
							
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		</div> <!-- /navbar-inner -->
        </div> <!-- /navbar -->
<?php
require "includes/DB_Functions.php"; 
if(isset($_POST['username']) && isset($_POST['password'])){
$name=strip_tags($_POST['username']);
$password=strip_tags($_POST['password']); 
$stmt = $db->prepare("SELECT * FROM register_user WHERE Staff_Email='$name' AND Staff_Password='$password'");
$stmt->execute();
if($stmt->rowCount()==1)
{
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$idss=$row['ID'];$user_private_key=$row['user_private_key'];$user_public_key=$row['user_public_key'];	
$name=$row['Staff_Name']." ".$row['Staff_Surname'];
}
$_SESSION['name']=$name;$_SESSION['userid']=$idss;

$_SESSION['user_private_key']=$user_private_key;
$_SESSION['user_public_key']=$user_public_key;


$session_id=$_SESSION['session_id']=rand(1111,3333);
$private_key=$_SESSION['private_key']=rand(4444,7777);
$public_key=$_SESSION['public_key']=rand(8888,9999);



$stmt3 = $db->prepare("INSERT INTO `key_generation_session`(`session_id`, `public_key`, `private_key`) VALUES ('$session_id','$public_key','$private_key')");
$stmt3->execute();
echo "<script>window.location='folder.php?id=keys';</script>";

}
else
{
echo "<script>alert('Sorry You Have Enter Incorrect Email & Password');</script>"; 
}
}                    
?> 

<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="index.php" method="POST">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					
				</span>
									
				<input type="submit" value="LOG IN" class="button btn btn-success btn-large">
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
