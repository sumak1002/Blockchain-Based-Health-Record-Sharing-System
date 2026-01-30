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
<div id="loading">
  <img id="loading-image" src="images/page-loader.gif" alt="Loading..." />
</div>
<?php require "includes/header.php"; ?>
<?php require "includes/menu.php"; ?>
    

<?php
if(isset($_FILES['file']['name']))
{
$id=base64_decode($_GET['id']);
require "includes/connection.php";
$stmt = $db->prepare("SELECT * FROM folder where ID='$id'");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$folder_name=$row['folder'];
}
$image=$_FILES['file']['name'];
$image=date("mdYHis")."-".$image;
 $key=$_SESSION['user_public_key'];
if(File_Upload($image,$id,$folder_name,$key)==1)
{
echo "<script>alert('Uploaded Succesfully');</script>";
}
}
?>




<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      
	      
	      <div class="widget ">
	      	
	      	<div class="widget-header"><a href="folder.php"><span class="btn btn-primary" style="float:right; margin:5px;">Back To Folder</span> </a>
	      <i class="icon-user"></i>
	      <h3>All Folder</h3>
	  </div> <!-- /widget-header -->
	
	<div class="widget-content">
<?php
require "includes/connection.php";
$id=$_GET['id'];

$stmt = $db->prepare("SELECT * FROM folder_content where ID='$id'");
$stmt->execute();
if($stmt->rowCount()==0)
{
echo "There is No Content in this Folder. Upload Now!!"; }
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { $ID=$row['ID'];$Folder_ID=$row['Folder_ID'];
?>


<?php
$stmt1 = $db->prepare("SELECT * FROM folder where ID='$Folder_ID'");
$stmt1->execute();
while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
$folder_name=$row1['folder'];
}
?>
<div style="float:left">
<a  href="dms/<?php echo $folder_name; ?>/<?php echo $row['content'] ?>" style="color:black" download> <img src="images/images.png"><br>

<?php
$file_name=$row['content'];
$result_explode = explode('-', $file_name);
echo "<center>".substr($result_explode[1],0,30)."</center>";
echo "</a>";
echo "<center></center>";
echo "</div>";

}

?> <?php
if(isset($_GET['msgid'])){ echo "Message:";
$msgid=$_GET['msgid'];
$stmt1 = $db->prepare("SELECT * FROM  receivers_server where id='$msgid'");
$stmt1->execute();
if($stmt1->rowCount()!='0'){
while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
echo $folder_name=$row1['msg'];
}}}
?>

 <div class="container" style="float:left;">	

</div>
<?php
function File_Upload($image,$id,$folder_name,$key)
{
$db = new PDO('mysql:host=localhost;dbname=secure_cloud1;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO folder_content(Folder_ID,content,public_keys) VALUES (:id,:image,:key)");

$sql->bindParam(':image', $image);
$sql->bindParam(':id', $id);
$sql->bindParam(':key', $key);
$sql->execute();
$tmp_name=$_FILES['file']['tmp_name'];
$location='dms/'.$folder_name."/";
move_uploaded_file($tmp_name,$location.$image);
if($sql)
{
return 1;
}
else
{
return 0;
}
}
?>
       
         
</div>
</div> <!-- /widget-content -->

</div> <!-- /widget -->
	      
    </div> <!-- /span8 -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /main-inner -->
</div> <!-- /main -->
<?php require "includes/footer.php"; ?>

<script src="js/jquery-1.7.2.min.js"></script>
	
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>


  </body>

</html>



<?php
function decrypt($ciphertext)
    {
        if ($this->k <= 0) {
            return false;
        }

        $ciphertext = str_split($ciphertext, $this->k);
        $ciphertext[count($ciphertext) - 1] = str_pad($ciphertext[count($ciphertext) - 1], $this->k, chr(0), STR_PAD_LEFT);

        $plaintext = '';

        switch ($this->encryptionMode) {
            case CRYPT_RSA_ENCRYPTION_NONE:
                $decrypt = '_raw_encrypt';
                break;
            case CRYPT_RSA_ENCRYPTION_PKCS1:
                $decrypt = '_rsaes_pkcs1_v1_5_decrypt';
                break;
            //case CRYPT_RSA_ENCRYPTION_OAEP:
            default:
                $decrypt = '_rsaes_oaep_decrypt';
        }

        foreach ($ciphertext as $c) {
            $temp = $this->$decrypt($c);
            if ($temp === false) {
                return false;
            }
            $plaintext.= $temp;
        }

     
		
		
		
        $ciphertext = str_split($plaintext, $this->k);
        $ciphertext[count($ciphertext) - 1] = str_pad($ciphertext[count($ciphertext) - 1], $this->k, chr(0), STR_PAD_LEFT);

        $plaintext = '';

        switch ($this->encryptionMode) {
            case CRYPT_RSA_ENCRYPTION_NONE:
                $decrypt = '_raw_encrypt';
                break;
            case CRYPT_RSA_ENCRYPTION_PKCS1:
                $decrypt = '_rsaes_pkcs1_v1_5_decrypt';
                break;
            //case CRYPT_RSA_ENCRYPTION_OAEP:
            default:
                $decrypt = '_rsaes_oaep_decrypt';
        }

        foreach ($ciphertext as $c) {
            $temp = $this->$decrypt($c);
            if ($temp === false) {
                return false;
            }
            $plaintext.= $temp;
        }
		
		
		return $plaintext;
		
		
    }

?>