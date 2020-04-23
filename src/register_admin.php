<?php


function setFormData(){
    //valideren van formulier ddata
    //formulier in ddatabase zetten
    //checken of dde data is opgeslagen
    global $con;

    $_POST;

    $username = mysqli_real_escape_string($con, trim($_POST['field_username']));
    $password  = mysqli_real_escape_string($con, trim($_POST['field_admin_password']));

    // Keep track of validated values
    $valid = array('check_username'=>false, 'check_password'=>false);
    // Validate username
    if( !empty($username) ) {
    if( strlen($username) >= 2 && strlen($username) <= 20 ) {
    if( !preg_match('/[^a-zA-Z\s]/', $username) ) {
        $valid['check_username'] = true;
        $username = dbp($_POST['field_username']);
        echo 'Username is OK! <br/>';
    }else{
        echo 'Username can contain only letters!<br/>';
    }
    }else{
    echo 'Username must be between 2 and 20 characters long!<br/>';
    }
    }else{
    echo 'Username cannot be blank!<br/>';
    }
    // Validate password
    if( !empty($password) ) {
    if( strlen($password) >= 5 && strlen($password) <= 32 ) {
    $valid['check_password'] = true;
    $password = dbp($_POST['field_admin_password']);
    $password = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
    echo 'Password is OK!<br/>';
    }else{
    echo 'Password must be between 5 and 32 characters!<br/>';
    }
    }else{
    echo 'Password cannot be blank!<br/>';
    }


    if($valid['check_username'] && $valid['check_password']){
        $query1 = $con->prepare('INSERT INTO `admin` (`username`, `admin_password`) VALUES (?,?);');
    if ($query1 === false) {
        echo mysqli_error($con)." - ";
        exit(__LINE__);
    }
    $query1->bind_param('ss', $username, $password);
    if ($query1->execute() === false) {
        echo mysqli_error($con)." - ";
        exit(__LINE__);
    } else {
        header("Location: ../home_admin.php");
        return "Admin toegevoegd";
        $query1->close();
    }
}
}
?>