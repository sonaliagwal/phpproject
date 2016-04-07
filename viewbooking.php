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
	$result = mysql_query("SELECT * FROM book where status='pending'") 
		or die(mysql_error());  
		

$status='confirm';
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>BOOK ID</th> <th>CHECKIN</th> <th>CHECKOUT</th><th>ADULTS</th><th>CHILDERNS</th><th>PRICE</th><th>STATUS</th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['b_id'] . '</td>';
		echo '<td>' . $row['checkin'] . '</td>';
		echo '<td>' . $row['checkout'] . '</td>';
		echo '<td>' . $row['adults'] . '</td>';
		echo '<td>' . $row['childern'] . '</td>';
		echo '<td>' . $row['price'] . '</td>';
		echo '<td>' . $row['status'] . '</td>';
		echo '<td><a href="status.php?bid=' . $row['b_id'] . '&event='. $status . '">confirm</a></td>';
		echo '<td><a href="status.php?bid=' . $row['b_id'] . '">Cancel</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>


</body>
</html>	