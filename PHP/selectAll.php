<a href="insert.php"> Insert New Car </a> <br>
<?php

$con = mysqli_connect('localhost', 'root', '', 'registration');

mysqli_select_db($con,"cars");

$q=mysqli_query($con,"select * from users");

echo "<table border=2 width=100%>";

$counter=1;
while ($row=mysqli_fetch_assoc($q))
	{
		$id=$row["id"];
		echo "<tr>";
		
		echo "<td>".$counter;
		echo "<td>".$row["username"];
		echo "<td>".$row["email"];
		echo "<td>".$row["password"];
		echo "<td><a href='update.php?id=$id'>update</a>";
		echo "<td><a href='delete.php?id=$id'>delete</a>";
		echo "</tr>";
		$counter++;
	}
	
	echo "</table>";
mysqli_close($con);

?>