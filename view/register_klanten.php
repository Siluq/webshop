<?php
    include("../config/connect.php");
    include("../src/register_klanten.php");
    if(isset($_POST["submit"])){
        setFormData();
    }
    ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/MYstyle.css">
        <title>User registratie</title>
        <link rel="icon" href="../favicon.png" type="image/png">
        <link rel="shortcut icon" href="../favicon.ico" type="img/x-icon">
    </head>
    <body>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Sams Webshop<br> Login Page</h2>
            <p>Dit is de registreer pagina voor de users</p>
        </div>
    </div>
    <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="register-form">
                    <form method="post" action="register_klanten.php">
                        <div class="form-group">
                            <label for="fname">Naam</label>
                            <input type="text" name="field_firstname" id="fname"  class="form-control" placeholder="Voornaam" required />
                            <input type="text" name="field_infixname" class="form-control" placeholder="Tussenvoegsel" />
                            <input type="text" name="field_lastname" class="form-control" placeholder="Achternaam" required />
                        </div>
                        <div class="form-group">
                            <label for="fname">Email</label>
                            <input type="text" name="field_klanten_email" id="email"  class="form-control" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <label for="passwd">Wachtwoord</label>
                            <input type="password" name="field_klanten_password" class="form-control" id="passwd" placeholder="Wachtwoord" required />
                        </div>
                        <input type="submit" name="submit" class="btn btn-info" value="Registreren" />
                        <a href="<?php echo BASEHREF; ?>home_klanten.php" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>