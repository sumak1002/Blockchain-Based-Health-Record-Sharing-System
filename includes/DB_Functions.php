<?php
require "connection.php";
function Save_New_Project($project_name,$project_type,$project_owner_name,$project_monitor,$project_location,$start_date,$end_date)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO project_creation 
(Project_name,Project_type,Project_owner_name,Project_monitor_by,Project_location,Project_start_date,Project_end_date)
VALUES (:project_name,:project_type,:project_owner_name,:project_monitor,:project_location,:start_date,:end_date)");
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':project_type', $project_type);
$sql->bindParam(':project_owner_name', $project_owner_name);
$sql->bindParam(':project_monitor', $project_monitor);
$sql->bindParam(':project_location', $project_location);
$sql->bindParam(':start_date', $start_date);
$sql->bindParam(':end_date', $end_date);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Material_Setup($material_name,$meterial_type,$uom,$meterial_unititem,$meterial_price,$material_unit,$material_supplier1,$material_supplier2,$material_supplier3)
{
$material_name;
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO setup_material(Material_name,Material_type,uom,meterial_unit_item,meterial_price,material_unit,material_supplier1,material_supplier2,material_supplier3) VALUES (:material_name,:meterial_type,:uom,:material_unit,:meterial_price,:material_unit,:material_supplier1,:material_supplier2,:material_supplier3)");
$sql->bindParam(':material_name', $material_name);
$sql->bindParam(':meterial_type', $meterial_type);
$sql->bindParam(':uom', $uom);
$sql->bindParam(':material_unit', $material_unit);
$sql->bindParam(':meterial_price', $meterial_price);
$sql->bindParam(':meterial_price', $material_unit);
$sql->bindParam(':material_supplier1', $material_supplier1);
$sql->bindParam(':material_supplier2', $material_supplier2);
$sql->bindParam(':material_supplier3', $material_supplier3);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Supplier_Setup($Supplier_Name,$Supplier_Shop_Name,$Supplier_Business,$Supplier_Contact,$Supplier_Address)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO supplier_setup(Supplier_Name,Supplier_Shop_Name,Supplier_Business,Supplier_Contact,Supplier_Address)
VALUES (:Supplier_Name,:Supplier_Shop_Name,:Supplier_Business,:Supplier_Contact,:Supplier_Address)");
$sql->bindParam(':Supplier_Name', $Supplier_Name);
$sql->bindParam(':Supplier_Shop_Name', $Supplier_Shop_Name);
$sql->bindParam(':Supplier_Business', $Supplier_Business);
$sql->bindParam(':Supplier_Contact', $Supplier_Contact);
$sql->bindParam(':Supplier_Address', $Supplier_Address);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}

?>

