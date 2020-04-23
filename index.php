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
				echo '<script>window.location="index.php"</script>';
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
			<div class="small-logo-mobile"><a href="#header"><img src="assets/img/small-logo.png" alt=""></a></div>
			<ul class="main-nav">
				<li><a href="#header">Home</a></li>
				<li><a href="#Lampen">Lampen</a></li>
				<li class="small-logo"><a href="#header"><img src="assets/img/small-logo.png" alt=""></a></li>
				<li><a href="#contact">About us</a></li>
				<li><a href="login.php">Login/Register</a></li>
				<li class="checkout">
                	<?php
                    if(isset($_SESSION['shopping_cart'])){
                        $count = count($_SESSION['shopping_cart']);
                        echo "<a href=\"shoppingcart.php\">
                        <i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"><br>$count</i>
                    </a>";
                    } else
                        echo "<a href=\"shoppingcart.php\">
                        <i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"><br>0</i>
                    </a>"
                    ?>
                </li>
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
					<li><a href="#" data-filter="1">Tafellampen</a></li>
					<li><a href="#" data-filter="2">Buitenlampen</a></li>
					<li><a href="#" data-filter="3">Designlamp</a></li>
					<li><a href="#" data-filter="4">Bureaulamp</a></li>
				</ul>
			</div>

		</div>
		<div class="portfolioContainer fadeInUp delay-04s">
		<div class="width33" style="color: #FFF;">g</div>
		<?php
				$query = "SELECT * FROM product ORDER BY id ASC";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0);
				{
					while($row = mysqli_fetch_array($result))
					{
						$id = $row['id'];
						$img = $con->query("SELECT image FROM product_image WHERE product_id='$id'")->fetch_assoc()["image"];
				$filter = $row["category_id"];
				// var_dump($filter);
				?>
				<div class="col-md-4 <?php " $filter"?>">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" class="product-item" align="center">
						<div class="product_image">
							<?php
								echo '<a href="single.php?id=' . $row['id'] . '"><img src="assets/img/product-img/'.$img.'" class="img-fluid"></a>';
							?>
						</div>
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
	</section>
	<section class="main-section paddind" id="order">
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
							<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
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
	<!--main-section-end-->

	<section class="main-section paddind" id="contact">
		<div class="container">
			<h2>About us</h2>
			<h6>Who am I?</h6>
				<div class="row">
					<div class="col-lg-6 col-sm-7 wow fadeInLeft">
						<div class="contact-info-box address clearfix">
							<h3><i class=" icon-map-marker"></i> Address:</h3>
							<span>Koningin Wilhelminalaan 7 <br> Utrecht, Netherlands, 1234AB</span>
						</div>
						<div class="contact-info-box phone clearfix">
							<h3><i class="fa fa-phone"></i> Phone:</h3>
							<span> 06 17445400 </span>
						</div>
						<div class="contact-info-box email clearfix">
							<h3><i class="fa fa-pencil"></i> Email:</h3>
							<span> Sams-lamps@gmail.com</span>
						</div>
						<div class="contact-info-box hours clearfix">
							<h3><i class="fa fa-clock-o"></i> Hours:</h3>
							<span><strong> Monday - Friday: </strong> 10am - 6pm<br><strong></strong>
								<br><strong> Saturday - Sunday: </strong> Closed </span>
						</div>
					</div>
				</div>
		</div>
	</section>
	</div>
	<footer class="footer">
		<div class="container">
			<div class="footer-logo"><a href="#"><img src="assets/img/footer-logo.png" alt=""></a></div>
			<span class="copyright">
				<p>
					| Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> |
				</p>
				<div class="credits">
					<!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Knight
        -->
					<a href="https://bootstrapmade.com/"></a>
				</div>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function (e) {

			$('#test').scrollToFixed();
			$('.res-nav_click').click(function () {
				$('.main-nav').slideToggle();
				return false

			});

			$('.Portfolio-box').magnificPopup({
				delegate: 'a',
				type: 'image'
			});

		});
	</script>

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
	</script>


	<script type="text/javascript">
		$(window).load(function () {

			$('.main-nav li a, .servicelink').bind('click', function (event) {
				var $anchor = $(this);

				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 102
				}, 1500, 'easeInOutExpo');
				/*
				if you don't want to use the easing effects:
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1000);
				*/
				if ($(window).width() < 768) {
					$('.main-nav').hide();
				}
				event.preventDefault();
			});
		})
	</script>

	<script type="text/javascript">
		$(window).load(function () {


			var $container = $('.portfolioContainer'),
				$body = $('body'),
				colW = 375,
				columns = null;


			$container.isotope({
				// disable window resizing
				resizable: true,
				masonry: {
					columnWidth: colW
				}
			});

			$(window).smartresize(function () {
				// check if columns has changed
				var currentColumns = Math.floor(($body.width() - 30) / colW);
				if (currentColumns !== columns) {
					// set new column count
					columns = currentColumns;
					// apply width to container manually, then trigger relayout
					$container.width(columns * colW)
						.isotope('reLayout');
				}

			}).smartresize(); // trigger resize to set container width
			$('.portfolioFilter a').click(function () {
				$('.portfolioFilter .current').removeClass('current');
				$(this).addClass('current');

				var selector = $(this).attr('data-filter');
				$container.isotope({

					filter: selector,
				});
				return false;
			});

		});
	</script>

</body>

</html>