<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('connect_db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['room_type']))
 {
 // get id value
 $id = $_GET['room_type'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM room WHERE room_type='$id'")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: view.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: view.php");
 }
 
?>