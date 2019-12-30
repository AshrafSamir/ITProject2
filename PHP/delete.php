<?php

$id=$_GET["id"];
$username=$_GET["username"];

$con=mysqli_connect("localhost","root","","registration");

$q=mysqli_query($con,"delete from users where id=".$id);
$q=mysqli_query($con,"delete from game where username='$username'");

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