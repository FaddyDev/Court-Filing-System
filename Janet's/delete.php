
<?php
//Connect to database via another page
include_once("dbconn.php");
?>

<?php
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql="DELETE FROM Case_Details WHERE Sr='".$id."' ";
//$result=mysqli_query($sql) or die("Could not delete".mysqli_error());
$result=$conn->query($sql);
echo ("<script language='javascript'> window.alert('Deleted successfully')</script>");
echo "<meta http-equiv='refresh' content='0;url=view.php'> ";
}

?>