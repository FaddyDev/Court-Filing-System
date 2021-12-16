<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
         <title>Verification</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
<style>
body{
background-color:#FFCCFF;
background-image:url(images/hd.jpg);
border-style:double;}
h1{color:blue;
font-family:"Times New Roman", Times, serif;}
h3{color:blue;
font-family:"Times New Roman", Times, serif;
text-align:center;}

/*Make links appear orange when mouse hovered above them and white when clicked*/
a:active {
    background-color: white;
}

a:hover {
   color:black;
}
/*Set table headings colour to maroon*/
th {
   color:maroon;
   font-family:"Times New Roman", Times, serif;
}
/*Setting the colour of texts in the cells dark*/
td {
   color:dark;
   font-size:14px;
   background-color:#CCFFCC;
   text-align:center;
   
}
#entries{
background-color:#c0c0c0;
font-family:"Times New Roman", Times, serif;
font-size:16px;}
th{
background-color:aqua;
text-align:center;}

/*Setting table properties, background and border colours*/
table {
margin-right:2%;
background-color:white;
border:pink;
margin-left:2%;}
li,ul{
			background-color:#000000;
			font:200;
			font-size:large;}
	#sr{
	width:100%;
	background-color:#FFCCCC;}
	
	#veri{
	width:50%;
	}
	
	#verify{
	font:"Times New Roman", Times, serif;
	font-size:14px;
	color:#000000;
	font-weight:bold;
	}
	#verify:hover {
    			color: red;
				border:red;
				border-style:ridge;
					}
	#verify:active {
    			background-color: yellow;
				}
				#main{
				min-height:500px;
				max-height:600px;
				margin-bottom:4%;}
				
				#footer{
				color:#550000;
				font:"Times New Roman", Times, serif;
				font-size:20px;
				border:groove;
				text-align:center;}
				
				#submit{
				float:right;
				border-style:groove;
				border-radius:5px;
				margin-top:5px;
				margin-right:17%;
				background-color:aliceblue;
				}
				#submit:hover {
    			color: red;
				border:groove;
					}
				#submit:active {
    			background-color: yellow;
				}
</style>
		
</head>

<body>
<div id="main">
	<ul class="nav navbar-inverse nav-tabs">
<li role="presentation" style="float:right;"  ><a href="view.php"> <font color="#FFFFFF">VIEW </font></a></li>
<li role="presentation" style="float:right;"  ><a href="index.html"> <font color="#FFFFFF">ENTER CASE DETAILS </font></a></li>
   <li role="presentation" style="background-color:#FFFF99" ><a href="#"> <font color="#000000">VIEW RANGE</font> </a></li>
</ul>



<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
$reg=$_POST['reg'];
$case=$_POST['case'];
$yr1=$_POST['year1'];
$yr2=$_POST['year2'];

$court='';
if(($reg=='ALL') & ($case!='ALL')) {
$sql="SELECT * FROM Case_details WHERE case_type='".$case."' AND year BETWEEN '".$yr1."' AND '".$yr2."' ORDER BY Year ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
echo "<center><h1>CASE DETAILS</h1></center>";
//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='13%'>REGISTRY</th> <th width='13%'>CASE</th> <th width='5%'>YEAR</th> <th width='5%'>MONTH</th> <th width='7%'>B/Fwd PENDING</th> <th width='7%'>FILED</th> <th width='7%'>TOTAL </th> <th width='7%'>DISPOSED</th> <th width='8%'>PENDING</th>  <th width='10%' colspan='3'></th>  </tr>";
//To be used in case verificationdetails are to be viewed
//<th width='13%'>Name</th> <th width='5%'>P.J.No.</th> <th width='8%'>Designation</th> <th width='5%'>Date</th>


//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> ".$row["registry"]."</td>
<td> ".$row["case_type"]."</td> 
<td> ".$row["year"]." </td>
 <td> ".$row["month"]." </td> 
<td> ".$row["pending"]." </td> 
<td> ".$row["filed"]." </td>
<td> ".$row["total"]." </td>
 <td> ".$row["disposed"]." </td>
<td>  ".$row["pending2"]."</td> 

 
<td>  <a href='verify.php?ver=$row[Sr]'>Verify</a></td>
<td>  <a href='edit.php?edit=$row[Sr]'>Edit</a></td>
<td>  <a href='delete.php?del=$row[Sr]'>Delete</a></td> 
</tr>";}
echo "</table> ";
echo "<form action='print-range.php' method='post'>
<input type='hidden' value='".$reg."' name='reg' />
<input type='hidden' value='".$case."' name='case' />
<input type='hidden' value='".$yr1."' name='year1' />
<input type='hidden' value='".$yr2."' name='year2' />
<input type='submit' value='Download Table' name='download-all' id='submit'/></form> ";
//}

//To be used in case verificationdetails are to be viewed
//<td> ".$row["name"]." </td>
//<td> ".$row["pj"]." </td>
// <td> ".$row["desig"]." </td>
//<td>  ".$row["date"]."</td> 
}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('Speficified Case Details Not found in the database')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}

