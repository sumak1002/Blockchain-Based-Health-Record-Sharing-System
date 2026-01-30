
<!DOCTYPE html>
<html lang="en">
<head>
<title>Blockchain Based Healthcare Record Management System</title>
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
    text-shadow: 2px 2px #d0d0d0;">Blockchain Based Healthcare Record Management System</h1>
		</div>
		<div class="agile-form">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="agile-email">
					<p>email-address</p>
					<input type="email" name="email" placeholder="email-address" required>
				</div>
				<div class="agile-password">
					<p>password</p>
					<input type="password" name="password" placeholder="password" required>
				</div>
				<div class="agile-profile">
					
					<p>Complete Hospital Name Name</p>
					<input type="text" name="username" placeholder="Full Name">
				</div>
				
				<div class="agile-profile">
					<p>Contact Number</p>
					<input type="text" name="Contact" placeholder="Contact Number">
				</div>
				<div class="agile-profile">
					<p>Address</p>
					<textarea type="text" name="Address" style="width:100%;height:50px;" placeholder="Address"></textarea>
				</div>
				<div class="agile-profile">
					<p>Treatment provided by Hospital. (describe each treatment)</p>
					<textarea type="text" name="Treatment" style="width:100%;height:50px;" placeholder="Address"></textarea>
				</div>

	<div class="agile-profile">
					<p>Hospital Pic</p>
					<input type="file" name="file" required>
				</div>

				<div class="agile-submit">
					<input type="submit" value="register">
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
	   require "includes/connection.php";
	   require "includes/DB_Functions.php";
if(isset($_POST['email'])){
$email=$_POST['email'];
$password=($_POST['password']);

$username=$_POST['username'];

$Contact=$_POST['Contact'];
$Address=$_POST['Address'];
$Treatment=$_POST['Treatment'];
$image=$_FILES['file']['name'];


if(Hospital_logins($email,$password,$username,$Contact,$Address,$Treatment,$image)==1)
{
	$image=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
$location='dms/';
move_uploaded_file($tmp_name,$location.$image);

$stmt = $db->prepare("SELECT * FROM patient order by ID DESC LIMIT 1");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	
$id=$row['ID'];
}
echo "<script>alert('Hospital Registered Succesfully!!');window.location.href='index.php'</script>";
}
else
{
echo "<script>alert('Hospital is Already Register!!');</script>";
}

}

?>
