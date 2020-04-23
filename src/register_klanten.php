<?php


function setFormData(){
    //valideren van formulier ddata
    //formulier in ddatabase zetten
    //checken of dde data is opgeslagen
    global $con;

    $_POST;

    $gender = mysqli_real_escape_string($con, trim($_POST['field_gender']));
    $firstname = mysqli_real_escape_string($con, trim($_POST['field_firstname']));
    $tussenvoegsel = mysqli_real_escape_string($con, trim($_POST['field_infixname']));
    $lastname = mysqli_real_escape_string($con, trim($_POST['field_lastname']));
    $email = mysqli_real_escape_string($con, trim($_POST['field_email']));
    $password  = mysqli_real_escape_string($con, trim($_POST['field_password']));

    // Keep track of validated values
    $valid = array('check_firstname'=>false, 'check_infixname'=>false, 'check_lastname'=>false, 'check_email'=>false, 'check_password'=>false);
    // Validate firstname
    if( !empty($firstname) ) {
        if( strlen($firstname) >= 2 && strlen($firstname) <= 40 ) {
        if( !preg_match('/[^a-zA-Z\s]/', $firstname) ) {
            $valid['check_firstname'] = true;
            $firstName = dbp($_POST['fiel_firstname']);
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
        $valid['check_infixname'] = true;
        $tussenvoegsel = dbp($_POST['field_infixname']);
            echo 'Tussenvoegsel is OK! <br/>';
    }else{
        echo 'Tussenvoegsel can contain only letters!<br/>';
    }
        
    // Validate lastname
    if( !empty($lastname) ) {
        if( strlen($lastname) >= 2 && strlen($lastname) <= 40 ) {
        if( !preg_match('/[^a-zA-Z\s]/', $lastname) ) {
            $valid['check_lastname'] = true;
            $lastname = dbp($_POST['field_lastname']);
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
        $valid['check_email'] = true;
        $email = dbp($_POST['field_email']);
        echo 'Email is OK! <br/>';
    }else{
        echo 'Email cannot be blank!<br/>';
    }
    // Validate password
    if( !empty($password) ) {
        if( strlen($password) >= 5 && strlen($password) <= 32 ) {
        $valid['check_password'] = true;
        $password = dbp($_POST['field_password']);
        $password = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
        echo 'Password is OK!<br/>';
    }else{
        echo 'Password must be between 5 and 32 characters!<br/>';
    }
    }else{
        echo 'Password cannot be blank!<br/>';
    }


    if($valid['check_firstname'] && $valid['check_lastname'] && $valid['check_email'] && $valid['check_password']){
        $query1 = $con->prepare('INSERT INTO `customer` (`firstName`, `middleName`, `lastName`, `email`, `klanten_password`) VALUES (?,?,?,?,?);');
    if ($query1 === false) {
        echo mysqli_error($con)." - ";
        exit(__LINE__);
    }
    $query1->bind_param('sssss', $firstName, $tussenvoegsel, $lastname, $email, $password);
    if ($query1->execute() === false) {
        echo mysqli_error($con)." - ";
        exit(__LINE__);
    } else {
        header("Location: ../home_klanten.php");
        return "User toegevoegd";
        $query1->close();
    }
}
}
?>