//All registries ends here
}





else if(($reg=='ALL') & ($case=='ALL')) {
$sql="SELECT * FROM Case_details WHERE year BETWEEN '".$yr1."' AND '".$yr2."' ORDER BY Year ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
//Heading
echo "<center><h1>CASE DETAILS</h1></center>";
//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='13%'>REGISTRY</th> <th width='13%'>CASE</th> <th width='5%'>YEAR</th> <th width='5%'>MONTH</th> <th width='7%'>B/Fwd PENDING</th> <th width='7%'>FILED</th> <th width='7%'>TOTAL </th> <th width='7%'>DISPOSED</th> <th width='8%'>PENDING</th>  <th width='10%' colspan='3'></th>  </tr>";
//To be used in case verificationdetails are to be viewed
//<th width='13%'>Name</th> <th width='5%'>P.J.No.</th> <th width='8%'>Designation</th> <th width='5%'>Date</th>


//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> ".$row["registry"]."</td>
<td> ".$row["case_type"]."</td> 
<td> ".$row["year"]." </td>
 <td> ".$row["month"]." </td> 
<td> ".$row["pending"]." </td> 
<td> ".$row["filed"]." </td>
<td> ".$row["total"]." </td>
 <td> ".$row["disposed"]." </td>
<td>  ".$row["pending2"]."</td> 

 
<td>  <a href='verify.php?ver=$row[Sr]'>Verify</a></td>
<td>  <a href='edit.php?edit=$row[Sr]'>Edit</a></td>
<td>  <a href='delete.php?del=$row[Sr]'>Delete</a></td> 
</tr>";}
echo "</table> ";
echo "<form action='print-range.php' method='post'>
<input type='hidden' value='".$reg."' name='reg' />
<input type='hidden' value='".$case."' name='case' />
<input type='hidden' value='".$yr1."' name='year1' />
<input type='hidden' value='".$yr2."' name='year2' />
<input type='submit' value='Download Table' name='download-all' id='submit'/></form> ";
//}

//To be used in case verificationdetails are to be viewed
//<td> ".$row["name"]." </td>
//<td> ".$row["pj"]." </td>
// <td> ".$row["desig"]." </td>
//<td>  ".$row["date"]."</td> 
}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('Speficified Case Details Not found in the database')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}

//All registries all cases ends here
}




