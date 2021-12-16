<?php
require("fpdf/fpdf.php");
$pdf=new FPDF();
//var_dump(get_class_methods($pdf))
$reg=$_POST['reg'];
$cs=$_POST['case'];
$yr=$_POST['yr'];
$mn=$_POST['mn']; 
$p=$_POST['p'];
$fld=$_POST['fld'];
$ttl=$_POST['ttl'];
$disp=$_POST['disp'];
$p2=$_POST['p2'];
$nem=$_POST['name'];
$pj=$_POST['pj'];
$desig=$_POST['desig'];
$dt=$_POST['date'];

$court='';
if(($cs=='CM CHILDREN') || ($cs=='CM CIVIL') || ($cs=='CM CRIMINAL') || ($cs=='CM PROBATE') || ($cs=='CM TRAFFIC') )
{ $court='CHIEF MAGITRATE '; }
else if(($cs=='CM KADHI'))
{ $court='KADHI '; }
else if(($cs=='HC PROBATE') || ($cs=='HC CIVIL') || ($cs=='HC CRIMINAL'))
{ $court='HIGH '; }
else if(($cs=='ELC'))
{ $court='ENVIRONMENT AND LAND '; }
else if(($cs=='ELRC'))
{ $court='EMPLOYMENT AND LABOUR RELATIONS '; }

$pdf->AddPage();
$pdf->SetFont("Times","","14");

//Convert month to uppercase
 $mn = strtoupper($mn);

$pdf->SetX(90);
$pdf->Cell(10,8,"THE JUDICIARY",0,1,'C');
$pdf->SetX(90);
$pdf->Cell(10,8,"IN THE ".$court." COURT OF KENYA",0,1,"C");
$pdf->SetX(90);
$pdf->Cell(10,8,"AT NYERI",0,1,"C");
$pdf->SetX(90);
$pdf->Cell(10,8,"MONTHLY CASE RETURNS AS @ ".$mn.", ".$yr."",0,2,"C");

$pdf->SetFont("","U","14");
$pdf->SetX(90);
$pdf->Cell(10,8,"TYPE OF CASE: ".$reg." (".$cs.") ",0,1,"C");


$pdf->SetFont("","","12");
$pdf->write(5,"\n");
$pdf->write(5,"i.   B/Fwd pending ..........".$p."............\n\n");
$pdf->write(5,"ii.  Filed* .................".$fld.".............\n\n");
$pdf->write(5,"iii. Total (i + ii) .........".$ttl."................\n\n");
$pdf->write(5,"iv. Disposed .................".$disp."..........\n\n");
$pdf->write(5,"v.  Pending (iii - iv) .......".$p2."............\n\n");

$pdf->SetFont("","B","U","10");
$pdf->SetX(10);
$pdf->Cell(10,8,"Verification Statement",0,1,"");


$pdf->SetFont("","","12");
$pdf->write(5,"\n");
$pdf->write(5,"NAME.....................".$nem."..............................\n\n");
$pdf->write(5,"P.J. NO...................".$pj."..........................\n\n");
$pdf->write(5,"DESIGNATION..............".$desig."..................\n\n");
$pdf->write(5,"SIGNATURE.........................................\n\n");
$pdf->write(5,"DATE......................".$dt."........................\n\n\n\n\n\n");

$pdf->SetFont("","U","14");
$pdf->SetX(10);
$pdf->Cell(10,8,"NOTES",0,1,"");

$pdf->SetFont("","","11");
$pdf->SetX(15);
$pdf->write(5,"i.   The cases brought forward (B/Fwd) in item (i) are the number of cases pending from the previous \n");
$pdf->SetX(20);
$pdf->write(5," month.\n");
$pdf->SetX(15);
$pdf->write(5,"ii.  *Filed in item (ii) includes cases filed during the month and cases which were closed before the date \n");
$pdf->SetX(20);
$pdf->write(5,"of the return but were re-opened during the reporting period.");


$pdf->Output();
?>

