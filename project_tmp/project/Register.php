<?php
// connect to data base
$db=mysqli_connect("localhost","root","","dbproject")







?>
<!DOCTYPE html>
<html>
<head>
	<title>Register and log in,out</title>
</head>
<body>
	<form action="Register.php" method="post">
		<table>
			<tr>

				<td>Username :</td>
				<td><input type="text" name="username" class="textInput"></td>

			</tr>
			<tr>
				
				<td>Email :</td>
				<td><input type="Email" name="email" class="textInput"></td>

			</tr>
			<tr>
				
				<td>Password :</td>
				<td><input type="Password" name="password" class="textInput"></td>

			</tr>
			<tr>
				
				<td>Confirm Password :</td>
				<td><input type="password" name="password2" class="textInput"></td>

			</tr>
			<tr>
				
				<td></td>
				<td><input type="submit" name="register_btn" value="Register"></td>

			</tr>
		</table>
	
	</form>
</body>
</html>