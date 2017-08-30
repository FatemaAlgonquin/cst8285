<!DOCTYPE html>
<html>
    <?php 
				include 'header.php';
				?>
    <body>
	
<?php
include 'Menuitem.php';

$menuItem1 = new Menuitem ( "The WP Burger", "Freshly made all-beef patty served up with homefries", 14 );
$menuItem2 = new Menuitem ( "WP Kebobs", "Tender cuts of beef and chicken, served with your choice of side", 17 );

$item1 = $menuItem1->getItemName ();
$des1 = $menuItem1->getDescription ();
$price1 = $menuItem1->getPrice ();

$item2 = $menuItem2->getItemName ();
$des2 = $menuItem2->getDescription ();
$price2 = $menuItem2->getPrice ();
date_default_timezone_set ( 'US/Eastern' );

?>
<div id="content" class="clearfix">
			<aside>
				<h2><?php  echo date('l'); ?>'s Specials</h2>

				<hr>
				<img src="images/burger_small.jpg" alt="Burger"
					title="Monday's Special - Burger">
				<h3><?php echo $item1; ?></h3>
				<p><?php echo $des1; ?> - $<?php echo $price1; ?></p>
				<hr>
				<img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
				<h3><?php echo $item2; ?></h3>
				<p><?php echo $des2; ?> - $<?php echo $price2; ?></p>
				<hr>
			</aside>
			<div class="main">
				<h1>Welcome</h1>
				<img src="images/dining_room.jpg" alt="Dining Room"
					title="The WP Eatery Dining Room" class="content_pic">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
					ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum</p>
				<h2>Book your Christmas Party!</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
					ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
					ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in
					reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
					pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum</p>
			</div>
			<!-- End Main -->
		</div>
		<!-- End Content -->
<?php
include 'footer.php';
?>
</div>
	<!-- End Wrapper -->
</body>
</html>
