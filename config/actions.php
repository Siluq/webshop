<?php
require 'connect.php';
if( isset($_POST['submit']) ) {
		//stap 1
        // Get POST values
        $gender = mysqli_real_escape_string($con, trim($_POST['field_gender']));
        $firstname = mysqli_real_escape_string($con, trim($_POST['field_firstname']));
        $tussenvoegsel = mysqli_real_escape_string($con, trim($_POST['field_infixname']));
		$lastname = mysqli_real_escape_string($con, trim($_POST['field_lastname']));
		$email = mysqli_real_escape_string($con, trim($_POST['field_email']));
		$password  = mysqli_real_escape_string($con, trim($_POST['field_password']));

		// Keep track of validated values
		$valid = array('field_firstname'=>false, 'field_infixname'=>false, 'field_lastname'=>false, 'field_email'=>false, 'field_password'=>false);
		// Validate firstname
		if( !empty($firstname) ) {
		if( strlen($firstname) >= 2 && strlen($firstname) <= 40 ) {
		if( !preg_match('/[^a-zA-Z\s]/', $firstname) ) {
			$valid['field_firstname'] = true;
			echo 'Firstname is OK! <br/>';
		}else{
			echo 'Firstname can contain only letters!<br/>';
		}
		}else{
		echo 'Firstname must be between 2 and 40 characters long!<br/>';
		}
		}else{
		echo 'Firstname cannot be blank!<br/>';
        }
        // Validate tussenvoegsel
        if( !preg_match('/[^a-zA-Z\s]/', $tussenvoegsel) ) {
            $valid['field_infixname'] = true;
                echo 'Tussenvoegsel is OK! <br/>';
            }else{
                echo 'Tussenvoegsel can contain only letters!<br/>';
            }
            
		// Validate lastname
		if( !empty($lastname) ) {
		if( strlen($lastname) >= 2 && strlen($lastname) <= 40 ) {
		if( !preg_match('/[^a-zA-Z\s]/', $lastname) ) {
			$valid['field_lastname'] = true;
			echo 'Lastname is OK! <br/>';
		}else{
			echo 'Lastname can contain only letters!<br/>';
		}
		}else{
		echo 'Lastname must be between 2 and 40 characters long!<br/>';
		}
		}else{
		echo 'Lastname cannot be blank!<br/>';
		}
		// Validate email
		if( !empty($email) ) {
		if( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
		$valid['field_email'] = true;
		echo 'E-mail is OK!<br/>';
		}else{
		echo 'E-mail is invalid!<br/>';
		}
		}else{
		echo 'E-mail cannot be blank!<br/>';
		}
		// Validate password
		if( !empty($password) ) {
		if( strlen($password) >= 5 && strlen($password) <= 32 ) {
		$valid['field_password'] = true;
		$password = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
		echo 'Password is OK!<br/>';
		}else{
		echo 'Password must be between 5 and 32 characters!<br/>';
		}
		}else{
		echo 'Password cannot be blank!<br/>';
		}
		//stap 2
		if($valid['field_firstname'] && $valid['field_infixname'] && $valid['field_lastname'] && $valid['field_email'] && $valid['field_password']) {
			$query = "INSERT INTO `customer` (`firstName`, `middleName`, `lastName`, `email`, `password`) VALUES ('$firstname','$tussenvoegsel','$lastname','$email','$password')";
			$result = mysqli_query($con, $query) or die('Cannot insert data into database. '.mysqli_error($con));
			if($result) {
			  echo 'Data inserted into database.';
			  mysqli_free_result($result);
			}
		   }
		// formulier is verzonden!
       }
       header('Location:../login.php');
?>