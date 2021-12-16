<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>Edit</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
		
						<link rel="stylesheet" href="datepicker/css/bootstrap.css">
		<link rel="stylesheet" href="datepicker/css/datepicker.css">
		<script src="datepicker/js/main.js"> </script>
		<script src="datepicker/js/bootstrap-datepicker.js"> </script>
				<script>
		 $(function(){
		  $('.datepicker').datepicker().on('changeDate',function(e){$(this).datepicker('hide'); });
		 });
		</script>
		
		<script>
		$(function(){
		$("input,select,textarea").attr("autocomplete","off");
		});
		</script>
		
		<script>
		//Limiting input to integers only
function numbersonly(e){
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8 & unicode!=46 & unicode!=37 & unicode!=39 ){ //if the key isn't the backspace,delete,left and right arrow keys (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}
		</script>
		
        <style>
        
				 td{
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
				 	jbackground-color:#FFCCFF;
					background-image:url(images/hd.jpg);
				 border-style:double;}
				 table{
				 margin-left:1%;
				 height:80%;
				 width:100%;
				 font-weight:bold;
				 font:"Times New Roman", Times, serif;
				 color:dark;}
				form{
				 margin-left:30%;
				  margin-top:2%;
				padding:2%;
				border:groove;
				width:50%;
				font-size:20px;
				
					}				
				#select{
				width:100%;
				margin:5px;
				border-style:outset;
				font-weight:100;
				background-color:#FFFFCC;}
				#select:active {
    			background-color: yellow;
				}
				#select:hover {
    			color: #2ABF55;
				border-style:none;
					}
				
				#entries{
				width:90%;
				margin:5px;
				border-style:inset;
				font-weight:100;
				background-color:aliceblue;
				}
				#entries:active {
    			background-color: yellow;
				}
				#entries:hover {
    			color: #2ABF55;
				border-style:none;
					}
				
				#submit{
				float:right;
				border-style:groove;
				border-radius:5px;
				margin:5px;
				font:bold;
				background-color:aliceblue;
				color:#3300FF;
				}
				#submit:hover {
    			color: red;
					}
				#submit:active {
    			background-color: yellow;
				}
				
				ul,li{
				font-family:"Times New Roman", Times, serif;
				font:xx-large;
				font-weight:bold;}
				
				#main{
				height:500px;
				min-height:690px;}
				
				#footer{
				color:#550000;
				font:"Times New Roman", Times, serif;
				font-size:20px;
				border:groove;
				text-align:center;
				borde
				}
			
        </style>
		
		
