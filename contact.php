

<!DOCTYPE html>
<html>
  <?php
        include 'header.php';
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
  	// POST mehtod performs 2 steps: 
  	// 1) Create customer record after form validation 
  	// 2) Store the uploaded file to a specific locaiton.
  	
    // Handle FORM submission.
    // for POST method, perform validation and file upload. Dont' display sign-up form.    	
  	
  	//1(a) Form validation 
  	include_once './model/customerModel.php';
  	include_once './dao/customerDAO.php';
  	include_once './validation.php';
  		
  	// 1(b) create customer
  	$servername = "127.0.0.1";
  	$username = "wp_eatery";
  	$password = "password";
  	$databaseName = "wp_eatery";
  	
  	$customerName = trim ( $_POST ['customerName'] );
  	$phoneNumber = trim ( $_POST ['phoneNumber'] );
  	$emailAddress = $_POST ['emailAddress'];
  	$referrer = $_POST ['referral'];
  	
  	
  	
  	if(empty($error) && isset($_FILES['myFile'])){
  	
  	
  		// 2. Handle file upload
  	
  		//the target_path is where we want the file moved too
  	
  		$file_name = basename( $_FILES['myFile']['name']);
  	
  		$target_path = dirname(__FILE__,2) . DIRECTORY_SEPARATOR . "files" . DIRECTORY_SEPARATOR . $file_name;
  	
  		$temp_path = $_FILES['myFile']['tmp_name'];
  		 
  		if(move_uploaded_file($temp_path, $target_path)) {
  			$fileUploaded = "The file ".  $file_name. " has been uploaded";
  			echo "<p>$fileUploaded</p>";
  		}
  		else{
  			echo "There was an error uploading the file, please try again!";
  		}
  	}
  	
  	if (isset($_POST['btnSubmit'])&& (empty($error))){
  		$cusModel = new CustomerModel("", $customerName, $phoneNumber, $emailAddress, $referrer);
  		$cusDAO = new customerDAO();
  		// if there is duplicate eamil don't add that customer
  		if($cusDAO->getCustomerByEmail($emailAddress)){
  			//echo 'Duplicate email detected. Create an account with another email address.';
  			
  			$dupEmail = '<p class="error">Duplicate email detected. Create an account with another email address</p>';
  			echo $dupEmail;
  			$error ['emailAddress'] = $dupEmail;
  		}else{
  			$cusDAO->addCustomer($cusModel);
  		}
  	}
  	
  	 	
  }
  
  if ($_SERVER['REQUEST_METHOD'] === 'GET' || !empty($error)){	
  	// This is GET request, so display the signup FORM.
?>
<body>
		<div id="content" class="clearfix">
			<aside>
				<h2>Mailing Address</h2>
				<h3>
					1385 Woodroffe Ave<br> Ottawa, ON K4C1A4
				</h3>
				<h2>Phone Number</h2>
				<h3>(613)727-4723</h3>
				<h2>Fax Number</h2>
				<h3>(613)555-1212</h3>
				<h2>Email Address</h2>
				<h3>info@wpeatery.com</h3>
			</aside>
			<div class="main">
				<h1>Sign up for our newsletter</h1>
				<p>Please fill out the following form to be kept up to date with
					news, specials, and promotions from the WP eatery!</p>
				<form name="frmNewsletter" id="frmNewsletter" method="post" enctype="multipart/form-data"
					action="<?php echo $_SERVER['PHP_SELF'];?>">
					<table>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="customerName" id="customerName"
								size='40'></td>
								
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input type="text" name="phoneNumber" id="phoneNumber"
								size='40'></td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="text" name="emailAddress" id="emailAddress"
								size='40'>
						
						</tr>
						<tr>
							<td>How did you hear<br> about us?
							</td>
							<td>Newspaper<input type="radio" name="referral"
								id="referralNewspaper" value="newspaper"> Radio<input
								type="radio" name='referral' id='referralRadio' value='radio'>
								TV<input type='radio' name='referral' id='referralTV' value='TV'>
								Other<input type='radio' name='referral' id='referralOther'
								value='other'>
						
						</tr>
						<tr>
						<td>
						Choose a file to upload<input type="file" name="myFile">
						</td>
						
						</tr>
						<tr>
							<td colspan='2'><input type='submit' name='btnSubmit'
								id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset'
								name="btnReset" id="btnReset" value="Reset Form"></td>
						</tr>
					</table>
				</form>
			</div>
			<!-- End Main -->
		</div>
		<!-- End Content -->
<?php
 }
include 'footer.php';
?>
	<!--  </div> -->
	<!-- End Wrapper -->
</body>
</html>
