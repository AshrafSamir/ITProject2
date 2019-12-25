<?php

session_start(); 

if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
 }
 if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
}


if(isset($_POST['update'])){

	
$id = $_POST["id"];	
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password_1"];
$password = md5($password);


$con=mysqli_connect("localhost","root","","registration");


$q=mysqli_query($con,"UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE id = $id");
if ($q)
{
	header("Location: selectAll.php");
}
else
{
	echo "not inserted";
}
mysqli_close($con);

}

?>
