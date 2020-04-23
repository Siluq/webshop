<?php
    include("../config/connect.php");
    include("../src/toevoegen_admin_adminpannel.php");
    include("../src/toevoegen_user_adminpannel.php");

    if(isset($_POST["submit"])){
        $name = $_POST['naam'];
        $desc = $_POST['beschrijving'];
        $cat = $_POST['category'];
        $prijs = $_POST['prijs'];
        $kleur = $_POST['kleur'];
        $gewicht = $_POST['gewicht'];
        $img = $_POST['img'];
        $sql= "INSERT INTO product (`name`, `description`, `category_id`, `price`, `color`, `weight`) VALUES ('$name', '$desc', '$cat', '$prijs', '$kleur', '$gewicht');";
        mysqli_query($con, $sql);

        $id = mysqli_insert_id($con);
        $sqlimg = "INSERT INTO product_image (`image`, `product_id`) VALUES ('$img', '$id');";
        mysqli_query($con, $sqlimg);
    }

    if(isset($_POST["submit2"])){
        // var_dump($_POST);
        $id = $_POST['id'];
        $name = $_POST['naam'];
        $desc = $_POST['beschrijving'];
        $cat = $_POST['category'];
        $prijs = $_POST['prijs'];
        $kleur = $_POST['kleur'];
        $gewicht = $_POST['gewicht'];
        $img = $_POST['img'];
        $sql = "UPDATE product SET `name`='$name', `description` ='$desc',`category_id`='$cat', `price`='$prijs', `color`='$kleur', `weight`='$gewicht' WHERE `id`=$id";
        $sqlimg = "UPDATE product_image SET `image` = '$img' WHERE `product_id` = '$id'";
        mysqli_query($con, $sql);
        mysqli_query($con, $sqlimg);
    }

    if(isset($_POST["submit3"])){
        // var_dump($_POST);
        $id = $_POST['id'];
        $sql = "DELETE FROM product WHERE `id`=$id";
        $sqlimg="DELETE FROM product_image WHERE `product_id` = '$id';";
        mysqli_query($con, $sql);
        mysqli_query($con, $sqlimg);
    }

    if(isset($_POST["submit4"])){
        setFormData();
    }

    if(isset($_POST["submit5"])){
        // var_dump($_POST);
        $id = $_POST['id'];
        $name = $_POST['field_username'];
        $admin_pass = $_POST['field_admin_password'];
        $sql = "UPDATE admin SET `username`='$name', `admin_password` ='$admin_pass' WHERE `id`=$id";
        mysqli_query($con, $sql);
    }

    if(isset($_POST["submit6"])){
        // var_dump($_POST);
        $id = $_POST['id'];
        $sql = "DELETE FROM admin WHERE `id`=$id";
        mysqli_query($con, $sql);
    }

    if(isset($_POST["submit7"])){
        setFormData2();
    }

    if(isset($_POST["submit8"])){
        $id = $_POST['id'];
        $fname = $_POST['field_firstname'];
        $iname = $_POST['field_infixname'];
        $lname = $_POST['field_lastname'];
        $email = $_POST['field_email'];
        $user_pass = $_POST['field_user_password'];
        $sql = "UPDATE user SET `firstName`='$fname', `middleName` ='$iname',`lastName`='$lname', `email`='$email', `user_password`='$user_pass' WHERE `id`=$id";        
        mysqli_query($con, $sql);
    }

    if(isset($_POST["submit9"])){
        // var_dump($_POST);
        $id = $_POST['id'];
        $sql = "DELETE FROM user WHERE `id`=$id";
        mysqli_query($con, $sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/MYstyle.css">
        <link rel="stylesheet" href="../assets/css/col_style.css">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../favicon.png" type="image/png">
    <link rel="shortcut icon" href="../favicon.ico" type="img/x-icon">
</head>
<body>
    <header>
        <div class="nav">
            <a href="uitlog.php" class="btn logout-button"><b>Uitloggen</a>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col mix col-lg-4 col-md-6">
                <h3>Product toevoegen</h3>
                <form method="post">
                    <div class="form-group"> 
                        <label>IMG toevoegen:</label>
                        <input type="file" class="form-control" name="img" required>
                    </div>
                    <div class="form-group">
                        <label>Product naam:</label>
                        <input type="text" class="form-control" name="naam" required>
                    </div>
                    <div class="form-group">
                        <label>Beschrijving:</label>
                        <input type="text" class="form-control" name="beschrijving" required>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="form-group">
                        <label>Prijs:</label>
                        <input type="text" class="form-control" name="prijs" required>
                    </div>
                    <div class="form-group">
                        <label>Kleur:</label>
                        <input type="text" class="form-control" name="kleur" required>
                    </div>
                    <div class="form-group">
                        <label>Gewicht:</label>
                        <input type="text" class="form-control" name="gewicht" required>
                    </div>
                    <input type="submit" name="submit" value="Aanmaaken" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>Product updaten</h3>
                <form method="post">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <div class="form-group"> 
                        <label>IMG:</label>
                        <input type="file" class="form-control" name="img" required>
                    </div>
                    <div class="form-group">
                        <label>Product naam:</label>
                        <input type="text" class="form-control" name="naam" required>
                    </div>
                    <div class="form-group">
                        <label>Beschrijving:</label>
                        <input type="text" class="form-control" name="beschrijving" required>
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="form-group">
                        <label>Prijs:</label>
                        <input type="text" class="form-control" name="prijs" required>
                    </div>
                    <div class="form-group">
                        <label>Kleur:</label>
                        <input type="text" class="form-control" name="kleur" required>
                    </div>
                    <div class="form-group">
                        <label>Gewicht:</label>
                        <input type="text" class="form-control" name="gewicht" required>
                    </div>
                    <input type="submit" name="submit2" value="Updaten" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>Product verwijderen</h3>
                <form method="post">
                    <div class="form-group">
                        <label>Product id:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <input type="submit" name="submit3" value="Verwijderen" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>Admin aanmaaken</h3>
                <form method="post">
                    <div class="form-group"> 
                        <label>username:</label>
                        <input type="text" class="form-control" name="field_username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="text" class="form-control" name="field_admin_password" id="passwd" required>
                    </div>
                    <input type="submit" name="submit4" value="Toevoegen" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>Admin aanpassen</h3>
                <form method="post">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <div class="form-group"> 
                        <label>Username:</label>
                        <input type="text" class="form-control" name="field_username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="text" class="form-control" name="field_admin_password" id="passwd" required>
                    </div>
                    <input type="submit" name="submit5" value="Aanpassen" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>Admin verwijderen</h3>
                <form method="post">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <input type="submit" name="submit6" value="Verwijderen" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>User aanmaaken</h3>
                <form method="post">
                        <div class="form-group">
                            <label for="fname">Naam</label>
                            <input type="text" name="field_firstname" id="fname"  class="form-control" placeholder="Voornaam" required />
                            <input type="text" name="field_infixname" class="form-control" placeholder="Tussenvoegsel" />
                            <input type="text" name="field_lastname" class="form-control" placeholder="Achternaam" required />
                        </div>
                        <div class="form-group">
                            <label for="fname">Email</label>
                            <input type="text" name="field_email" id="email"  class="form-control" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <label for="passwd">Wachtwoord</label>
                            <input type="password" name="field_user_password" class="form-control" id="passwd" placeholder="Wachtwoord" required />
                        </div>
                    <input type="submit" name="submit7" value="Toevoegen" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>User aanpassen</h3>
                <form method="post">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="fname">Naam</label>
                        <input type="text" name="field_firstname" id="fname"  class="form-control" placeholder="Voornaam" required />
                        <input type="text" name="field_infixname" class="form-control" placeholder="Tussenvoegsel" />
                        <input type="text" name="field_lastname" class="form-control" placeholder="Achternaam" required />
                    </div>
                    <div class="form-group">
                        <label for="fname">Email</label>
                        <input type="text" name="field_email" id="email"  class="form-control" placeholder="Email" required />
                    </div>
                    <div class="form-group">
                        <label for="passwd">Wachtwoord</label>
                        <input type="password" name="field_user_password" class="form-control" id="passwd" placeholder="Wachtwoord" required />
                    </div>
                    <input type="submit" name="submit8" value="Aanpassen" class="site-btn btn-full">
                </form>
            </div>
            <div class="col mix col-lg-4 col-md-6">
            <h3>User verwijderen</h3>
                <form method="post">
                    <div class="form-group">
                        <label>ID:</label>
                        <input type="text" class="form-control" name="id" required>
                    </div>
                    <input type="submit" name="submit9" value="Verwijderen" class="site-btn btn-full">
                </form>
            </div>
        </div>
    </div>
</body>
</html>