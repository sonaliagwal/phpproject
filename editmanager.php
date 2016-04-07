<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($mname,$email, $pass, $error)
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
 <strong>Manager name: *</strong> <input type="text" name="mname" value="<?php echo $mname; ?>" /><br/>
 <strong>email: *</strong> <input type="textarea" name="email" value="<?php echo $email; ?>" /><br/>
  <strong>password: *</strong> <input type="text" name="pass" value="<?php echo $pass; ?>" /><br/>
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

 $mnam = mysql_real_escape_string(htmlspecialchars($_POST['mname']));
 $emai= mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $pas= mysql_real_escape_string(htmlspecialchars($_POST['pass']));
 
 // check that firstname/lastname fields are both filled in
 if ($mnam== '' || $emai == '' || $pas == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($mnam,$emai, $pas, $error);
 }
 else
 { $id = $_GET['mid'];

 // save the data to the database
 mysql_query("UPDATE login SET username='$mnam',email='$emai',password='$pas' WHERE l_id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: viewmanager.php"); 
 }
 
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['mid']) )
 {
 // query db
 $id = $_GET['mid'];
 $result = mysql_query("SELECT * FROM login WHERE l_id='$id'")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 	$mname=$row['username'];
 $email = $row['email'];
 $pass = $row['password'];
 
 // show form
 renderForm($mname,$email, $pass, '');
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