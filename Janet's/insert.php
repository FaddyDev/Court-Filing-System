<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
//create a PHP statement that gets the new contact details
$reg = $_POST['reg'];
$case = $_POST['case'];
$year = $_POST['year'];
$month = $_POST['month'];
$fwd = $_POST['fwd'];
$filed = $_POST['filed'];
$dis = $_POST['dis'];
$name = $_POST['name'];
$pj = $_POST['pj'];
$desig = $_POST['desig'];
$date = $_POST['date'];
$total;
$pending;

//Confirm that all fields are set
if(isset($case)  & isset($reg) & isset($year) & isset($month) & isset($fwd) & isset($filed) & isset($dis) & isset($name) & isset($pj) & isset($desig) & isset($date) ) 
{
//Confirm that a case has been selected
if( !(empty($case)) & !(empty($reg)) ){

if(!is_numeric($fwd)  || !is_numeric($filed)  || !is_numeric($dis) )
{ 
echo ("<script language='javascript'> window.alert('Enter integers only')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.html'> ";}

else{
//Checking if a duplicate entry exists
$sql="SELECT * FROM Case_details WHERE registry='".$reg."' AND case_type='".$case."' AND month='".$month."' AND year='".$year."' ";
$result=$conn->query($sql);
if($result->num_rows>0){
echo ("<script language='javascript'> window.alert('Similar case data already recorded, click to view it')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";
//die();
}
else{


{{$total=$fwd+$filed;}
if(($total-$dis)<0){
echo ("<script language='javascript'> window.alert('Number of disposed cases exceeds the total number of cases')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.html'> ";
}
else{
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
 
$sql = "insert into Case_details (registry,case_type,month,year,period,pending,filed,total,disposed,pending2,name,pj,desig,date)  values ( '".$reg."','".$case."','".$month."','".$year."','".$period."','".$fwd."','".$filed."','".$total."','".$dis."','".$pending."'  ,'".$name."','".$pj."','".$desig."','".$date."')";

$query=mysqli_query($conn,$sql);

if(!$query){die("Not submitted ".mysqli_error($conn));}
else{
echo ("<script language='javascript'> window.alert('New case details submitted successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.html'> ";
}


//Excessive disposed checker ends here
}
//Duplicate checker ends here
}
//Integer checker ends here
}

}
//Empty checker ends here-that ensures a case is selected
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.html'> ";}

//Isset ends here
}
else { 
echo ("<script language='javascript'> window.alert('Kindly fill all fields')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.html'> ";}

?>


