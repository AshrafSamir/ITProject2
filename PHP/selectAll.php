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
?>

<?php

$con = mysqli_connect('localhost', 'root', '', 'registration');

mysqli_select_db($con,"registration");

$q=mysqli_query($con,"select * from users");

echo "<table border=2 width=100%>";
?>

<!DOCTYPE html>
<html>
<head>
  	<title>Registration system PHP and MySQL</title>
	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link rel="stylesheet" href="../CSS/formStyle.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div style="position: absolute; z-index: 9999;">
<div  class="container">
  	<div>
		<a style="margin:10px;" href="index.php" class="btn btn-primary my-2">Return</a>
	</div>
	<div  class="row">
		
		
        <div class="col-md-12">
        <div  class="table-responsive">
              <table style="margin-top:50px; position:absolute; z-index: 9999;"  id="mytable" class="table table-hover ">
                   
                   <thead>
                   
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>

                   </thead>
					<tbody>
					
					<?php
					$counter=1;
					while ($row=mysqli_fetch_assoc($q))
					{
						$id=$row["id"];
						$uname =$row["username"];
						echo "<tr>";
						
						echo "<td>".$counter;
						echo "<td>".$row["username"];
						echo "<td>".$row["email"];
						echo "<td>".$row["password"];
						echo "<td><p data-placement='top' data-toggle='tooltip' title='Edit'><a href='update.php?id=$id&username=$uname' class='btn btn-primary btn-xs glyphicon glyphicon-pencil' data-title='Edit' data-toggle='modal' data-target='#edit' ><span></span></a></p></td>";
						echo "<td><p data-placement='top' data-toggle='tooltip' title='Delete'><a href='delete.php?id=$id&username=$uname' class='btn btn-danger btn-xs glyphicon glyphicon-trash' data-title='Delete' data-toggle='modal' data-target='#delete' ><span></span></a></p>";
						echo "</tr>";
						$counter++;
					}
					
					echo "</table>";
				    mysqli_close($con);

				?>

					</tbody>
				</table>
				<!--
				<div  style="text-align:center; width:100%; z-index: 9999; margin-top: 5%;" class="col-sm-8 col-md-7 py-4">
						<h4 style="display: inline-block; "><a class="text-white btn btn-primary " role ="button" href="index.php" >Home</a></h4>
				</div>
				-->

	</div>
	</div>

	<div id="particles-js"></div>
  <!-- scripts -->
  <script src="../js/particles.min.js"></script>
  <script src="../JS/app.js"></script>
</body>
</html>



