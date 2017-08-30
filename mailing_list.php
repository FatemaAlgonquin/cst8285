<?php
require_once ('./dao/userAdminDAO.php');
session_start ();
if (!isset($_SESSION ['AdminID']) || !$_SESSION ['AdminID']->getAdminID ()) {
	header('Location:userLogin.php');
} else {
	
	echo "Session AdminID = " . $_SESSION ['AdminID']->getAdminId () . "<br>";
	echo "Session id = " . session_id () . "<br>";
	echo "Last Login Date = " . $_SESSION['AdminID']->getLastLoginDate();
	?>
<!DOCTYPE html>
<html>
<?php
include ("header.php");
?>
<body>
	<div id="wrapper">
		<nav>
			<div id="menuItems">
				<ul>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		<div id="content" class="clearfix">
			<div class="main">
				                		<?php
								require_once ('./model/customerModel.php');
								require_once ('./dao/customerDAO.php');
								$cusDAO = new customerDAO ();
								$custname = $cusDAO->getCustomers ();
								
								try {
									if ($custname) {
										echo '<table border=\'1\'>';
										echo '<tr> <th>Customer Name</th> <th>Phone Number</th><th>Email Address</th><th>Referrer</th></tr>';
										foreach ( $custname as $cn ) {
											// get email address
											$emailAddress = $cn->getEmailAddress ();
											// hash emailAddress
											$hashed_email = password_hash($emailAddress, PASSWORD_DEFAULT);
											echo '<tr>';
											echo '<td>' . $cn->getCustName () . '</td>';
											echo '<td>' . $cn->getphoneNumber () . '</td>';
											echo '<td>' . $hashed_email .'</td>';
											echo '<td>' . $cn->getReferrer() .'</td>';
											echo '</tr>';
										}
										echo "</table>";
									}
								} catch ( Exception $e ) {
									echo '<h2>Error on page.<h2>';
									echo '<p>' . $e->getmessage () . '</p>';
								}
								
								?>
								</div>
		</div>
		<!-- End Content -->	
							<?php include 'footer.php';?> 
				        </div>
	<!-- End Wrapper -->
</body>
</html>
<?php
	}
?>							
			
			