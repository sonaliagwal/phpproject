<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>View Records</title>
</head>
<body>

<?php
/* 
	VIEW.PHP
	Displays all data from 'players' table
*/
session_start();

$lid=$_SESSION['lid'];
	// connect to the database
	include('connect_db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM login where r_id=2") 
		or die(mysql_error());  
		

	
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ID</th> <th>MANAGER NAME</th> <th>EMAIL</th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['l_id'] . '</td>';
		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		echo '<td><a href="editmanager.php?mid=' . $row['l_id'] . '">Edit</a></td>';
		echo '<td><a href="deletemanager.php?mid=' . $row['l_id'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>
<p><a href="newmanager.php">Add a new record</a></p>

</body>
</html>	