else if(($reg!='ALL') & ($case=='ALL')) {
$sql="SELECT * FROM Case_details WHERE registry='".$reg."' AND year BETWEEN '".$yr1."' AND '".$yr2."' ORDER BY Year ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
//Heading
echo "<center><h1>CASE DETAILS</h1></center>";
//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='13%'>REGISTRY</th> <th width='13%'>CASE</th> <th width='5%'>YEAR</th> <th width='5%'>MONTH</th> <th width='7%'>B/Fwd PENDING</th> <th width='7%'>FILED</th> <th width='7%'>TOTAL </th> <th width='7%'>DISPOSED</th> <th width='8%'>PENDING</th>  <th width='10%' colspan='3'></th>  </tr>";
//To be used in case verificationdetails are to be viewed
//<th width='13%'>Name</th> <th width='5%'>P.J.No.</th> <th width='8%'>Designation</th> <th width='5%'>Date</th>


//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> ".$row["registry"]."</td>
<td> ".$row["case_type"]."</td> 
<td> ".$row["year"]." </td>
 <td> ".$row["month"]." </td> 
<td> ".$row["pending"]." </td> 
<td> ".$row["filed"]." </td>
<td> ".$row["total"]." </td>
 <td> ".$row["disposed"]." </td>
<td>  ".$row["pending2"]."</td> 

 
<td>  <a href='verify.php?ver=$row[Sr]'>Verify</a></td>
<td>  <a href='edit.php?edit=$row[Sr]'>Edit</a></td>
<td>  <a href='delete.php?del=$row[Sr]'>Delete</a></td> 
</tr>";}
echo "</table> ";
echo "<form action='print-range.php' method='post'>
<input type='hidden' value='".$reg."' name='reg' />
<input type='hidden' value='".$case."' name='case' />
<input type='hidden' value='".$yr1."' name='year1' />
<input type='hidden' value='".$yr2."' name='year2' />
<input type='submit' value='Download Table' name='download-all' id='submit'/></form> ";
//}

//To be used in case verificationdetails are to be viewed
//<td> ".$row["name"]." </td>
//<td> ".$row["pj"]." </td>
// <td> ".$row["desig"]." </td>
//<td>  ".$row["date"]."</td> 
}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('Speficified Case Details Not found in the database')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}

//All cases ends here
}



else{
$sql="SELECT * FROM Case_details WHERE (registry='".$reg."') AND (case_type='".$case."') AND (year BETWEEN '".$yr1."' AND '".$yr2."') ORDER BY Year ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
//Heading
echo "<center><h1>CASE DETAILS</h1></center>";
//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='13%'>REGISTRY</th> <th width='13%'>CASE</th> <th width='5%'>Year</th> <th width='5%'>Month</th> <th width='7%'>B/Fwd pending</th> <th width='7%'>Filed</th> <th width='7%'>Total (i+ii)</th> <th width='7%'>Disposed</th> <th width='8%'>Pending(iii-iv)</th> <th width='13%'>Name</th> <th width='5%'>P.J.No.</th> <th width='8%'>Designation</th> <th width='5%'>Date</th> <th width='10%' colspan='3'></th>  </tr>";
//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> ".$row["registry"]."</td>
<td> ".$row["case_type"]."</td> 
<td> ".$row["year"]." </td>
 <td> ".$row["month"]." </td> 
<td> ".$row["pending"]." </td> 
<td> ".$row["filed"]." </td>
<td> ".$row["total"]." </td>
 <td> ".$row["disposed"]." </td>
<td>  ".$row["pending2"]."</td> 

<td> ".$row["name"]." </td>
<td> ".$row["pj"]." </td>
 <td> ".$row["desig"]." </td>
<td>  ".$row["date"]."</td> 
<td>  <a href='verify.php?ver=$row[Sr]'>Verify</a></td>
<td>  <a href='edit.php?edit=$row[Sr]'>Edit</a></td>
<td>  <a href='delete.php?del=$row[Sr]'>Delete</a></td> 
</tr>";}
echo "</table> ";
echo "<form action='print-range.php' method='post'>
<input type='hidden' value='".$reg."' name='reg' />
<input type='hidden' value='".$case."' name='case' />
<input type='hidden' value='".$yr1."' name='year1' />
<input type='hidden' value='".$yr2."' name='year2' />
<input type='submit' value='Download Table' name='download-all' id='submit'/></form> ";
//}
}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('Speficified Case Details Not found in the database')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}
//specif cases ends here
}
?>

<script src="jquery-2.2.0.min.js">
        </script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js">
        </script>
		
		</div>
		<div id="footer">
This site was developed by Makokha Barasa Fredrick,Steve Gumba Wachiuri and Janet Kadenyi for Nyeri Law Courts.
</div>
</body>
</html>
