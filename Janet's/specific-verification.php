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
         f   table {
				 height:80%;
				 margin-left:2%;
				width:20%;
				padding:10%;
				cel
				 }
				 td,th{
					dfont-size: 20px;
					font-family:"Times New Roman", Times, serif;
				 }
				 /*input{
				 	width:800px;
					border:1px solid ;
					padding:10px;
					font-size:25px;
					border-radius:5px;
					margin-bottom:10px
				 }*/
				 body{
				 	background-color:#FFCCFF;
					background-image:url(images/hd.jpg);
				 border-style:double;}
				
				fform{
				padding:2%;
				border:groove;
				width:30%;
				margin:2%;}
				
				#select{
				width:100%;
				margin:5px;
				border-style:outset;}
				
				#table1{
				width:80%;
				margin-left:4%;
				margin-right:4%;
				margin-bottom:4%;
				border-style:ridge;
				border:#FFFFCC;}
				#table1 th{
				width:0%;
				border-style:ridge;
				border:#FFFFCC;}
				#table1 td{
				width:0%;
				border-style:ridge;
				border:#FFFFCC;}
				
				#table2{
				width:25%;
				margin-left:40%;
				border-style:inset;
				border:#FFFFCC;}
				#table2 td{
				width:25%;
				margin:2px;
				}
				

				#select:active {
    			background-color: yellow;
				}
				#select:hover {
    			color: #2ABF55;
					}
				
				#in{
				width:100%;
				margin:5px;
				border-style:inset;
				}
				#in:active {
    			background-color: yellow;
				}
				#in:hover {
    			color: red;
					}
				
				#submit{
				float:right;
				border-style:groove;
				border-radius:5px;
				margin:5px;
				}
				#submit:hover {
    			color: red;
				border:red;
				border-style:ridge;
					}
				#submit:active {
    			background-color: yellow;
				}
				
				ul,li{
				font-family:"Times New Roman", Times, serif;
				font:xx-large;
				font-weight:bold;}
				
				#enter{
				margin:5px;
				border-style:inset;
				}
				#enter:hover {
    			color: red;
				border:#99FF99;

					}
				#enter:active {
    			background-color: yellow;
				border:#99FF99;
				}
				
				
				#entries{
				width:95%;
				margin:5px;
				border-style:inset;
				background-color:#FFFF99;
				}
				#sr{
				width:95%;
				background-color:#FFCCFF;
				background-color:#FFFF99;}
				
				nav{
				background-color:#000000;}
				
				#main{
				height:500px;
				max-height:600px;}
				
				#footer{
				color:#550000;
				font:"Times New Roman", Times, serif;
				font-size:20px;
				border:groove;
				text-align:center;}
				
				
        </style>
		
</head>

<body>
<div id="main">
	<ul class="nav navbar-inverse nav-tabs">
<li role="presentation" style="float:right;"  ><a href="view.php"> <font color="#FFFFFF">VIEW </font></a></li>
<li role="presentation" style="float:right;"  ><a href="index.html"> <font color="#FFFFFF">ENTER CASE DETAILS </font></a></li>
   <li role="presentation" style="background-color:#FFFF99" ><a href="verify.php"> <font color="#000000">VERIFY</font> </a></li>
</ul>



<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
$reg=$_POST['reg'];
$case=$_POST['case'];
$yr=$_POST['year'];
$mn=$_POST['month'];

$sql="SELECT * FROM Case_details WHERE registry='".$reg."' AND case_type='".$case."' AND month='".$mn."' AND year='".$yr."' ";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
echo "<center><h1>VERIFY CASE DETAILS</h1></center>";
//Set up table and table heading
echo "<form method='post' action='print.php'> <table id='table1'><tr> </th> <th width='22%'>REGISTRY</th> <th width='22%'>CASE</th> <th width='10%'>YEAR</th> <th width='10%'>MONTH</th> <th width='10%'>B/Fwd pending</th> <th width='10%'>Filed</th> <th width='10%'>Total (i+ii)</th> <th width='10%'>Disposed</th> <th width='10%'>Pending(iii-iv)</th>  </tr>";
//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo "<tr> 
<td> <input type='text' name='reg' id='entries' value='".$row["registry"]."' readonly=''/></td> 
<td> <input type='text' name='case' id='entries' value='".$row["case_type"]."' readonly=''/></td> 
<td> <input type='text' name='yr' id='entries' value='".$row["year"]."' readonly=''/></td> 
 <td> <input type='text' name='mn' id='entries' value='".$row["month"]."' readonly=''/></td> 
<td> <input type='text' name='p' id='entries' value='".$row["pending"]."' readonly=''/></td> 
<td> <input type='text' name='fld' id='entries' value='".$row["filed"]."' readonly=''/></td> 
<td> <input type='text' name='ttl' id='entries' value='".$row["total"]."' readonly=''/></td> 
 <td> <input type='text' name='disp' id='entries' value='".$row["disposed"]."' readonly=''/></td> 
<td>  <input type='text' name='p2' id='entries' value='".$row["pending2"]."' readonly=''/></td> 
 </tr>";
echo "</table> ";


echo "<table id='table2'>";
echo "<tr> <td> NAME: </td> <td> <input type='text' name='name'  size='30'   id='enter' value='".$row["name"]."' readonly/></td></tr>";
echo "<tr> <td> P.J. NO. </td> <td> <input type='text' name='pj'  size='30'   id='enter' value='".$row["pj"]."' readonly=''/></td></tr>";
echo "<tr> <td> DESIGNATION </td> <td> <input type='text' name='desig'  size='30'   id='enter' value='".$row["desig"]."' readonly=''></td></tr>";
echo "<tr> <td> DATE </td> <td> <input type='text' name='date'  size='30' id='enter'  value='".$row["date"]."' readonly=''/></td></tr>";


echo "<tr> <td> </td> <td style='text-align:right'> <input type='submit' value='Download' size='10' id='submit' class='btn btn-warning'/></td></tr>";
echo "</table>";
echo "</form>";
}
}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('Speficified Case Details Not found in the database')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}

?>

<script src="jquery-2.2.0.min.js">
        </script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js">
        </script>
		
		</div>
		<div id="footer">
This site was developed by Makokha Barasa Fredrick,Steve Gumba Wachiuri and Janet Kadenyifor Nyeri Law Courts.
</div>
</body>
</html>
