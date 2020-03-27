<?php
include("../config/connect.php");
$email= dbp($_POST['field_email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
    <title>User Dashboard</title>
</head>
<body>
    <header>
        <div class="nav">
            <h1 <?php echo "Hallo $email";?>>
            <a href="uitlog.php" class="btn logout-button"><b>Uitloggen</a>
        </div>
    </header>
</body>
</html>