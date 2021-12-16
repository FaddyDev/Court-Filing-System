<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>View Case Data</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
				<script>
		$(function(){
		$("input,select,textarea").attr("autocomplete","off");
		});
		</script>

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
ftable {
margin:0.5%;
background-color:white;
border:pink;
margin-left:20%;}
li,ul{
			background-color:#000000;
			font:200;
			font-size:large;}
	#sr{
	width:100%;
	background-color:#FFCCCC;}
	
	#veri{
	width:100%;
	padding:0;
	}
	#veri{
	width:100%;
	padding:0;
	}
	#veri td{
	margin:2%;	}
	
#verify{
				float:right;
				border-style:groove;
				border-radius:5px;
				margin:5px;
				background-color:aliceblue;
				}
				#verify:hover {
    			color: red;
				border:groove;
					}
				#verify:active {
    			background-color: yellow;
				}
				#container{
				min-height:600px;
				margin-bottom:2%;
				height:90%;
				width:100%;}
				#main{
				text-align:center;
				width:70%;
				float:left;
				min-height:600px;
				}
				
				#side{
				width:27%;
				float:right;
				min-height:400px;}
				
			#footer{
				color:#550000;
				font:"Times New Roman", Times, serif;
				font-size:20px;
				border:groove;
				text-align:center;}
				#fom{
				border:groove;
				width:83%;}
				
				#select{
				width:100%;
				margin:5px;
				border-style:outset;
				font-weight:100;
				background-color:#FFFFCC;}
				#select:active {
    			background-color: #FFFBF0;
				}
				#select:hover {
    			color: #2ABF55;
				border:none;
					}
					
					#submit{
				float:right;
				border-style:groove;
				border-radius:5px;
				margin-top:5px;
				margin-right:10%;
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

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Cases</title>
</head>

<body>

	<ul class="nav navbar-inverse nav-tabs">
<li role="presentation" style="float:right;"  ><a href="index.html"> <font color="#FFFFFF">CASE ENTRY </font></a></li>
   <li role="presentation" style="background-color:#FFFF99" ><a href="view.php"> <font color="#000000">VIEW</font> </a></li>
</ul>
<div id="container">
<div id="side">
<h4>SELECT SPECIFIC CASE DETAILS</h4>
 <form action="specific-verification.php" method="post" id="fom" > 
                   <table id="veri"><tr><td>Registry:</td><td><select id="select" name="reg" required>
                  	<option value=''>--Select Registry--</option>
                  <option value="CM CHILDREN">CM's Children</option>
  							<option value="CM CIVIL">CM's Civil</option>
  							<option value="CM CRIMINAL">CM's Criminal</option>
  							<option value="CM PROBATE">CM's Probate</option>
  							<option value="CM KADHI">CM's Kadhi</option>
							<option value="HC PROBATE">HC Probate</option>
							<option value="HC CIVIL">HC Civil</option>
							<option value="HC CRIMINAL">HC Criminal</option>
							<option value="ELC">ELC</option>
							<option value="ELRC">ELRC</option>
				</select></td> </tr>
				<tr><td>Case:</td><td><select id="select" name="case" required>
                  	<option value=''>Select Case</option>
                  	 		<option value="MISC">Misc</option>
  							<option value="DIVORCE">Divorce</option>
  							<option value="S.O.">Sexual Offences</option>
  							<option value="TRAFFIC">Traffic</option>
							<option value="CHILDREN">Children</option>
							<option value="KADHI">Kadhi</option>
							<option value="CIVIL">Civil</option>
  							<option value="CRIMINAL">Criminal</option>
							<option value="SUCC">Succ</option>
							<option value="ADOPT">Adoption</option>
							<option value="P&A">P & A</option>
							<option value="ELC">ELC</option>
							<option value="ELRC">ELRC</option>
				</select></td></tr> 
				<tr><td>Year:</td><td><select id="select" name="year">
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = 2015; i < year+1; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
  

