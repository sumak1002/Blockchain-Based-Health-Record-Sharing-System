<?php
session_start();
if(!isset($_SESSION['name']))
{
header("location:index.php"); 
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
    <script src="js/jquery-1.7.2.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/popup.css" media="all">
<script language="javascript" type="text/javascript">
  $(window).load(function() {
    $('#loading').hide();
  });
</script>
<style>
#loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}
</style>
   <style>
  .custom-file-input {
  visibility: hidden;
  width: 0;
  position: relative;
}
.custom-file-input::before {
  content: 'Select some files';
  display: inline-block;
  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 5px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
  visibility: visible;
  position: absolute;
  line-height: 19px;

}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
} </style>
<!--Now Code Goes For Popup Javascript-->

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
<div id="loading">
  <img id="loading-image" src="images/page-loader.gif" alt="Loading..." />
</div>
<?php require "includes/header.php"; ?>
<?php require "includes/menu.php"; ?>
    



<div class="main">
  
  <div class="main-inner">

      <div class="container">
  
        <div class="row">
          
          <div class="span12">      
        
        <div class="widget ">
          
          <div class="widget-header"><a href="folder.php"><span class="btn btn-primary" style="float:right; margin:5px;">Back To Folder</span> </a>
        <i class="icon-user"></i>
        <h3>Create Patient Case</h3>
    </div> <!-- /widget-header -->
  
  <div class="widget-content">

 <div class="container" style="float:left;">  

<form action="" method="POST" enctype="multipart/form-data">


<textarea  name="Problem" autocomplete="off" required class="span7" placeholder="Patient Problem"></textarea><br>

<textarea  name="symptoms"  autocomplete="off" required class="span7"  placeholder="Patient symptoms"></textarea><br>

<input type="text"  name="BP"  autocomplete="off" class="span7" placeholder="Blood 
Pressure" required><br>
  <input type="text" name="glucose"  autocomplete="off" class="span7" placeholder="Glucose" required><br>
<label>Next Appointment Date and Time</label>
   <input type="text" name="glucose"  autocomplete="off" class="span7" placeholder="Glucose" required><br>


 <strong> Prescription and Other Details</strong>
 <input type="file" name="file[]" id="file" multiple><br>
<input type="submit" name="submit" class="btn btn-primary">

</form>
</div>

       
         
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

<?php
require "includes/connection.php";

?>
<?php
require "includes/DB_Functions.php"; 
?>

<?php
if(isset($_POST['Problem'])){
$Problem=$_POST['Problem'];
$symptoms=$_POST['symptoms'];
$BP=$_POST['BP'];
$glucose=$_POST['glucose'];

$patid=$_SESSION['userid'];
$hspid="";
$stmt = $db->prepare("INSERT INTO `patient_cases` (`hospital_id`, `patient_id`, `patient_problem`, `symptoms`, `BP`, `glucose`) VALUES ('$hspid','$patid','$Problem','$symptoms','$BP','$glucose')");
$stmt->execute();



}
?>
<?php 


$stmt = $db->prepare("SELECT * FROM `patient_cases` ORDER BY ID DESC LIMIT 1");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$IDd=$row['ID'];

}


//Database Connection
$conn = mysqli_connect('localhost', 'root', '', 'healthrecord_sharing');
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}

if(isset($_POST['submit'])){
 // Count total uploaded files
 $totalfiles = count($_FILES['file']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++){
 $filename = $_FILES['file']['name'][$i];
 
// Upload files and store in database
if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'hospital/upload/'.$filename)){
    // Image db insert sql
    $insert = "INSERT into files_with_case(case_id,files) values('$IDd','$filename')";
    if(mysqli_query($conn, $insert)){
    
    }
    else{
      echo 'Error: '.mysqli_error($conn);
    }
  }else{
    echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
  }
 
 }echo "<script>alert('Data Submitted!');</script>"; 
} 