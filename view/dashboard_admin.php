<?php
    include("../config/connect.php");
    if(isset($_POST["submit"])){
        // Geholpen door Tazio :kiss:
        // var_dump($_POST);
        $name = $_POST['naam'];
        $desc = $_POST['beschrijving'];
        $prijs = $_POST['prijs'];
        $kleur = $_POST['kleur'];
        $gewicht = $_POST['gewicht'];
        $img = $_POST['img'];
        $sql= "INSERT INTO product (`name`, `description`, `price`, `color`, `weight`) VALUES ('$name', '$desc', '$prijs', '$kleur', '$gewicht');";
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
        $prijs = $_POST['prijs'];
        $kleur = $_POST['kleur'];
        $gewicht = $_POST['gewicht'];
        $img = $_POST['img'];
        $sql = "UPDATE product SET `name`='$name', `description` ='$desc', `price`='$prijs', `color`='$kleur', `weight`='$gewicht' WHERE `id`=$id";
        $sqlimg = "UPDATE product_image SET `image` = '$img' WHERE `product_id` = '$id'";
        mysqli_query($con, $sql);
        var_dump(mysqli_error($con));
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/col_style.css">
    <title>Admin Dashboard</title>
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
        </div>
    </div>
</body>
</html>