<script type="text/javascript">
 Function Years()
 { 
  var myDate = new Date();
  var year = myDate.getFullYear();
  for(var i = 1990; i < year+1; i++){
	  document.write('<option value="'+i+'">'+i+'</option>');
  }
  </script>
 
	
    </head>
    <body>
	
<ul class="nav navbar-inverse nav-tabs">
<li role="presentation" style="float:right;"  ><a href="view.php"> <font color="#FFFFFF">VIEW </font></a></li>
<li role="presentation" style="float:right;"  ><a href="index.html"> <font color="#FFFFFF">ENTER CASE DETAILS </font></a></li>
   <li role="presentation" style="background-color:#FFFF99" ><a href="#"> <font color="#000000">EDIT</font> </a></li>
</ul>

<div id="main">
<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php

if(isset($_GET['edit']))
{
$id=$_GET['edit'];
$sql="SELECT * FROM Case_Details WHERE Sr='".$id."' ";
//$result=mysqli_query($sql) or die("Could not delete".mysqli_error());
$result=$conn->query($sql);


if($result->num_rows>0){
//Heading
echo "<center><h1>CASE DETAILS</h1></center>";

//Getting case details from database and display them on table in web page
while($row=$result->fetch_assoc()){
echo " <form method='post' action='update.php'> <table id='table1'>  <tr>  <td></td> <td> <input type='hidden' name='sr' id='sr' value='".$row["Sr"]."' /></td> </tr>
<tr> <td>Registry:</td> <td> <select id='select' name='reg' required>
                  	<option value='".$row["registry"]."'>".$row["registry"]."</option>
                  	 		<option value='CM CHILDREN'>CM's Children</option>
  							<option value='CM CIVIL'>CM's Civil</option>
  							<option value='CM CRIMINAL'>CM's Criminal</option>
  							<option value='CM PROBATE'>CM's Probate</option>
  							<option value='CM KADHI'>CM's Kadhi</option>
  							<option value='CM TRAFFIC'>CM's Traffic</option>
							<option value='HC PROBATE'>HC Probate</option>
							<option value='HC CIVIL'>HC Civil</option>
							<option value='HC CRIMINAL'>HC Criminal</option>
							<option value='ELC'>ELC</option>
							<option value='ELRC'>ELRC</option>
				</select> </td>
 </tr><tr><td>Case:</td><td><select id='select' name='case' required>
                  	<option value='".$row["case_type"]."'>".$row["case_type"]."</option>
                  	 		<option value='MISC'>Misc</option>
  							<option value='DIVORCE'>Divorce</option>
  							<option value='S.O.'>Sexual Offences</option>
  							<option value='TRAFFIC'>Traffic</option>
							<option value='CHILDREN'>Children</option>
							<option value='KADHI'>Kadhi</option>
							<option value='CIVIL'>Civil</option>
  							<option value='CRIMINAL'>Criminal</option>
							<option value='SUCC'>Succ</option>
							<option value='ADOPT'>Adoption</option>
							<option value='P&A'>P & A</option>
							<option value='ELC'>ELC</option>
							<option value='ELRC'>ELRC</option>
				</select></td></tr> 
<tr> <td>Year:</td><td>

<select id='select' name='yr'>
   <option value='".$row["year"]."'>".$row["year"]."</option>
     <option selected value='2015'>2015</option>
    <option value='2016'>2016</option>
    </select></td>
 </tr>
<tr> <td>Month:</td> <td> 
<select id='select' name='mn' required>
   <option value='".$row["month"]."'>".$row["month"]."</option>
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
<tr> <td>B/Fwd pending:</td><td> <input type='text' onKeyPress='return numbersonly(event)' name='p' id='entries' value='".$row["pending"]."' required/></td> </tr>
<tr> <td>Filed:</td><td> <input type='text' onKeyPress='return numbersonly(event)' name='fld' id='entries' value='".$row["filed"]."' required/></td> </tr>
 <tr> <td>Disposed:</td><td> <input type='text' onKeyPress='return numbersonly(event)' name='disp' id='entries' value='".$row["disposed"]."' required/></td> </tr>
 </tr>
 
 <tr> <td>Name:</td><td>
   <select id='select' id='entries' name='name' required>
    <option value='".$row["name"]."'>".$row["name"]."</option>
     <option value='Kepha Omagwa'>Kepha Omagwa</option>
    <option value='Mary Muturi'>Mary Muturi</option>
    <option value='Rosemary Nyamweru'>Rosemary Nyamweru</option>
    <option value='Patricia Ndiangui'>Patricia Ndiangui</option>
    <option value='John Mahinda'>John Mahinda</option>
    <option value='Ruth Kanogo'>Ruth Kanogo</option>
    <option value='Mary Njoroge'>Mary Njoroge</option>
    <option value='Ann Wambugu'>Ann Wambugu</option>
    <option value='Naomi Kariuki'>Naomi Kariuki</option>
	 <option value='Beatrice Mundia'>Beatrice Mundia</option>
	 <option value='Abdullah O Bidu'>Abdullah O Bidu</option>
    </select>
 </td> </tr>
<tr> <td>P.J.NO.:</td><td>
   <select id='select' id='entries' name='pj' required>
    <option value='".$row["pj"]."'>".$row["pj"]."</option>
     <option value='46569'>46569</option>
    <option value='55356'>55356</option>
    <option value='17764'>17764</option>
    <option value='7329'>7329</option>
    <option value='7866'>7866</option>
    <option value='9818'>9818</option>
    <option value='12405'>12405</option>
    <option value='26129'>26129</option>
    <option value='5597'>5597</option>
	<option value='55356'>55356</option>
	<option value='9559'>9559</option>
	<option value='28210'>28210</option>
    </select>
</td> </tr>
 <tr> <td>DESIGNATION:</td><td> <input type='text' name='desig' id='entries' value='".$row["desig"]."' required/></td> </tr>
 <tr> <td>DATE:</td><td> <input class='datepicker' type='text' name='date' id='entries' value='".$row["date"]."' required/></td> </tr>
 </tr>
 
 ";}
echo "<tr> <td> </td> <td>  </td> <td style='text-align:right'> <input type='submit' value='Update' size='10' id='submit' class='btn btn-warning'/></td></tr>";
echo "</table>";
echo "</form>";

}
else{
//When case table is empty
echo ("<script language='javascript'> window.alert('No case details to be displayed')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";}

}


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
