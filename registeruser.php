 	 <?php
session_start();
if(!isset($_SESSION['name']))
{
//header("location:index.php");	
}
if($_SESSION['name']=="kasat")
{
}
else{

}

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Simple Consultant</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
  
  </head>

<body>

<?php require "includes/header.php"; ?>
<?php require "includes/menu.php"; ?>
    
    

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      
	      
	      <div class="widget ">
	      	
	      	<div class="widget-header"><a href=""><span class="btn btn-primary" style="float:right; margin:5px;">Select Staff Type Again</span> </a>
	      <i class="icon-user"></i>
	  
	      <h3>Register User and Set Privileges</h3>
          <a href="home.php"><span class="btn btn-primary" style="float:right; margin:5px;">Home</span> </a>
	  </div> <!-- /widget-header -->
	
	<div class="widget-content">



<form method="POST" action="registeruser.php">
<fieldset>
<div class="control-group">
<label class="control-label" for="firstname">Staff Name</label>
<div class="controls">
<input type="text" class="span6" required id="firstname" value="" name="Staff_Name">
</div> <!-- /controls -->
</div> <!-- /control-group -->
<div class="control-group">
<label class="control-label" for="radiobtns">Staff Surname</label>
<div class="controls">
<input type="text" class="span6" required id="firstname" value="" name="Staff_Surname">
</div> <br>
<div class="control-group">
<label class="control-label" for="radiobtns">Staff Date of Joining</label>
<div class="controls">
<input type="date" class="span6" required id="DOJ" value="" name="DOJ">
</div> <br>
<div class="control-group">
<label class="control-label" for="lastname">Staff Email</label>
<div class="controls">
	<input type="text" class="span6" required name="Staff_Email" id="lastname" value="">
</div> <!-- /controls -->
	</div> <!-- /control-group -->
<div class="control-group">
<label class="control-label" for="email">Staff Password</label>
<div class="controls">
	<input type="text" class="span6" required name="Staff_Password" >
    <input type="hidden"  name="type" value="Salary">
</div> <!-- /controls -->
	</div> <!-- /control-group -->
    
  <div class="control-group">
<label class="control-label" for="email"><strong>Staff Privileges</strong></label>
<div class="controls">

<input type="checkbox" name="salary[]" value="Project_Creation" >
Project Creation<br>
<input type="checkbox" name="salary[]" value="Material_Requirment" >
Material_Requirmen<br>
<br>
<h4>Daily Entry</h4>
<input type="checkbox" name="salary[]" value="Supplier_Entry" >
Supplier Entry<br>
<input type="checkbox" name="salary[]" value="Staff_Payment_Entry" >
Staff Payment Entry<br>
<input type="checkbox" name="salary[]" value="Labour_Entry" >
Labour Entry<br>
<input type="checkbox" name="salary[]" value="Payment_Received" >
Payment Received<br>
<br>
<h4>Payments</h4>

<input type="checkbox" name="salary[]" value="Labour_Payment" >
Labour Payment<br>
<input type="checkbox" name="salary[]" value="Staff_Payment" >
Staff Payment<br>
<input type="checkbox" name="salary[]" value="Supplier_Payment" >
Supplier Payment<br>
<br>
<h4>Setups</h4>

<input type="checkbox" name="salary[]" value="Voucher_Assign" >
Voucher Assign<br>
<input type="checkbox" name="salary[]" value="other" >
Others<br>
<br>
<input type="checkbox" name="salary[]" value="inventory" >
Inventory<br>
<input type="checkbox" name="salary[]" value="DMS" >
Document Management System<br>


     
</div> <!-- /controls -->
	</div>
    <div class="controls">
<input type="submit" value="Submit">
<input type="reset" value="Cancle">
</form>


</div>
</div> <!-- /widget-content -->

</div> <!-- /widget -->
	      
    </div> <!-- /span8 -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /main-inner -->
</div> <!-- /main -->
<?php include "includes/footer.php"; ?>
<?php
require "includes/connection.php";
require "includes/DB_Functions.php";
?>
<?php
if(isset($_POST['Staff_Name']) && isset($_POST['Staff_Surname']) && isset($_POST['DOJ']) 
&& isset($_POST['Staff_Email']) && isset($_POST['Staff_Password']) && isset($_POST['type'])){
$Staff_Name=$_POST['Staff_Name'];
$Staff_Surname=$_POST['Staff_Surname'];
$Staffjoining=$_POST['DOJ'];
$Staff_Email=$_POST['Staff_Email'];
$Staff_Password=$_POST['Staff_Password'];
$type=$_POST['type'];
if(Register($Staff_Name,$Staff_Surname,$Staffjoining,$Staff_Email,$Staff_Password,$type)==1)
{
$stmt = $db->prepare("SELECT * FROM register_staff order by ID DESC LIMIT 1");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$id=$row['ID'];
}
echo "<script>alert('Data Inserted Succesfully')</script>";
}
else
{
echo "<script>alert('User is Already Register!!');</script>";
}
}
if(isset($_POST['know']))
{
if(!empty($_POST['know'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['know'] as $selected){
$selected;
$result_explode = explode(':', $selected);
$Project_ID=$result_explode[0];
$project_name=$result_explode[1];
user($Project_ID,$project_name,$id);
}
}
}
if(isset($_POST['salary']))
{
if(!empty($_POST['salary'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['salary'] as $selected){
$selected;
salary($selected,$id);
}
}
}
?>


<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>


  </body>

</html>
