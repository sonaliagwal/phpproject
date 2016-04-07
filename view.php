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
	$result = mysql_query("SELECT * FROM room") 
		or die(mysql_error());  
		

	
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ROOM TYPE</th> <th>ROOM DECRIPTION</th> <th>CHARGES</th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['room_type'] . '</td>';
		echo '<td>' . $row['r_desc'] . '</td>';
		echo '<td>' . $row['charge'] . '</td>';
		echo '<td><a href="edit.php?room_type=' . $row['room_type'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?room_type=' . $row['room_type'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>
<p><a href="new.php">Add a new record</a></p>

</body>
</html>	