<?php
    include("config/connect.php");
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/MYstyle.css">
        <title>Sams Webshop Login</title>
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="shortcut icon" href="favicon.ico" type="img/x-icon">
    </head>
    <body>
        <div class="sidenav">
            <div class="login-main-text">
                <h2>Sams Webshop<br> Select page</h2>
                <p>Kies hier wat u bent.</p>
            </div>
        </div>
        <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <form method="post" action="<?= BASEHREF;?>">
                <form>
                    <a href="<?php echo BASEHREF; ?>home_klanten.php" class="btn btn-black">Klanten (werkt niet)</a>
                </form>
                <form>
                <a class="btn"></a>
                </form>
                <form>
                    <a href="<?php echo BASEHREF; ?>home_user.php" class="btn btn-black">User</a>
                    <a href="<?php echo BASEHREF; ?>home_admin.php" class="btn btn-black">Admin</a>
                </form>
                <form>
                <a class="btn"></a>
                </form>
                <form>
                    <a href="<?php echo BASEHREF; ?>" class="btn btn-secondary">Back</a>
                </form>
                </div>
            </div>
        </div>
    
    </body>
    </html>
    