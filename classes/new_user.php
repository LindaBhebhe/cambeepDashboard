<?php

/**
*@author Linda Bhebhe
**/

if (isset($_POST['addUser']))
   

//input variables
$fname = '';
$lname = '';
$email = '';
$dob = '';
$gender = '';
$tel = '';

#Errors variables
$fname_error = '';
$lname_error = '';
$date_error = '';
$email_error = '';
$phone_error = '';
$password_error = '';
$gender_error = '';
$user_exists_error = '';
$is_ok = true;

require_once('database.php');

$sql = "SELECT * from user where email =  '$email'";
$result = execute($sql);

    
 


?>