</select></td></tr>
 <tr><td>Month</td> 
 <td><select id="select" onchange="show_month()" name="month">
    <option value=''>--Select Month--</option>
     <option selected value='January'>January</option>
    <option value='February'>February</option>
    <option value='March'>March</option>
    <option value='April'>April</option>
    <option value='May'>May</option>
    <option value='June'>June</option>
    <option value='July'>July</option>
    <option value='August'>August</option>
    <option value='September'>September</option>
    <option value='October'>October</option>
    <option value='November'>November</option>
    <option value='December'>December</option>
    </select> </td></tr>
	<tr> <td></td> <td> <input type="submit" name="verify" id="verify" value="Verify" /> </td>
	</tr></table></form>
	
	
	</br></br>
		<h4>SELECT RANGE FOR SPECIFIC CASES</h4>
 <form action="range.php" method="post" id="fom"> 
                   <table id="veri"><tr><td>Registry:</td><td><select id="select" name="reg" required>
                  	<option value=''>--Select Registries--</option>
					<option value="ALL">All Registries</option>
                  	 		<option value="CM CHILDREN">CM's Children</option>
  							<option value="CM CIVIL">CM's Civil</option>
  							<option value="CM CRIMINAL">CM's Criminal</option>
  							<option value="CM PROBATE">CM's Probate</option>
  							<option value="CM KADHI">CM's Kadhi</option>
  							<option value="CM TRAFFIC">CM's Traffic</option>
							<option value="HC PROBATE">HC Probate</option>
							<option value="HC CIVIL">HC Civil</option>
							<option value="HC CRIMINAL">HC Criminal</option>
							<option value="ELC">ELC</option>
							<option value="ELRC">ELRC</option>
				</select></td> </tr>
				<tr><td>Case:</td><td><select id="select" name="case" required>
                  	<option value=''>Select Case</option>
					<option value='ALL'>All Cases</option>
                  	 		<option value="MISC">Misc</option>
  							<option value="DIVORCE">Divorce</option>
  							<option value="S.O.">Sexual Offences</option>
  							<option value="TRAFFIC">Traffic</option>
							<option value="CHILDREN">Children</option>
							<option value="KADHI">Kadhi</option>
							<option value="CIVIL">Civil</option>
  							<option value="CRIMINAL">Criminal</option>
							<option value="SUCC">Succ</option>
							<option value="ADOPT">Adoption</option>
							<option value="P&A">P & A</option>
							<option value="ELC">ELC</option>
							<option value="ELRC">ELRC</option>
				</select></td></tr> 
				<tr><td>From:</td> <td><select id="select" name="year1" required>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = 2015; i < year+1; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
 
	</select></td> </tr>
	
					<tr><td> To:</td><td><select id="select" name="year2" required>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = 2015; i < year+1; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
 </select></td></tr>
<tr><td></td> <td> <input type="submit" name="verify" id="verify" value="View" /> </td>
	</tr>
	</table></form> 
	
	
		</br></br>
		
		
				
		<h4> <font color="#FFFFFF">SELECT RANGE OF PENDING CASES TO PRINT</font></h4>
 <form action="print-pending.php" method="post" id="fom" > 
                   <table id="veri">
				<tr><td>From:</td><td><select id="select" name="year" required>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = 2015; i < year+1; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
</select></td>

<td><select id="select" name="month" required>
    <option value=''>--Select Month From--</option>
    <option selected value='January'>January</option>
    <option value='February'>February</option>
    <option value='March'>March</option>
    <option value='April'>April</option>
    <option value='May'>May</option>
    <option value='June'>June</option>
    <option value='July'>July</option>
    <option value='August'>August</option>
    <option value='September'>September</option>
    <option value='October'>October</option>
    <option value='November'>November</option>
    <option value='December'>December</option>
    </select> </td>
</tr>

 <tr><td>To:</td> 
 	<td><select id="select" name="year2" required>
  <script>
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = 2015; i < year+1; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
</select></td>
 
 <td><select id="select" name="month2" required>
    <option value=''>--Select Month To--</option>
   <option selected value='January'>January</option>
    <option value='February'>February</option>
    <option value='March'>March</option>
    <option value='April'>April</option>
    <option value='May'>May</option>
    <option value='June'>June</option>
    <option value='July'>July</option>
    <option value='August'>August</option>
    <option value='September'>September</option>
    <option value='October'>October</option>
    <option value='November'>November</option>
    <option value='December'>December</option>
    </select> </td>
	
</tr>
	<tr> <td></td><td></td> <td> <input type="submit" name="verify" id="verify" value="Download" /> </td>
	</tr></table></form>
	
	</div>

<div id="main">
<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
$sql="SELECT * FROM Case_details ORDER BY Year";
$result=$conn->query($sql);

if($result->num_rows>0){
//Heading
echo "<center><h1>CASE DETAILS</h1></center>";

//Set up table and table heading
echo " <table border='2' cellpadding='5'><tr>  <th width='13%'>REGISTRY</th>  <th width='13%'>CASE</th> <th width='5%'>YEAR</th> <th width='5%'>MONTH</th> <th width='7%'>B/FWD PENDING</th> <th width='7%'>FILED</th> <th width='7%'>TOTAL </th> <th width='7%'>DISPOSED</th> <th width='8%'>PENDING</th>  <th width='10%' colspan='3'></th>  </tr>";
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
echo "<form action='print-all.php'><input type='submit' value='Download Table' name='download-all' id='submit'/></form> ";
//}

//To be used in case verificationdetails are to be viewed
//<td> ".$row["name"]." </td>
//<td> ".$row["pj"]." </td>
// <td> ".$row["desig"]." </td>
//<td>  ".$row["date"]."</td> 
}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('No case details to be displayed')</script>");
echo "<meta http-equiv='refresh' content='0;url=index.html'> ";}
?>
</div>
</div>
<script src="jquery-2.2.0.min.js">
        </script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js">
        </script>	
		
<div id="footer">
This site was developed by Makokha Barasa Fredrick,Steve Gumba Wachiuri and Janet Kadenyi  for Nyeri Law Courts.
</div>
</body>
</html>
