<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
//PDF USING MULTIPLE PAGES

require('fpdf/fpdf.php');

//Connect to your database
//include("conectmysql.php");

//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();
$reg=$_POST['reg'];
$case=$_POST['case'];
$yr1=$_POST['year1'];
$yr2=$_POST['year2'];
//Add title
if(($reg=='ALL') & ($case!='ALL')) {
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"NYERI LAW COURTS",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"MONTHLY CASE RETURNS FOR ".$case." FROM ".$yr1." TO ".$yr2." ",0,1,"C");
//set initial y axis position per page
$y_axis_initial = 25;
$row_height = 8;
//print column titles


		$pdf->SetY($y_axis_initial);
$pdf->SetFont("","B","11");		
$pdf->SetX(10);
$pdf->Cell(30,8,"REGISTRY",1,0,"C",FALSE);
$pdf->Cell(20,8,"CASE",1,0,"C",FALSE);
$pdf->Cell(14,8,"YEAR",1,0,"C",FALSE);
$pdf->Cell(22,8,"MONTH",1,0,"C");
$pdf->Cell(35,8,"B/FWD PENDING",1,0,"C",FALSE);
$pdf->Cell(16,8,"FILED",1,0,"C",FALSE);
$pdf->Cell(16,8,"TOTAL",1,0,"C",FALSE);
$pdf->Cell(22,8,"DISPOSED",1,0,"C",FALSE);
$pdf->Cell(19,8,"PENDING",1,1,"C",FALSE);

$y_axis = $y_axis_initial + $row_height;

//Select the columns you want to show in your PDF file
$sql="SELECT * FROM Case_details WHERE case_type='".$case."' AND year BETWEEN '".$yr1."' AND '".$yr2."' ORDER BY Year ";
$result=$conn->query($sql);
}



else if(($reg=='ALL') & ($case=='ALL')) {
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"NYERI LAW COURTS",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"MONTHLY CASE RETURNS FROM ".$yr1." TO ".$yr2." ",0,1,"C");
//set initial y axis position per page
$y_axis_initial = 25;
$row_height = 8;
//print column titles


		$pdf->SetY($y_axis_initial);
$pdf->SetFont("","B","11");		
$pdf->SetX(10);
$pdf->Cell(30,8,"REGISTRY",1,0,"C",FALSE);
$pdf->Cell(20,8,"CASE",1,0,"C",FALSE);
$pdf->Cell(14,8,"YEAR",1,0,"C",FALSE);
$pdf->Cell(22,8,"MONTH",1,0,"C");
$pdf->Cell(35,8,"B/FWD PENDING",1,0,"C",FALSE);
$pdf->Cell(16,8,"FILED",1,0,"C",FALSE);
$pdf->Cell(16,8,"TOTAL",1,0,"C",FALSE);
$pdf->Cell(22,8,"DISPOSED",1,0,"C",FALSE);
$pdf->Cell(19,8,"PENDING",1,1,"C",FALSE);

$y_axis = $y_axis_initial + $row_height;

//Select the columns you want to show in your PDF file
$sql="SELECT * FROM Case_details WHERE year BETWEEN '".$yr1."' AND '".$yr2."' ORDER BY Year ";
$result=$conn->query($sql);
}



else if(($reg!='ALL') & ($case=='ALL')) {
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"NYERI LAW COURTS",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"MONTHLY CASE RETURNS FOR ".$reg." FROM ".$yr1." TO ".$yr2." ",0,1,"C");
//set initial y axis position per page
$y_axis_initial = 25;
$row_height = 8;
//print column titles


		$pdf->SetY($y_axis_initial);
$pdf->SetFont("","B","11");		
$pdf->SetX(10);
$pdf->Cell(30,8,"REGISTRY",1,0,"C",FALSE);
$pdf->Cell(20,8,"CASE",1,0,"C",FALSE);
$pdf->Cell(14,8,"YEAR",1,0,"C",FALSE);
$pdf->Cell(22,8,"MONTH",1,0,"C");
$pdf->Cell(35,8,"B/FWD PENDING",1,0,"C",FALSE);
$pdf->Cell(16,8,"FILED",1,0,"C",FALSE);
$pdf->Cell(16,8,"TOTAL",1,0,"C",FALSE);
$pdf->Cell(22,8,"DISPOSED",1,0,"C",FALSE);
$pdf->Cell(19,8,"PENDING",1,1,"C",FALSE);

