
 <?php

 session_start();

 // connect to the database
 include('connect_db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
  $id = $_GET['bid'];
  $status = $_GET['event'];
 // save the data to the database
  if($status=='confirm')
 {
 	mysql_query("UPDATE book SET status='confirm' WHERE b_id=$id")
 or die(mysql_error()); 
}
else
{
 	$result = mysql_query("DELETE FROM book WHERE b_id=$id")
 or die(mysql_error()); 

 }
 // once saved, redirect back to the view page
 header("Location: viewbooking.php"); 
 ?>
 