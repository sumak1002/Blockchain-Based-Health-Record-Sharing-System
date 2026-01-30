<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Secure cloud storage system  
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
			
			<a class="brand" href="index.php">
				HEALTH CARE RECORD Management SYSTEM WITH DATA ENCRYPTION TECHNIQUES.
	
			</a>
             		
			<a class="brand" href="index.php" style="float:right;">
				Login
	
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
?>

<div class="account-container">
	
	<div class="content clearfix">
		
		

<form method="POST" action="registerusers.php">
<fieldset>
<div class="control-group">
<label class="control-label" for="firstname"> Name</label>
<div class="controls">
<input type="text" class="span3" required id="firstname" value="" name="Staff_Name">
</div> <!-- /controls -->
</div> <!-- /control-group -->
<div class="control-group">
<label class="control-label" for="radiobtns"> Surname</label>
<div class="controls">
<input type="text" class="span3" required id="firstname" value="" name="Staff_Surname">
</div> <br>

<div class="control-group">
<label class="control-label" for="lastname"> Email</label>
<div class="controls">
	<input type="text" class="span3" required name="Staff_Email" id="lastname" value="">
</div> <!-- /controls -->
	</div> <!-- /control-group -->
<div class="control-group">
<label class="control-label" for="email"> Password</label>
<div class="controls">
	<input type="password" class="span3" required name="Staff_Password" >
    <input type="hidden"  name="type" value="Salary">
</div> <!-- /controls -->
	</div> <!-- /control-group -->
    
  
    <div class="controls">
<input type="submit" value="Submit" class="btn btn-info">
<input type="reset" value="Cancel" class="btn btn-danger">
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



<?php
require "includes/connection.php";

?>
<?php
if(isset($_POST['Staff_Name'])){
$Staff_Name=$_POST['Staff_Name'];
$Staff_Surname=$_POST['Staff_Surname'];
$Staffjoining="";
$Staff_Email=$_POST['Staff_Email'];
$Staff_Password=$_POST['Staff_Password'];

$Staff_Email=$_POST['Staff_Email'];
$Staff_Password=$_POST['Staff_Password'];
function rand_code($len)
{
 $min_lenght= 0;
 $max_lenght = 100;
 $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 $smallL = "abcdefghijklmnopqrstuvwxyz";
 $number = "0123456789";
 $bigB = str_shuffle($bigL);
 $smallS = str_shuffle($smallL);
 $numberS = str_shuffle($number);
 $subA = substr($bigB,0,5);
 $subB = substr($bigB,6,5);
 $subC = substr($bigB,10,5);
 $subD = substr($smallS,0,5);
 $subE = substr($smallS,6,5);
 $subF = substr($smallS,10,5);
 $subG = substr($numberS,0,5);
 $subH = substr($numberS,6,5);
 $subI = substr($numberS,10,5);
 $RandCode1 = str_shuffle($subA.$subD.$subB.$subF.$subC.$subE);
 $RandCode2 = str_shuffle($RandCode1);
 $RandCode = $RandCode1.$RandCode2;
 if ($len>$min_lenght && $len<$max_lenght)
 {
 $CodeEX = substr($RandCode,0,$len);
 }
 else
 {
 $CodeEX = $RandCode;
 }
 return $CodeEX;
}
$private=rand_code(8);
$public=rand_code(8);
if(Register($Staff_Name,$Staff_Surname,$Staffjoining,$Staff_Email,$Staff_Password,$private,$public)==1)
{
$stmt = $db->prepare("SELECT * FROM register_staff order by ID DESC LIMIT 1");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$id=$row['ID'];
}
echo "<script>alert('User Registered Succesfully!!');window.location.href='index.php'</script>";
}
else
{
echo "<script>alert('User is Already Register!!');</script>";
}

}

?>
