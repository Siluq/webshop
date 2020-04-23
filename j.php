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