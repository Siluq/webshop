<?php
function logIn(){
  global $con; // Database connectie

  if(isset($_POST['login'])){
  // Validate email
    if(isset($_POST['field_email'])){
      //checken of email is ingevuld
      //als de waarde true is
      $email= dbp($_POST['field_email']);
    }
    //validate password
    if(isset($_POST['field_password'])){
      //checken of email is ingevuld
      //als de waarde true is
      $field_password= dbp($_POST['field_password']);
    }
    // if( !empty($email) ) {
    //   if( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    //     $valid['field_email'] = true;
    //     $firstName = dbp($_POST['field_email']);
    //     echo 'E-mail is OK!<br/>';
    //   }else{
    //     echo 'E-mail is invalid!<br/>';
    //   }
    // }else{
    //   echo 'E-mail cannot be blank!<br/>';
    // }
  }

  $qry = $con->query("SELECT email,user_password FROM user WHERE email = '{$email}';");
  if($qry === false){   
    echo mysqli_error($con)." - ";
  exit(__LINE__);
  }else {
    if($qry->num_rows == 1){
    while ($user = $qry->fetch_assoc()){
      //password check;

      if (password_verify($field_password, $user['user_password'])) {
        //Success! if given password and hash match other wise it will return false.
        $_SESSION['username'] = $admin['email'];
      }else {
        echo "$email ingelogt";
        //Invalid credentials
      }
    }
  }else{
    echo "Gebruiker bestaat niet!";
  }
}
$qry->close();
}
?>