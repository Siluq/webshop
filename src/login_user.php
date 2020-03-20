<?php
function logIn(){
  global $con; // Database connectie

  // Validate email
    if(isset($_POST['field_email'])){
      //checken of email is ingevuld
      //als de waarde true is
      $email= dbp($_POST['field_email']);
    }else{
        $email = "";
        echo "Email niet goed ingevuld";
    }
    //validate password
    if(isset($_POST['field_user_password'])){
      //checken of email is ingevuld
      //als de waarde true is
      $field_password= dbp($_POST['field_user_password']);
    }else{
        $field_password = "";
        echo "wachtwoord niet goed ingevuld";
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


  $qry = $con->query("SELECT email,user_password FROM user WHERE email = '{$email}';");
  if($qry === false){   
    echo mysqli_error($con)." - ";
  exit(__LINE__);
  }else {
    if(mysqli_num_rows($qry) == 1){
        
      //deze variable moest admin zijn ipv user
    while ($user = $qry->fetch_assoc()){
    //password check;

      if (password_verify($field_password, $user['user_password'])) {
        //Success! if given password and hash match other wise it will return false.
        $_SESSION['email'] = $email;
        echo "Hallo $email je bent ingelogd";
        header("Location: view/dashboard_user.php"); //login formulier pagina
        //hierna kan je nog een header toevoegen die verwijst naar een nieuw php bestand als je bent ingelogd.

      }else {
        //Invalid credentials
        echo "verkeerd wachtwoord";
      }
    }
  }else{
    echo "Gebruiker bestaat niet!";
  }
}
$qry->close();
}
?>