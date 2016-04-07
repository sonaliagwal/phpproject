<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('connect_db.php');
 session_start();
 
$type=$_SESSION['type'];
$lid=$_SESSION['lid'];
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['rid']))
 {
 // get id value
 $id = $_GET['rid'];
 if($type==1)
 {// delete the entry
 	
 $result = mysql_query("DELETE FROM room WHERE room_id=$id")
 or die(mysql_error()); 
  header("Location: view.php");
 }
 else
 {
 	$result = mysql_query("SELECT l_id FROM room where room_id=$id") 
		or die(mysql_error()); 
		while($row = mysql_fetch_array( $result )) {
			$l=$row['l_id'];
		} 
		if($l==$lid)
		{
 	$result = mysql_query("DELETE FROM room WHERE room_id=$id")
 or die(mysql_error()); 
 header("Location: view.php");
}
else
{
	echo "invalid manager";
}

 }
 // redirect back to the view page

 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: view.php");
 }
 
?>