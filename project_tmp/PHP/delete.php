<?php

$id=$_GET["id"];

$con=mysqli_connect("localhost","root","","registration");

$q=mysqli_query($con,"delete from users where id=".$id);

if ($q)
{
	header("Location: selectAll.php");
}
else
{
	echo "not deleted";
}
mysqli_close($con);

?>