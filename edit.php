<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($r_type,$desc, $charge, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 <form action="" method="post">
 <div>
 <strong>room type: *</strong> <input type="text" name="r_type" value="<?php echo $r_type; ?>" /><br/>
 <strong>room description: *</strong> <input type="textarea" name="desc" value="<?php echo $desc; ?>" /><br/>
  <strong>charges: *</strong> <input type="text" name="charge" value="<?php echo $charge; ?>" /><br/>
 <p>* required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>

 <?php
 }



 // connect to the database
 include('connect_db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 
 // get form data, making sure it is valid
 $id = $_POST['r_type'];
 $r_type = mysql_real_escape_string(htmlspecialchars($_POST['r_type']));
 $desc= mysql_real_escape_string(htmlspecialchars($_POST['desc']));
 $charge = mysql_real_escape_string(htmlspecialchars($_POST['charge']));
 
 // check that firstname/lastname fields are both filled in
 if ($r_type== '' || $desc == '' || $charge == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($r_type,$desc, $charge, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE room SET r_desc='$desc',r_id=2,charge=$charge WHERE room_type='$r_type'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['room_type']) )
 {
 // query db
 $id = $_GET['room_type'];
 $result = mysql_query("SELECT * FROM room WHERE room_type='$id'")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 	$type=$row['room_type'];
 $desc = $row['r_desc'];
 $charge = $row['charge'];
 
 // show form
 renderForm($type,$desc, $charge, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>