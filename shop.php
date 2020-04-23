<?php
	session_start();
	include("config/connect.php");
	include("view/products.php");
	if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}



if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="shop.php"</script>';
			}
		}
	}
}
?>

<!doctype html <html <head <meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>Homepage</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link
	href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600'
	rel='stylesheet' type='text/css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
<link href="assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="assets/css/animate.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="assets/js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="assets/js/jquery.isotope.js"></script>
<script type="text/javascript" src="assets/js/wow.js"></script>
<script type="text/javascript" src="assets/js/classie.js"></script>
<script type="text/javascript" src="assets/js/magnific-popup.js"></script>

<!-- =======================================================
    Theme Name: Knight
    Theme URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
	======================================================= -->

</head>

<body>
	<header class="header" id="header">
		<!--header-start-->
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src="https://i.ya-webdesign.com/images/pixar-lamp-png-8.png" alt=""></a>
			</figure>
			<h1 class="animated fadeInDown delay-07s">Welcome to Sams lamps</h1>
			<ul class="we-create animated fadeInUp delay-1s">
				<li>Lets get you a lamp!</li>
			</ul>
			<a class="link animated fadeInUp delay-1s servicelink" href="#Lampen">Go!</a>
		</div>
	</header>
	<!--header-end-->

	<nav class="main-nav-outer" id="test">
		<!--main-nav-start-->
		<div class="container">
			<div class="small-logo-mobile"><a href="#header"><img src="img/small-logo.png" alt=""></a></div>
			<ul class="main-nav">
				<li><a href="#header">Home</a></li>
				<li><a href="shop.php">Lampen</a></li>
				<li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li>
				<li><a href="#contact">About us</a></li>
				<li><a href="login.php">Login/Register</a></li>
			</ul>
			<a class="res-nav_click" href="#"><i class="fa fa-bars"></i></a>
		</div>
	</nav>
	</header>
	<!--main-nav-end-->

	<section class="main-section paddind" id="Lampen">
		<!--main-section-start-->
		<div class="container">
			<h2>Lampen</h2>
			<h6>Get your lamps here!</h6>
			<div class="portfolioFilter">
				<ul class="Portfolio-nav wow fadeIn delay-02s">
					<li><a href="#" data-filter="*" class="current">All</a></li>
					<li><a href="#" data-filter=".1">Tafellampen</a></li>
					<li><a href="#" data-filter=".2">Buitenlampen</a></li>
					<li><a href="#" data-filter=".3">Designlamp</a></li>
					<li><a href="#" data-filter=".4">Bureaulamp</a></li>
				</ul>
			</div>

		</div>
		<div class="portfolioContainer wow fadeInUp delay-04s">
		<?php
				$query = "SELECT * FROM product ORDER BY id ASC";
				$query2 = "SELECT * FROM product_image ORDER BY product_id ASC";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0);
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<?php
    			echo '<div class="col-md-4 '$row["category_id"];">Hello</div>';
			?>
			<div class="col-md-4 2">
				<form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger"><?php echo $row["description"]; ?></h4>

						<h4 class="text-danger"><?php echo $row["color"];?>, <?php $row["weight"]; ?>Gram</h4>

						<h4 class="text-danger">product ID: <?php echo $row["id"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
		<?php
					}
				}
			?>

			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="shop.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
			<!-- <div class=" Portfolio-box 1">
				<img src="img/theater.jpg" alt="">
				<h3><b>Naam </b></h3>
				<h5>Beschrijving/kleur/gewicht/id</h5>
				<h5><b>prijs</b></h5>
				<a class="link animated servicelink" href="">In wingelmanddje!</a>
			</div>
			<div class="Portfolio-box 2">
				<img src="img/festival1.jpg" alt=""></a>
				<h3><b>Naam</b></h3>
				<h5>Beschrijving/kleur/gewicht/id</h5>
				<h5><b>prijs</b></h5>
				<a class="link animated servicelink" href="">In wingelmanddje!</a>
			</div>
			<div class=" Portfolio-box 3">
				<img src="img/6flags.jpg" alt=""></a>
				<h3><b>Naam</b></h3>
				<h5>Beschrijving/kleur/gewicht/id</h5>
				<h5><b>prijs</b></h5>
				<a class="link animated servicelink" href="">In wingelmanddje!</a>
			</div>
			<div class=" Portfolio-box 4">
				<img src="img/movie1.jpg" alt=""></a>
				<h3><b>Naam</b></h3>
				<h5>Beschrijving/kleur/gewicht/id</h5>
				<h5><b>prijs</b></h5>
				<a class="link animated servicelink" href="">In wingelmanddje!</a>
			</div>
			<div class=" Portfolio-box 2">
				<img src="img/festival2.jpg" alt=""></a>
				<h3><b>Naam</b></h3>
				<h5>Beschrijving/kleur/gewicht/id</h5>
				<h5><b>prijs</b></h5>
				<a class="link animated servicelink" href="">In wingelmanddje!</a>
			</div>
			<div class=" Portfolio-box 4">
				<img src="img/movie2.jpg" alt=""></a>
				<h3><b>Naam</b></h3>
				<h5>Beschrijving/kleur/gewicht/id</h5>
				<h5><b>prijs</b></h5>
				<a class="link animated servicelink" href="">In wingelmanddje!</a>
			</div> -->
		
		</section>
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>