<center><h1><?php
session_start();
if(!isset($_SESSION['name']))
{
//header("location:index.php");	
}

	


?></h1>

</center>
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
<link rel="stylesheet" href="css/popup.css" media="all">
<link rel="stylesheet" href="css/mycss.css" media="all">
   <style>
   .custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
   </style>

<script type="text/javascript">
//Image Hover
jQuery(document).ready(function(){
jQuery(function() {
	jQuery('ul.da-thumbs > li').hoverdir();
});
});
</script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<script>
$(document).ready(function() {
	$('.popup-with-zoom-anim').magnificPopup({
type: 'inline',
fixedContentPos: false,
fixedBgPos: true,
overflowY: 'auto',
closeBtnInside: true,
preloader: false,
midClick: true,
removalDelay: 300,
mainClass: 'my-mfp-zoom-in'
});
});
</script>
<!--nav-->
<script>
$(function() {
var pull = $('#pull');
	menu = $('nav ul');
	menuHeight	= menu.height();

$(pull).on('click', function(e) {
	e.preventDefault();
	menu.slideToggle();
});

$(window).resize(function(){
var w = $(window).width();
if(w > 320 && menu.is(':hidden')) {
menu.removeAttr('style');
}
    });
});
</script>

  </head>

<body>

<?php require "includes/header.php"; ?>
<?php require "includes/menu.php"; ?>
 
<!--Code for Insert-->   
<?php
require "includes/DB_Functions.php";

?>

<?php

?>





<a href="#x" class="overlay" id="create"></a>
<div class="popup">

<h2>My Profile</h2>

<img src="images/images.jpg">
<form action="folder.php" method="POST">
<input type="text" name="folder" placeholder="Folder Name" required>
<input type="submit"class="btn btn-primary" value="Create">
</form>

<a class="close" href="#close"></a>
</div>
</div>


<?php if(isset($_GET['id'])){ ?>
<a href="#x" class="overlay" id="rename"></a>
<div class="popup"><center>
<h2>Delete a Folder</h2>
<img src="images/images.jpg">
<?php
require "includes/connection.php";
$ids=base64_decode($_GET['id']);

$stmt = $db->prepare("SELECT * FROM  folder where ID='$ids'");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$folder=$row['folder'];
$idss=$row['ID'];	
}
?><br>

<?php if(isset($folder)){ echo $folder; } ?>
<form action="folder.php" method="POST">

<input type="hidden" name="idss" value="<?php echo $idss; ?>">
<input type="submit"class="btn btn-danger" value="Delete">
</form></center>
<a class="close" href="#close"></a>
</div>
</div>
<?php } ?>


<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      
	      
	      <div class="widget ">
	      	
	      	<div class="widget-header">
	      <i class="icon-user"></i>
	      <h3>My Profile</h3>
          <a href="dashboard.php"><span class="btn btn-primary" style="float:right; margin:5px;">Home</span> </a>

          <?php
require "includes/connection.php";  $userid=$_SESSION['userid'];
$stmt = $db->prepare("SELECT * FROM  patient_cases where patient_id='$userid'");
$stmt->execute();
if($stmt->rowCount()!=0)
{

}
?>	  </div> <!-- /widget-header -->
	
	<div class="widget-content">
<?php
//require "includes/connection.php";
  $userid=$_SESSION['userid'];
$stmt = $db->prepare("SELECT * FROM  patient where ID='$userid'");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $img=$row['patient_img'];
 $full_name=$row['full_name'];
 $age=$row['age'];
 $height=$row['height'];
 $blood_group=$row['blood_group'];
 $gender=$row['gender'];
 $contact=$row['contact'];
 $email=$row['email'];
 $dt=$row['dt'];$location=$row['location'];

?>
     <table class="table table-bordered" cellpadding="5">
    <thead>
      <tr>
        <th>Display Picture</th>
        <th>Caption</th>
        <th>Details</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <td rowspan="9" style="width:250px;"><img src="dms/<?php echo $img; ?>" style="height:200px; width:200px; border-radius:50%;"></td>
       
      </tr>
      <tr>
        <td>Complete Name</td>
        <td><?php echo $full_name; ?></td>
        
      </tr>
      <tr>
        <td>Age</td>
        <td><?php echo $age; ?></td>
        
      </tr>
      <tr>
        <td>Height</td>
        <td><?php echo $height; ?></td>
        
      </tr>
      <tr>
        <td>Blood Group</td>
        <td><?php echo $blood_group; ?></td>
        
      </tr>
      <tr>
        <td>Gender</td>
        <td><?php echo $gender; ?></td>
        
      </tr>
      <tr>
        <td>Contact</td>
        <td><?php echo $contact; ?></td>
        
      </tr>
     

      <tr>
        <td>User Location</td>
        <td><?php echo $location; ?></td>
        
      </tr>

      <tr>
        <td>Date of Register</td>
        <td><?php echo $dt; ?></td>
        
      </tr>
    
    </tbody>
  </table>




<?php } ?>
 
   
   <bR><br>     
   <table class="table table-bordered" cellpadding="5">
    <thead>
      <tr>
        <th>Case No</th>
        <th>Patient Problem</th>
        <th>Symptoms </th>
          <th>Blood Pressure </th>
            <th>Glucose </th>
              <th>Next Appointment Date and Time </th>
              <th>Files Attached </th>
        
      </tr>
    </thead>
    <tbody>

<?php


require "includes/connection.php";  $userid=$_SESSION['userid'];


$stmt = $db->prepare("SELECT * FROM  patient_cases where patient_id='$userid'");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$patient_problem=$row['patient_problem'];
$symptoms=$row['symptoms'];
$BP=$row['BP'];
$glucose=$row['glucose'];
$dt=$row['next_appointment'];
$id=$row['ID'];

?>

  
      
      <tr>
        <td><?php echo $id; ?></td>
        <td><b><?php echo $patient_problem; ?></td>
          <td><?php echo $symptoms; ?></td>
            <td><?php echo $BP; ?></td>
              <td><?php echo $glucose; ?></td>
                <td><?php echo $dt; ?></td>
                <td>
    <?php             
    $stmt1 = $db->prepare("SELECT * FROM   files_with_case where case_id='$id'");
$stmt1->execute();$i=0;
while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
$files=$row1['files'];     $i++;
echo "<a href='hospital/upload/$files' target='_blank'>Click here to see file $i</a><br>";
}
?></td>
      </tr>
      
    
   

<?php } ?>
          </tbody>
  </table>
         
         
</div>
</div> <!-- /widget-content -->

</div> <!-- /widget -->
	      
    </div> <!-- /span8 -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /main-inner -->
</div> <!-- /main -->

<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>


  </body>

</html>
<!--Now Code Goes For Popup Javascript-->
<?php if(isset($_GET['id'])){ 
	if($_GET['id']=="keys"){
		
		?>
	<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>

<?php }} ?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Your Key Details</h4>
            </div>
            <div class="modal-body">
              
            </div>
        </div>
    </div>
</div>