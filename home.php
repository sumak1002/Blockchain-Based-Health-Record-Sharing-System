<?php
session_start();
if(!isset($_SESSION['name']))
{
header("location:index.php");	
}
if($_SESSION['name']=="admin")
{
}
else{
echo "<script>window.location='web_authentic.php';</script>";
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
    
    
    <link href="js/guidely/guidely.css" rel="stylesheet"> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

<body>

<?php require "includes/header.php"; ?>
<?php require "includes/menu.php"; ?>
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">	      	
	 <?php 
require "includes/connection.php";
$stmt = $db->prepare("SELECT * FROM project_creation");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
	      	<div class="span4">
	      		
	      		<div id="target-3" class="widget">
	      			
                    
                    <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3>
                                    <?php echo $row['Project_name'];  ?></h3>
                            </div>
	      			<div class="widget-content">
	 				
			      		<strong>Cost Estimated:</strong> <img src="images/rs1.png"> <?php $kk=$row['ID'];
						$stmt1 = $db->prepare("SELECT * FROM material__requirment where Project_ID='".$kk."'");
 						$stmt1->execute();
						if ($stmt1->rowCount()== 0) 
							{
							echo "<a href='requirement_material_cost_estimation.php' target='_blank'> Specify Now !!</a>";
							}
							else
							{
							$tot=0;
						while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
							
						$tot=$row1['total_project_cost']+$tot;
						
						 
						
						 } echo $tot; }?>
<p>
<strong>Client Name: </strong>
<?php echo $row['Project_owner_name'];  ?>
<br>
<strong>Project Location: </strong>
<?php echo $row['Project_location'];  ?><br>
<strong>Payment Received:</strong> <img src="images/rs1.png">
<?php
$stmt2 = $db->prepare("SELECT SUM(total_project_cost) as amount FROM  material__requirment  where project_id='".$kk."'");
$stmt2->execute();

while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { echo  $row2['amount']; if($row2['amount']=="")
{
echo "00.00";
}} ?>		      		

</p>
		      		
		      		</div> <!-- /widget-content -->
		      		
	      		</div> <!-- /widget -->
	      		
      		</div> <!-- /span4 -->
      	
	      	<?php 
			
			
			
			
			} ?>
	      	
	      	
	      	
      		
      		
      		
      		
      		
      		
      		 	
	      	
	     
      		</div> <!-- /span3 -->
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
    
	</div> <!-- /main-inner -->
	    
</div> <!-- /main -->
    
<?php require "includes/footer.php"; ?>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

	


  </body>

</html>
