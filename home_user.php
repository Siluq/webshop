<?php
    include("config/connect.php");
    include("src/login_user.php");
    include("config/session.php");

    if(!empty($_POST)){
        $chlogin = logIn();

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sams Webshop</title>
</head>
<body>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Sams Webshop<br> Login Page</h2>
            <p>Dit is de inlog pagina voor de users</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="post" action="<?= BASEHREF;?>src/login_user.php">
               <form>
                  <div class="form-group">
                     <label>E-mail adres</label>
                     <input type="text" class="form-control" name="field_email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label>Wachtwoord</label>
                     <input type="password" class="form-control" name="field_password" placeholder="Password">
                  </div>
                  <button type="submit" name="login" class="btn btn-info">Login</button> 
                  <a href="<?php echo BASEHREF; ?>view/register_user.php" class="btn btn-black">Registreer</a>
                  <a href="<?php echo BASEHREF; ?>" class="btn btn-secondary">Back</a>
               </form>
            </div>
        </div>
    </div>
   
</body>
</html>