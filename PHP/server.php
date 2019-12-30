<?php
include("User.php");
session_start();

// initializing variables
$user = new User();
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $sql = "SELECT `admin` FROM `users` WHERE `username` = '$username'";
  $admin = $db->query($sql);
  $admin = $admin->fetch_assoc();
  $admin = $admin['admin'];
  $_SESSION['admin'] = $admin;

  $errors = $user->register($username, $email, $password_1, $password_2,$errors, $db);
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You're now logged in";
  	header('location: index.php');
  }
}

// ... // ... 

// LOGIN USER
if (isset($_POST['login_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $sql = "SELECT `admin` FROM `users` WHERE `username` = '$username'";
  $admin = $db->query($sql);
  $admin = $admin->fetch_assoc();
  $admin = $admin['admin'];
  $_SESSION['admin'] = $admin;
  $answer = $user->login($username, $password,$db,$errors);
  
  if ($answer == 1) {
            
    $_SESSION['username'] = $username;
  
    $_SESSION['success'] = "You're now logged in";
    header('location: index.php');
  }else {
      array_push($errors, "Wrong username/password combination");
  }
}

?>