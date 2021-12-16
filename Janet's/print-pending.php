<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
require("fpdf/fpdf.php");
$pdf=new FPDF();
//var_dump(get_class_methods($pdf))
$pdf->AddPage();

$year = $_POST['year'];
$month = $_POST['month'];
$year2 = $_POST['year2'];
$month2 = $_POST['month2'];

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
	
	$from=''.$d.'/'.$m.'/'.$year.'';
	
	
	$m2='';$d2='';

     if ($month2=='January'){$m2='01';$d2='31';}
	else if ($month2=='February'){$m2='02';$d2='28';}
	else if ($month2=='March'){$m2='03';$d2='31';}
	else if ($month2=='April'){$m2='04';$d2='30';}
	else if ($month2=='May'){$m2='05';$d2='31';}
	else if ($month2=='June'){$m2='06';$d2='30';}
	else if ($month2=='July'){$m2='07';$d2='31';}
	else if ($month2=='August'){$m2='08';$d2='31';}
	else if ($month2=='September'){$m2='09';$d2='30';}
	else if ($month2=='October'){$m2='10';$d2='31';}
	else if ($month2=='November'){$m2='11';$d2='30';}
	else if ($month2=='December'){$m2='12';$d2='31';}
	
	$to=''.$d2.'/'.$m2.'/'.$year2.'';
	
	//Test to see if such details exist then only proceed if they exist
	$sql="SELECT * FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' ";
$result=$conn->query($sql);
if($result->num_rows>0){
	
//Convert month to uppercase
$month = strtoupper($month);
$month2 = strtoupper($month2);	
	
	$pdf->SetFont("Times","U","14");
$pdf->SetX(90);
$pdf->Cell(10,8,"NYERI LAW COURTS",0,1,"C");
$pdf->SetX(90);
$pdf->Cell(10,8,"PENDING CASES AS FROM ".$month.",".$year." To ".$month2.",".$year2." ",0,2,"C");

$cmchildtot='';
$cmciviltot='';
$cmcrimtot='';
$cmprobtot='';
$cmtrafctot='';
$cmkadhitot='';
$hcprobtot='';
$hcciviltot='';
$hccrimtot='';
$elctot='';
$elrctot='';
$total='';

$cmchild='CM CHILDREN';
$cmcivil='CM CIVIL';
$cmcrim='CM CRIMINAL';
$cmprob='CM PROBATE';
$cmtrafc='CM TRAFFIC';
$cmkadhi='CM KADHI';
$hcprob='HC PROBATE';
$hccivil='HC CIVIL';
$hccrim='HC CRIMINAL';
$elc='ELC';
$elrc='ELRC';

$sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND registry='".$cmchild."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$cmchildtot= $row["SUM(pending)"];
  if($cmchildtot==''){$cmchildtot='-';} else{$cmchildtot=$cmchildtot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$cmcivil."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$cmciviltot= $row["SUM(pending)"];
  if($cmciviltot==''){$cmciviltot='-';} else{$cmciviltot=$cmciviltot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$cmcrim."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$cmcrimtot= $row["SUM(pending)"];
  if($cmcrimtot==''){$cmcrimtot='-';} else{$cmcrimtot=$cmcrimtot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$cmprob."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$cmprobtot= $row["SUM(pending)"];
  if($cmprobtot==''){$cmprobtot='-';} else{$cmprobtot=$cmprobtot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$cmtrafc."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$cmtrafctot= $row["SUM(pending)"];
  if($cmtrafctot==''){$cmtrafctot='-';} else{$cmtrafctot=$cmtrafctot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$cmkadhi."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$cmkadhitot= $row["SUM(pending)"];
  if($cmkadhitot==''){$cmkadhitot='-';} else{$cmkadhitot=$cmkadhitot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$hcprob."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$hcprobtot= $row["SUM(pending)"];
  if($hcprobtot==''){$hcprobtot='-';} else{$hcprobtot=$hcprobtot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$hccivil."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$hcciviltot= $row["SUM(pending)"];
  if($hcciviltot==''){$hcciviltot='-';} else{$hcciviltot=$hcciviltot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$hccrim."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$hccrimtot= $row["SUM(pending)"];
  if($hccrimtot==''){$hccrimtot='-';} else{$hccrimtot=$hccrimtot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$elc."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$elctot= $row["SUM(pending)"];
  if($elctot==''){$elctot='-';} else{$elctot=$elctot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' AND  registry='".$elrc."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$elrctot= $row["SUM(pending)"];
  if($elrctot==''){$elrctot='-';} else{$elrctot=$elrctot;}}
  
  $sql="SELECT SUM(pending) FROM Case_details WHERE period BETWEEN '".$from."' AND '".$to."' ";
$result=$conn->query($sql);
while($row = mysqli_fetch_array($result))
{$total= $row["SUM(pending)"];
  if($total==''){$total='-';} else{$total=$total;}}
  
  //Header
  $pdf->SetFont("","B","14");
  $pdf->SetX(10);
   $pdf->Cell(90,8,"REGISTRY",1,0,"",FALSE);
   $pdf->Cell(90,8,"PENDING CASES",1,1,"C",FALSE);

$pdf->SetFont("","","14");
$pdf->Cell(90,8,"CM's Children",1,0,"");
$pdf->Cell(90,8,"".$cmchildtot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"CM's Civil",1,0,"",FALSE);
$pdf->Cell(90,8,"".$cmciviltot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"CM's Criminal",1,0,"",FALSE);
$pdf->Cell(90,8,"".$cmcrimtot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"CM's Probate",1,0,"",FALSE);
$pdf->Cell(90,8,"".$cmprobtot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"CM's Traffic",1,0,"",FALSE);
$pdf->Cell(90,8,"".$cmtrafctot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"CM's Kadhi",1,0,"",FALSE);
$pdf->Cell(90,8,"".$cmkadhitot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"HC Probate",1,0,"",FALSE);
$pdf->Cell(90,8,"".$hcprobtot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"HC Civil",1,0,"",FALSE);
$pdf->Cell(90,8,"".$hcciviltot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"HC Criminal",1,0,"",FALSE);
$pdf->Cell(90,8,"".$hccrimtot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"ELC",1,0,"",FALSE);
$pdf->Cell(90,8,"".$elctot."",1,1,"C",FALSE);
$pdf->Cell(90,8,"ELRC",1,0,"",FALSE);
$pdf->Cell(90,8,"".$elrctot."",1,1,"C",FALSE);

$pdf->SetFont("","B","14");
$pdf->Cell(90,8,"TOTAL",1,0,"",FALSE);
$pdf->Cell(90,8,"".$total."",1,1,"C",FALSE);

$pdf->Output();


}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('No pending cases within the selected range')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}
?>

