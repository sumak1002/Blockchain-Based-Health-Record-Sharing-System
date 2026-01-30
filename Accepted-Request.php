<center><h1><?php
session_start();
if(!isset($_SESSION['name']))
{
header("location:index.php"); 
}

  


?></h1></center>
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
  menuHeight  = menu.height();

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
if(isset($_POST['folder']))
{
if(strlen($_POST['folder'])<20)
{
$folder="dms/".$_POST['folder'];
$folder1=$_POST['folder'];
if (!file_exists($folder)) {
  
$kkk=mkdir($folder, 0700);

if($kkk)
{$userid=$_SESSION['userid'];
if(folder($folder1,$userid)==1)
{
echo "<script>alert('FOLDER CREATED SUCCESFULLY');</script>";
}
}
}
else
{
echo "<script>alert('FILE ALREADY EXIST');</script>";
echo "<script>window.history.back()</script>";
}
}
else
{
echo "<script>alert('FILE NAME IS TOO LONG');</script>";
echo "<script>window.history.back()</script>";
}
}
?>

<?php
if(isset($_POST['idss']))
{
$idss=$_POST['idss'];
if(deletefolder($idss)==1)
{
echo "<script>alert('FOLDER DELETED SUCCESFULLY');</script>";
}
else
{
echo "<script>alert('No Specified Folder');</script>";

}
}
?>





<a href="#x" class="overlay" id="create"></a>
<div class="popup">

<h2>Create a New Folder</h2>

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
        <h3>Accepted Request Hospital</h3>
          <a href="folder.php"><span class="btn btn-primary" style="float:right; margin:5px;">Home</span> </a>
    </div> <!-- /widget-header -->
  
  <div class="widget-content">
          
         
<?php 

require "includes/connection.php"; 
  $userid=$_SESSION['userid'];

$query1 = "SELECT * FROM view_permission where patient_id='$userid' group by hospital_id";
$stmt1 = $db->prepare($query1);
$stmt1->execute();
$count1=$stmt1->rowCount();
while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
	
$hospital_id=$row1['hospital_id'];	
$query = "SELECT * FROM hospital where ID='$hospital_id'";
$stmt = $db->prepare($query);
$stmt->execute();
$count=$stmt->rowCount();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	
	
$img=$row['patient_img'];
$full_name=$row['full_name'];
$email=$row['email'];
$contact=$row['contact'];
$treatment=$row['treatment'];


$dt=$row['dt']; $location=$row['location'];$id=$row['ID'];







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
        <td><b><?php echo $full_name; ?></td>
        
      </tr>
      <tr>
        <td>email</td>
        <td><?php echo $email; ?></td>
        
      </tr>
      <tr>
        <td>contact</td>
        <td><?php echo $contact; ?></td>
        
      </tr>
      <tr>
        <td>Treatment</td>
        <td><?php echo $treatment; ?></td>
        
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


<br><br>

<?php }} ?>
 
       
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
