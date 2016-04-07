
 <?php




 // connect to the database
 include('connect_db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
  $id = $_GET['bid'];
  $status = $_GET['status'];
 // save the data to the database
  if($status=='confrim')
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
 