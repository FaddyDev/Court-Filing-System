
<?php
//Connect to database via another page
include_once("dbconn.php");
?>
<?php
$sr = $_POST['sr'];
$reg = $_POST['reg'];
$case = $_POST['case'];
$year = $_POST['yr'];
$month = $_POST['mn'];
$fwd = $_POST['p'];
$filed = $_POST['fld'];
$dis = $_POST['disp'];
$name = $_POST['name'];
$pj = $_POST['pj'];
$desig = $_POST['desig'];
$date = $_POST['date'];
$total;
$pending;

//Confirm that all fields are set
if(isset($case) & isset($year) & isset($month) & isset($fwd) & isset($filed) & isset($dis) ) 

{{$total=$fwd+$filed;}
{$pending=$total-$dis;}

$m='';$d='';

     if ($month=='January'){$m='01';$d='31';}
	else if ($month=='February'){$m='02';$d='28';}
	else if ($month=='March'){$m='03';$d='31';}
	else if ($month=='April'){$m='04';$d='30';}
	else if ($month=='May'){$m='05';$d='31';}
	else if ($month=='June'){$m='06';$d='30';}
	else if ($month=='July'){$m='07';$d='31';}
	else if ($month=='August'){$m='08';$d='31';}
	else if ($month=='September'){$m='09';$d='30';}
	else if ($month=='October'){$m='10';$d='31';}
	else if ($month=='November'){$m='11';$d='30';}
	else if ($month=='December'){$m='12';$d='31';}
	
	$period=''.$d.'/'.$m.'/'.$year.'';


//assemble insert string 
$reg=mysqli_real_escape_string($conn,$reg);
$case=mysqli_real_escape_string($conn,$case);
$year=mysqli_real_escape_string($conn,$year);
$month=mysqli_real_escape_string($conn,$month);
$fwd=mysqli_real_escape_string($conn,$fwd);
$filed=mysqli_real_escape_string($conn,$filed);
$dis=mysqli_real_escape_string($conn,$dis);
$name=mysqli_real_escape_string($conn,$name);
$desig=mysqli_real_escape_string($conn,$desig);
$pj=mysqli_real_escape_string($conn,$pj);
$pending=mysqli_real_escape_string($conn,$pending);
$date=mysqli_real_escape_string($conn,$date);
$total=mysqli_real_escape_string($conn,$total);
$period=mysqli_real_escape_string($conn,$period);

$sql = "UPDATE Case_details SET registry='".$reg."',case_type='".$case."',month='".$month."',year='".$year."',period='".$period."',pending='".$fwd."',filed='".$filed."',total='".$total."',disposed='".$dis."',pending2='".$pending."',name='".$name."',pj='".$pj."',desig='".$desig."',date='".$date."' WHERE Sr='".$sr."'  ";

$query=mysqli_query($conn,$sql);

if(!$query){die("Not submitted ".mysqli_error($conn));}
else{
echo ("<script language='javascript'> window.alert('Selected case details updated successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}

}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}
 ?>