<?php
require "connection.php";
function Register_user($Staff_Name,$Staff_Surname,$Staffjoining,$Staff_Email,$Staff_Password,$payment,$setup,$inventory,$report,$dms)
{
try {
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  register_staff(`Staff_Name`, `Staff_Surname`,`staff_joining`, `Staff_Email`, `Staff_Password`, `Payment`, `Setup`, `Inventory`, `Report`, `Document_Management_System`) values (:Staff_Name,:Staff_Surname,:Staffjoining,:Staff_Email,:Staff_Password,:payment,:setup,:inventory,:report,:dms)");

$sql->bindParam(':Staff_Name', $Staff_Name);
$sql->bindParam(':Staff_Surname', $Staff_Surname);
$sql->bindParam(':Staffjoining', $Staffjoining);
$sql->bindParam(':Staff_Email', $Staff_Email);
$sql->bindParam(':Staff_Password', $Staff_Password);
$sql->bindParam(':payment', $payment);
$sql->bindParam(':setup', $setup);
$sql->bindParam(':inventory', $inventory);
$sql->bindParam(':report', $report);
$sql->bindParam(':dms', $dms);
$sql->execute();
}
catch(Exception $e) {
}
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Unit($material_id,$material_name,$meterial_type,$materials_price,$material_unit)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  uom(`main_material_id`,`Material_name`,`uom`,`perunit`,`Material_Price`) 
values (:material_id,:material_name,:meterial_type,:material_unit,:materials_price)");

$sql->bindParam(':material_id', $material_id);
$sql->bindParam(':material_name', $material_name);
$sql->bindParam(':meterial_type', $meterial_type);
$sql->bindParam(':materials_price', $materials_price);
$sql->bindParam(':material_unit', $material_unit);
$sql->execute();

if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function UnitEdit($id,$meterial_type,$materials_price,$material_unit)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("UPDATE uom SET `uom`=:meterial_type,`perunit`=:material_unit,
`Material_Price`=:materials_price WHERE `ID`='$id'");


$sql->bindParam(':meterial_type', $meterial_type);

$sql->bindParam(':material_unit',$material_unit );
$sql->bindParam(':materials_price', $materials_price);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php 
function delete_uom($id)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("delete from uom where ID=:title");
$sql->bindParam(':title', $id);
$sql->execute();
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




<?php
require "connection.php";
function share_file($fileid,$sender_public_key,$receiver_private_key,$sender_id,$receiver_id)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO `file_sharing`(`sender_key`,  `receiver_key`, `file_id`, `sender_id`,`receiver_id`) VALUES(:sender_public_key,:receiver_private_key,:fileid,:sender_id,:receiver_id)");
$sql->bindParam(':fileid', $fileid);
$sql->bindParam(':sender_public_key', $sender_public_key);
$sql->bindParam(':receiver_private_key', $receiver_private_key);
$sql->bindParam(':sender_id', $sender_id);
$sql->bindParam(':receiver_id', $receiver_id);


$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>




<?php
require "connection.php";
function share_file_req($sender_id,$sender_name,$receiver_id,$message)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO `file_req`(`sender_id`,`sender_name`, `receiver_id`, `message`, `file_id`) VALUES(:sender_id,:sender_name,:receiver_id,:message,'-')");
$sql->bindParam(':sender_id', $sender_id);
$sql->bindParam(':sender_name', $sender_name);
$sql->bindParam(':receiver_id', $receiver_id);
$sql->bindParam(':message', $message);



$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>







<?php
require "connection1.php";
function update_chiper_text($lastid,$chipertext)
{
$db = new PDO('mysql:host=localhost;dbname=secure_cloud2;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO `proxy_server`(`sharing_id`, `cipher_text`) VALUES(:lastid,:chipertext)");
$sql->bindParam(':lastid', $lastid);
$sql->bindParam(':chipertext', $chipertext);

$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function update_receiver_server($msg,$lastid,$receiver_id,$chipertext,$receiver_public_key,$receiver_private_key,$fileid)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO `receivers_server` (`msg`, `file_sharing_id`, `receiver_id`, `chiper_text_proxy_server_code`, `reencryption_usingreceiver_public_key`, `receivers_private_key`, `file_id`)
 VALUES(:msg,:lastid,:receiver_id,:chipertext,:receiver_public_key,:receiver_private_key,:fileid)");
$sql->bindParam(':lastid', $lastid);
$sql->bindParam(':receiver_id', $receiver_id);
$sql->bindParam(':chipertext', $chipertext);
$sql->bindParam(':receiver_public_key', $receiver_public_key);
$sql->bindParam(':receiver_private_key', $receiver_private_key);
$sql->bindParam(':fileid', $fileid);
$sql->bindParam(':msg', $msg);


$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>


















<?php
require "connection.php";
function Voucher_Allotment($min,$max)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO voucher_allotment(voucher_min,voucher_max) values (:min,:max)");
$sql->bindParam(':min', $min);
$sql->bindParam(':max', $max);
$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Voucher_Assignment($id,$min,$max,$allotment_ID)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO voucher(Project_ID,start,end,Voucher_allotment_id)
 values (:id,:min,:max,:allotment_ID)");
$sql->bindParam(':id', $id);
$sql->bindParam(':min', $min);
$sql->bindParam(':max', $max);
$sql->bindParam(':allotment_ID', $allotment_ID);
$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Material_Requirment($projectid,$Project_name,$empID,$emp_id,$quantity,$empID1,$emp_id1,$quantity1,$empID2,$emp_id2,$quantity2,$empID3,$emp_id3,$quantity3,$empID4,$emp_id4,$quantity4,$empID5,$emp_id5,$quantity5,$empID6,$emp_id6,$quantity11,$empID7,$emp_id7,$quantity12,$empID8,$emp_id8,$quantity13,$empID9,$emp_id9,$quantity14,
$material_1,$cost_1,$quantity6,$material_2,$cost_2,$quantity7,$material_3,$cost_3,$quantity8,$material_4,$cost_4,$quantity9,$material_5,$cost_5,$quantity10,$sqft,$Land_Acquisition,$Land_Acquisition_Cost,$Architectural_engineering,$Architectural_engineering_cost,$Expected_Labour,$Expected_Labour_Cost,$Field_supervision,$Field_supervision_cost,$Insurance_taxes,$Insurance_taxes_cost,$Owner_office_overhead,$Owner_office_overhead_cost,$Inspection_testing,$Inspection_testing_cost,$other_expences1,$other_expences_cost1,$other_expences2,$other_expences_cost2,$other_expences3,
$other_expences_cost3,$total_cost)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO material__requirment(`Project_ID`, `Project_Name`,
 `Material_1`, `Cost_1`, `quantity1`, `Material_2`, `Cost_2`, `quantity2`, `Material_3`,
  `Cost_3`, `quantity3`, `Material_4`, `Cost_4`, `quantity4`, `Material_5`, `Cost_5`, 
  `quantity5`, `Material_6`, `Cost_6`, `quantity6`, `Material_7`, `Cost_7`, `quantity7`, 
  `Material_8`, `Cost_8`, `quantity8`, `Material_9`, `Cost_9`, `quantity9`, `Material_10`,
   `Cost_10`, `quantity10`, `Material_11`, `Cost_11`, `quantity11`,`Material_12`,`Cost_12`,`quantity12`, `Material_13`, `Cost_13`,`quantity13`, `Material_14`, `Cost_14`,`quantity14`,`Material_15`, `Cost_15`,`quantity15`, `sqft`, `Land_Acquisition`,
    `Land_Acquisition_cost`, `Architectural_engineering`, `Architectural_engineering_cost`,
	 `Expected_Labour`, `Expected_Labour_Cost`, `Field_supervision`, `Field_supervision_cost`,
	  `Insurance_taxes`, `Insurance_taxes_cost`, `Owner_office_overhead`,
	   `Owner_office_overhead_cost`, `Inspection_testing`, `Inspection_testing_cost`,
	    `other_expences1`, `other_expences_cost1`, `other_expences2`, `other_expences_cost2`, 
		`other_expences3`, `other_expences_cost3`, `total_project_cost`) 
VALUES (:projectid,:Project_name,:empID,:emp_id,:quantity,:empID1,:emp_id1,:quantity1,:empID2,:emp_id2,:quantity2,
:empID3,:emp_id3,:quantity3,:empID4,
:emp_id4,:quantity4,:empID5,:emp_id5,:quantity5,:material_1,:cost_1,:quantity6,:material_2,:cost_2,:quantity7,:material_3,:cost_3,:quantity8,
:material_4,:cost_4,:quantity9,:material_5,:cost_5,:quantity10,:empID6,:emp_id6,:quantity11,:empID7,:emp_id7,:quantity12,:empID8,:emp_id8,:quantity13,:empID9,:emp_id9,:quantity14,:sqft,
:Land_Acquisition,:Land_Acquisition_Cost,:Architectural_engineering,:Architectural_engineering_cost
,:Expected_Labour,:Expected_Labour_Cost,:Field_supervision,:Field_supervision_cost,
:Insurance_taxes,:Insurance_taxes_cost,
:Owner_office_overhead,:Owner_office_overhead_cost,:Inspection_testing,:Inspection_testing_cost
,:other_expences1,:other_expences_cost1,:other_expences2,:other_expences_cost2,
:other_expences3,:other_expences_cost3,:total_cost)");

$sql->bindParam(':projectid', $projectid);
$sql->bindParam(':Project_name', $Project_name);
$sql->bindParam(':empID', $empID);
$sql->bindParam(':emp_id', $emp_id);
$sql->bindParam(':quantity', $quantity);
$sql->bindParam(':empID1', $empID1);
$sql->bindParam(':emp_id1', $emp_id1);
$sql->bindParam(':quantity1', $quantity1);
$sql->bindParam(':empID2', $empID2);
$sql->bindParam(':emp_id2', $emp_id2);
$sql->bindParam(':quantity2', $quantity2);
$sql->bindParam(':empID3', $empID3);
$sql->bindParam(':emp_id3', $emp_id3);
$sql->bindParam(':quantity3', $quantity3);
$sql->bindParam(':empID4', $empID4);
$sql->bindParam(':emp_id4', $emp_id4);
$sql->bindParam(':quantity4', $quantity4);
$sql->bindParam(':empID5', $empID5);
$sql->bindParam(':emp_id5', $emp_id5);
$sql->bindParam(':quantity5', $quantity5);

$sql->bindParam(':empID6', $empID6);
$sql->bindParam(':emp_id6', $emp_id6);
$sql->bindParam(':quantity11', $quantity11);

$sql->bindParam(':empID7', $empID7);
$sql->bindParam(':emp_id7', $emp_id7);
$sql->bindParam(':quantity12', $quantity12);

$sql->bindParam(':empID8', $empID8);
$sql->bindParam(':emp_id8', $emp_id8);
$sql->bindParam(':quantity13', $quantity13);

$sql->bindParam(':empID9', $empID9);
$sql->bindParam(':emp_id9', $emp_id9);
$sql->bindParam(':quantity14', $quantity14);




$sql->bindParam(':material_1', $material_1);
$sql->bindParam(':cost_1', $cost_1);
$sql->bindParam(':quantity6', $quantity6);
$sql->bindParam(':material_2', $material_2);
$sql->bindParam(':cost_2', $cost_2);
$sql->bindParam(':quantity7', $quantity7);
$sql->bindParam(':material_3', $material_3);
$sql->bindParam(':cost_3', $cost_3);
$sql->bindParam(':quantity8', $quantity8);
$sql->bindParam(':material_4', $material_4);
$sql->bindParam(':cost_4', $cost_4);
$sql->bindParam(':quantity9', $quantity9);
$sql->bindParam(':material_5', $material_5);
$sql->bindParam(':cost_5', $cost_5);
$sql->bindParam(':quantity10', $quantity10);
$sql->bindParam(':sqft', $sqft);

$sql->bindParam(':Land_Acquisition', $Land_Acquisition);
$sql->bindParam(':Land_Acquisition_Cost', $Land_Acquisition_Cost);
$sql->bindParam(':Architectural_engineering', $Architectural_engineering);
$sql->bindParam(':Architectural_engineering_cost', $Architectural_engineering_cost);
$sql->bindParam(':Expected_Labour', $Expected_Labour);
$sql->bindParam(':Expected_Labour_Cost', $Expected_Labour_Cost);
$sql->bindParam(':Field_supervision', $Field_supervision);
$sql->bindParam(':Field_supervision_cost', $Field_supervision_cost);
$sql->bindParam(':Insurance_taxes', $Insurance_taxes);
$sql->bindParam(':Insurance_taxes_cost', $Insurance_taxes_cost);
$sql->bindParam(':Owner_office_overhead', $Owner_office_overhead);
$sql->bindParam(':Owner_office_overhead_cost', $Owner_office_overhead_cost);
$sql->bindParam(':Inspection_testing', $Inspection_testing);
$sql->bindParam(':Inspection_testing_cost', $Inspection_testing_cost);
$sql->bindParam(':other_expences1', $other_expences1);
$sql->bindParam(':other_expences_cost1', $other_expences_cost1);
$sql->bindParam(':other_expences2', $other_expences2);
$sql->bindParam(':other_expences_cost2', $other_expences_cost2);
$sql->bindParam(':other_expences3', $other_expences3);
$sql->bindParam(':other_expences_cost3', $other_expences_cost3);
$sql->bindParam(':total_cost', $total_cost);

$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Supplier_Entry($Supplier_Name,$Project_ID,$project_name,$Supplier_Suplies_Materials,$Material_Amount,$Material_Supply_Date,$Material_Price)
{
try {
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  supplier_entry(`Supplier_Name`, `Project_ID`, `project_name`, `Supplier_Suplies_Materials`, `Material_Amount`, `Material_Supply_Date`, `Material_Price`, `remaining`)
values (:Supplier_Name,:Project_ID,:project_name,:Supplier_Suplies_Materials,:Material_Amount,:Material_Supply_Date,:Material_Price,:Material_Price)");

$sql->bindParam(':Supplier_Name', $Supplier_Name);
$sql->bindParam(':Project_ID', $Project_ID);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':Supplier_Suplies_Materials', $Supplier_Suplies_Materials);
$sql->bindParam(':Material_Amount', $Material_Amount);
$sql->bindParam(':Material_Supply_Date', $Material_Supply_Date);
$sql->bindParam(':Material_Price', $Material_Price);
$sql->execute();
}
catch(Exception $e) {
}
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Labour_Entry($Labour_Name,$project_id,$Project_Name,$Labour_Total_Week_Presenty,$Labour_week_payment,$entry_date)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO labour_entry(`Labour_name`,`Labour_site_id`,`Labour_site`,`Labour_week_presenty`,`Labour_week_payment`,`remaining`,`entry_date`)
values (:Labour_Name,:project_id,:Project_Name,:Labour_Total_Week_Presenty,:Labour_week_payment,:Labour_week_payment,:entry_date)");
$sql->bindParam(':Labour_Name', $Labour_Name);
$sql->bindParam(':project_id', $project_id);
$sql->bindParam(':Project_Name', $Project_Name);
$sql->bindParam(':Labour_Total_Week_Presenty', $Labour_Total_Week_Presenty);
$sql->bindParam(':Labour_week_payment', $Labour_week_payment);
$sql->bindParam(':entry_date', $entry_date);
$sql->execute();

if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Staff_Entry($staffid,$staffname,$salary,$month)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO staff_entry(Staff_Name,staff_ID,Staff_Salary,month,remaining)
values (:staffname,:staffid,:salary,:month,:salary)");

$sql->bindParam(':staffname', $staffname);
$sql->bindParam(':staffid', $staffid);
$sql->bindParam(':salary', $salary);
$sql->bindParam(':month', $month);
$sql->execute();

if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Update_Supplier_Payment_Detail($payment1,$id1)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE supplier_entry SET paid=:payment, partial_paid=:payment, remaining='0' WHERE `ID`='$id1'");

$sql->bindParam(':payment', $payment1);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Update_Partial_Payment($payment,$id,$remaining)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE supplier_entry SET partial_paid=:payment, paid=:payment, remaining=:remaining WHERE `ID`='$id'");

$sql->bindParam(':payment', $payment);
$sql->bindParam(':remaining', $remaining);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Update_Partial_Payment_Labour($payment,$id,$remaining)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE labour_entry SET partial_paid=:payment, paid=:payment, remaining=:remaining WHERE `ID`='$id'");

$sql->bindParam(':payment', $payment);
$sql->bindParam(':remaining', $remaining);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Update_Labour_Payment_Detail($payment1,$id1,$voucher)
{
$entry_date=date('Y-m-d');
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE labour_entry SET paid=:payment, partial_paid=:payment, remaining='0', voucher_no=:voucher, payment_date=:date WHERE `ID`='$id1'");

$sql->bindParam(':payment', $payment1);
$sql->bindParam(':voucher', $voucher);
$sql->bindParam(':date', $entry_date);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Update_Partial_Payment_Staff($payment,$id,$remaining)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE staff_entry SET partial_paid=:payment, paid=:payment, remaining=:remaining WHERE `ID`='$id'");

$sql->bindParam(':payment', $payment);
$sql->bindParam(':remaining', $remaining);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Update_Staff_Payment_Detail($payment1,$id1,$date)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE staff_entry SET paid=:payment, partial_paid=:payment, remaining='0', date='$date'  WHERE `ID`='$id1'");

$sql->bindParam(':payment', $payment1);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Update_Voucher($site_id,$Labour_site,$name,$Labour_name,$voucher,$payment1,$date)
{
echo $name;
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO voucher_alloted(`project_id` ,
`Project_name` ,
`category` ,
`name` ,
`voucher` ,
`Voucher_payment` ,
`date`) 
values (:site_id,:Labour_site,:name,:Labour_name,:voucher,:payment1,:date)");

$sql->bindParam(':site_id', $site_id);
$sql->bindParam(':Labour_site', $Labour_site);
$sql->bindParam(':name', $name);
$sql->bindParam(':Labour_name', $Labour_name);
$sql->bindParam(':voucher', $voucher);
$sql->bindParam(':payment1', $payment1);
$sql->bindParam(':date', $date);
$sql->execute();

if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function MoveInventory($id,$name,$materialid)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE material_entry SET Project_ID=:projectid,Project_name=:name WHERE `ID`='$materialid'");
$sql->bindParam(':projectid', $id);
$sql->bindParam(':name', $name);
$sql->execute();
if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Payment_received($Project_ID,$project_name,$Payment_Received,$Payment_Received_By,
$bank_id,$payment,$chequeno,$Payment_Received_Date,$submitted_date)
{
try {
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  payment_received(`project_id` ,`project_name` ,`amount` ,`amount_received_by`,`bank_name` ,`Payment_in`,`cheque` ,`Received_date` ,`Payment_submit_date`)
values (:Project_ID,:project_name,:Payment_Received,:Payment_Received_By,:bank_id,:payment,:chequeno,:Payment_Received_Date,:submitted_date)");

$sql->bindParam(':Project_ID', $Project_ID);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':Payment_Received', $Payment_Received);
$sql->bindParam(':Payment_Received_By', $Payment_Received_By);
$sql->bindParam(':bank_id', $bank_id);
$sql->bindParam(':payment', $payment);
$sql->bindParam(':chequeno', $chequeno);
$sql->bindParam(':Payment_Received_Date', $Payment_Received_Date);
$sql->bindParam(':submitted_date', $submitted_date);
$sql->execute();
}
catch(Exception $e) {
}
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Consumed_material($id,$consumed,$remaining)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("UPDATE material_entry SET consumed_inventory=:consumed, remaining_inventory=:remaining WHERE `ID`='$id'");

$sql->bindParam(':consumed', $consumed);
$sql->bindParam(':remaining', $remaining);
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Reminder($title,$event,$date,$location,$description)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO calender(`name`, `event`, `description`, `location`, `date`)
values (:title,:event,:description,:location,:date)");
$sql->bindParam(':title', $title);
$sql->bindParam(':event', $event);
$sql->bindParam(':date', $date);
$sql->bindParam(':location', $location);
$sql->bindParam(':description', $description);
$sql->execute();

if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>


<?php
require "connection.php";
function Material_Entry($projectid,$project_name,$Material_Supplier_name,$Material_Supplier_ID,$shop,$Material_Name,
$Material_Amount,$Measure,$Material_Price,$Material_Received_Date,$billno,$voucher,$Vehicle,$location,$Time,$Remark,$Description)
{
try {
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  material_entry(Project_ID, Project_name,Supplier,supplier_id,shop,Material_Name,Material_Amount,measure,Material_Price,Material_Received_Date,consumed_inventory,remaining_inventory,date,Bill,voucher,Vehicle,Unloaded_Location,Time,Remark,Description,remaining)
values (:projectid,:project_name,:Material_Supplier_name,:Material_Supplier_ID,:shop,:Material_Name,:Material_Amount,:Measure,:Material_Price,:Material_Received_Date,'0',:Material_Amount,'".date('Y-m-d')."',:billno,:voucher,:Vehicle,:location,:Time,:Remark,:Description,:Material_Price)");

$sql->bindParam(':projectid', $projectid);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':Material_Supplier_name', $Material_Supplier_name);
$sql->bindParam(':Material_Supplier_ID', $Material_Supplier_ID);
$sql->bindParam(':shop', $shop);
$sql->bindParam(':Material_Name', $Material_Name);
$sql->bindParam(':Material_Amount', $Material_Amount);
$sql->bindParam(':Measure', $Measure);
$sql->bindParam(':Material_Price', $Material_Price);
$sql->bindParam(':Material_Received_Date', $Material_Received_Date);
$sql->bindParam(':billno', $billno);
$sql->bindParam(':voucher', $voucher);
$sql->bindParam(':Vehicle', $Vehicle);
$sql->bindParam(':location', $location);
$sql->bindParam(':Time', $Time);
$sql->bindParam(':Remark', $Remark);
$sql->bindParam(':Description', $Description);


$sql->execute();
}
catch(Exception $e) {
}
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Material_Supplier_bill($supplier,$add,$bill,$payment,$date)
{
try {
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  supplier_material_payment(Supplier_name,Supplier_id,bill,payment,date) values (:supplier,:add,:bill,:payment,:date)");

$sql->bindParam(':supplier', $supplier);
$sql->bindParam(':add', $add);
$sql->bindParam(':bill', $bill);
$sql->bindParam(':payment', $payment);
$sql->bindParam(':date', $date);
$sql->execute();
}
catch(Exception $e) {
}
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function folder($folder,$user)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO folder (folder,user_id) VALUES (:folder,:user)");
$sql->bindParam(':folder', $folder);
$sql->bindParam(':user', $user);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function deletefolder($idss)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("delete from folder where ID=:idss");
$sql->bindParam(':idss', $idss);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>


<?php
require "connection.php";
function My_Investment($Investment,$event,$start_date,$end_date,$Amount,$investment_details,$project_locations)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO  my_investment 
(`Investment`, `Investment_Sector`, `start_date`, `end_date`, `amount`, `investment_detail`, `project_location`)
VALUES (:Investment,:event,:start_date,:end_date,:Amount,:investment_details,:project_locations)");
$sql->bindParam(':Investment', $Investment);
$sql->bindParam(':event', $event);
$sql->bindParam(':start_date', $start_date);
$sql->bindParam(':end_date', $end_date);
$sql->bindParam(':Amount', $Amount);
$sql->bindParam(':investment_details', $investment_details);
$sql->bindParam(':project_locations', $project_locations);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>

<?php
require "connection.php";
function Register($email,$password,$username,$age,$Height,$gender,$bg,$Contact,$Address,$gender,$image)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO `patient` (`full_name`, `age`, `height`, `blood_group`, `gender`, `contact`, `email`, `password`, `location`, `patient_img`) VALUES (:username, :age, :Height, :bg, :gender, :Contact, :email,:password, :Address, :file)");
$sql->bindParam(':email', $email);
$sql->bindParam(':password', $password);
$sql->bindParam(':username', $username);
$sql->bindParam(':age', $age);
$sql->bindParam(':Height', $Height);
$sql->bindParam(':gender', $gender);
$sql->bindParam(':bg', $bg);
$sql->bindParam(':Contact', $Contact);
$sql->bindParam(':Address', $Address);
$sql->bindParam(':gender', $gender);
$sql->bindParam(':file', $image);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>


<?php
require "connection.php";
function Hospital_logins($email,$password,$username,$Contact,$Address,$Treatment,$image)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO `hospital` (`full_name`, `contact`, `email`, `password`, `location`, `patient_img`,`treatment`) VALUES (:username, :Contact, :email,:password, :Address, :file, :Treatment)");
$sql->bindParam(':email', $email);
$sql->bindParam(':password', $password);
$sql->bindParam(':username', $username);

$sql->bindParam(':Contact', $Contact);
$sql->bindParam(':Address', $Address);
$sql->bindParam(':Treatment', $Treatment);
$sql->bindParam(':file', $image);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>




<?php
function user($Project_ID,$project_name,$id)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO demo_user(project_id,project,pri) VALUES (:Project_ID,:project_name,:id)");
$sql->bindParam(':Project_ID', $Project_ID);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':id', $id);

$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
function salary($selected,$id)
{
$material_name;
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO salary(previlege,user_id) VALUES (:selected,:id)");
$sql->bindParam(':selected', $selected);
$sql->bindParam(':id', $id);

$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>


<?php
require "connection.php";
function Update_Requirement($id,$sqft,$total,$update_sqft,$update_total)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("UPDATE material__requirment SET sqft=:update_sqft,total_project_cost=:update_total WHERE Project_ID='$id'");
$sql->bindParam(':update_sqft', $update_sqft);
$sql->bindParam(':update_total',$update_total );
$sql->execute();


if($sql->rowCount()==1)
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function bank_setup($bank_name,$branch,$acc_holder,$acc_number)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO bank_main(bank,branch,accholder,accno)
VALUES (:bank_name,:branch,:acc_holder,:acc_number)");
$sql->bindParam(':bank_name', $bank_name);
$sql->bindParam(':branch', $branch);
$sql->bindParam(':acc_holder', $acc_holder);
$sql->bindParam(':acc_number', $acc_number);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
function Bank_Deposit($bank_id,$project_id,$payment_id,$project_name,$amount,$date)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO  bank_balance 
(bank_id,project_id,payment_id,project_name,deposit,date) VALUES 
(:bank_id,:project_id,:payment_id,:project_name,:amount,:date)");
$sql->bindParam(':bank_id', $bank_id);
$sql->bindParam(':project_id', $project_id);
$sql->bindParam(':payment_id', $payment_id);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':amount', $amount);
$sql->bindParam(':date', $date);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
require "connection.php";
function Bank_Withdrawl($id,$bank_name,$Withdrawl_Amount,$Withdrawl_By,$date)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO withdrawl 
(bank_id,bank,withdrawl,withdrawl_by,date) VALUES (:id,:bank_name,:Withdrawl_Amount,:Withdrawl_By,:date)");
$sql->bindParam(':id', $id);
$sql->bindParam(':bank_name', $bank_name);
$sql->bindParam(':Withdrawl_Amount', $Withdrawl_Amount);
$sql->bindParam(':Withdrawl_By', $Withdrawl_By);
$sql->bindParam(':date', $date);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
<?php
function Move_Project_to_draft($Project_ID,$project_name)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO  drafts (project_id,project_name)VALUES (:Project_ID,:project_name)");
$sql->bindParam(':Project_ID', $Project_ID);
$sql->bindParam(':project_name', $project_name);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}	
}
function delete_moved_Project($Project_ID)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("delete from project_creation where ID=:Project_ID");
$sql->bindParam(':Project_ID', $Project_ID);
$sql->execute();
if($sql)
{
return 1;
}
else
{
return 0;
}
}
function delete_draft($id)
{
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("delete from drafts where ID=:title");
$sql->bindParam(':title', $id);
$sql->execute();
if($sql)
{
return 1;
}
else
{
return 0;
}
}

/*
function user($Project_ID,$project_name,$id)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO demo_user(project_id,project,pri) VALUES (:Project_ID,:project_name,:id)");
$sql->bindParam(':Project_ID', $Project_ID);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':id', $id);

$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
*/

function Main_material_Setup($Material_type,$desc,$supplier_1,$supplier_2,$supplier_3,$supplier_4,$supplier_5,$supplier_6)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO main_material_type( `type`, `desc`, `supllier_1`, `supllier_2`, `supllier_3`, `supllier_4`, `supllier_5`, `supllier_6`) VALUES (:Material_type,:desc,:supplier_1,:supplier_2,:supplier_3,:supplier_4,:supplier_5,:supplier_6)");
$sql->bindParam(':Material_type', $Material_type);
$sql->bindParam(':desc', $desc);
$sql->bindParam(':supplier_1', $supplier_1);
$sql->bindParam(':supplier_2', $supplier_2);
$sql->bindParam(':supplier_3', $supplier_3);
$sql->bindParam(':supplier_4', $supplier_4);
$sql->bindParam(':supplier_5', $supplier_5);
$sql->bindParam(':supplier_6', $supplier_6);


$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>



<?php
require "connection.php";
function Pre_Material_Entry($projectid,$project_name,$Material_Supplier_ID,$Material_Name,$Material_sub,
$Material_Amount,$Measure,$Material_Price,$Material_Received_Date,$billno,$voucher,$Vehicle,$location,$Time,$Remark,$Description)
{
try {
$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');

$sql = $db->prepare("INSERT INTO  material_entry(Project_ID, Project_name,supplier_id,Material_Name,Sub_material_name,Material_Amount,measure,Material_Price,Material_Received_Date,consumed_inventory,remaining_inventory,date,Bill,voucher,Vehicle,Unloaded_Location,Time,Remark,Description,remaining)
values (:projectid,:project_name,:Material_Supplier_ID,:Material_Name,:Material_sub,:Material_Amount,:Measure,:Material_Price,:Material_Received_Date,'0',:Material_Amount,'".date('Y-m-d')."',:billno,:voucher,:Vehicle,:location,:Time,:Remark,:Description,:Material_Price)");

$sql->bindParam(':projectid', $projectid);
$sql->bindParam(':project_name', $project_name);
$sql->bindParam(':Material_Supplier_ID', $Material_Supplier_ID);
$sql->bindParam(':Material_Name', $Material_Name);
$sql->bindParam(':Material_sub', $Material_sub);
$sql->bindParam(':Material_Amount', $Material_Amount);
$sql->bindParam(':Measure', $Measure);
$sql->bindParam(':Material_Price', $Material_Price);
$sql->bindParam(':Material_Received_Date', $Material_Received_Date);
$sql->bindParam(':billno', $billno);
$sql->bindParam(':voucher', $voucher);
$sql->bindParam(':Vehicle', $Vehicle);
$sql->bindParam(':location', $location);
$sql->bindParam(':Time', $Time);
$sql->bindParam(':Remark', $Remark);
$sql->bindParam(':Description', $Description);


$sql->execute();
}
catch(Exception $e) {
}
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}



function Labour_Setup($labour_Name,$labour_contact,$Labour_Address)
{

$db = new PDO('mysql:host=localhost;dbname=healthrecord_sharing;charset=utf8', 'root', '');
$sql = $db->prepare("INSERT INTO labour_setup(`labour_name`, `contact`, `address`) VALUES (:labour_Name,:labour_contact,:Labour_Address)");
$sql->bindParam(':labour_Name', $labour_Name);
$sql->bindParam(':labour_contact', $labour_contact);
$sql->bindParam(':Labour_Address', $Labour_Address);
$sql->execute();
if($sql->rowCount())
{
return 1;
}
else
{
return 0;
}
}
?>