$y_axis = $y_axis_initial + $row_height;

//Select the columns you want to show in your PDF file
$sql="SELECT * FROM Case_details WHERE registry='".$reg."' AND year BETWEEN '".$yr1."' AND '".$yr2."' ORDER BY Year ";
$result=$conn->query($sql);
}



else{
		$pdf->SetFont("Times","","14");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"NYERI LAW COURTS",0,1,"C");
		$pdf->SetX(95);
		$pdf->Cell(10,8,"MONTHLY CASE RETURNS FOR ".$reg." (".$case.") FROM ".$yr1." TO ".$yr2." ",0,1,"C");
//set initial y axis position per page
$y_axis_initial = 25;
$row_height = 8;
//print column titles


		$pdf->SetY($y_axis_initial);
$pdf->SetFont("","B","11");		
$pdf->SetX(10);
$pdf->Cell(30,8,"REGISTRY",1,0,"C",FALSE);
$pdf->Cell(20,8,"CASE",1,0,"C",FALSE);
$pdf->Cell(14,8,"YEAR",1,0,"C",FALSE);
$pdf->Cell(22,8,"MONTH",1,0,"C");
$pdf->Cell(35,8,"B/FWD PENDING",1,0,"C",FALSE);
$pdf->Cell(16,8,"FILED",1,0,"C",FALSE);
$pdf->Cell(16,8,"TOTAL",1,0,"C",FALSE);
$pdf->Cell(22,8,"DISPOSED",1,0,"C",FALSE);
$pdf->Cell(19,8,"PENDING",1,1,"C",FALSE);

$y_axis = $y_axis_initial + $row_height;

//Select the columns you want to show in your PDF file
$sql="SELECT * FROM Case_details WHERE (registry='".$reg."') AND (case_type='".$case."') AND (year BETWEEN '".$yr1."' AND '".$yr2."') ORDER BY Year ";
$result=$conn->query($sql);
}


//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 8;

while($row = mysqli_fetch_array($result))
{
$pdf->SetFillColor(255,255,255);
$pdf->SetFont("","","11");	
	//If the current row is the last one, create new page and print column title
	if ($i == $max)
	{
		$pdf->AddPage();
         
	   
		//print column titles for the current page
		$pdf->SetY($y_axis_initial);
		//$pdf->SetX(25);
		$pdf->SetFont("","B","14");
		$pdf->SetX(10);
$$pdf->Cell(30,8,"REGISTRY",1,0,"C",FALSE);
$pdf->Cell(20,8,"CASE",1,0,"C",FALSE);
$pdf->Cell(14,8,"YEAR",1,0,"C",FALSE);
$pdf->Cell(22,8,"MONTH",1,0,"C");
$pdf->Cell(35,8,"B/FWD PENDING",1,0,"C",FALSE);
$pdf->Cell(16,8,"FILED",1,0,"C",FALSE);
$pdf->Cell(16,8,"TOTAL",1,0,"C",FALSE);
$pdf->Cell(22,8,"DISPOSED",1,0,"C",FALSE);
$pdf->Cell(19,8,"PENDING",1,1,"C",FALSE);
		
		//Go to next row
		$y_axis = $y_axis + $row_height;
		
		//Set $i variable to 0 (first row)
		$i = 0;
	}
    $reg = $row['registry'];
	$case = $row['case_type'];
	$year = $row['year'];
	$mn = $row['month'];
	$bfwd = $row['pending'];
	$filed = $row['filed'];
	$total = $row['total'];
	$disp = $row['disposed'];
	$pend = $row['pending2'];

	$pdf->SetY($y_axis);
	$pdf->SetX(10);
	$pdf->Cell(30,8,$reg,1,0,'C',1);
	$pdf->Cell(20,8,$case,1,0,'C',1);
	$pdf->Cell(14,8,$year,1,0,'C',1);
	$pdf->Cell(22,8,$mn,1,0,'C',1);
	$pdf->Cell(35,8,$bfwd,1,0,'C',1);
	$pdf->Cell(16,8,$filed,1,0,'C',1);
	$pdf->Cell(16,8,$total,1,0,'C',1);
	$pdf->Cell(22,8,$disp,1,0,'C',1);
	$pdf->Cell(19,8,$pend,1,0,'C',1);

	//Go to next row
	$y_axis = $y_axis + $row_height;
	$i = $i + 1;
}

mysqli_close($conn);

//Send file
$pdf->Output();
?>
