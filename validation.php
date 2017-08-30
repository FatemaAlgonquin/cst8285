<?php
include_once './model/customerModel.php';
include_once './dao/customerDAO.php';
// validation starts after submission . It check for name, phone number and email Address
if (isset ( $_POST ['btnSubmit'] )) { 
	
	$error = array ();
	
	// Validate First Name
	if (empty ( $_POST ['customerName'] )) {
		$customerName = '<p class="error">Customer Name should be filled in</p>';
		echo $customerName;
		$error ['firstName'] = $customerName;
	}
	
	// Validate Phone Number
	if (empty ( $_POST ['phoneNumber'] ) || ((! ctype_digit ( $_POST ['phoneNumber'] ) or (strlen ( $_POST ['phoneNumber'] ) != 10)))) {
		$errorPhone = '<p class="error" >Enter a valid phone number.</p>';
		echo $errorPhone;
		$error ['errorPhone'] = $errorPhone;
	}
	
	// Validate Email Address
	
	 if (empty ( $_POST ['emailAddress'] ) || (! filter_var ( $_POST ['emailAddress'], FILTER_VALIDATE_EMAIL ))) {
	  $errorEmail = '<p class="error">Enter a valid email address.</p>';
	  
	  echo $errorEmail;
	  $error ['errorEmail'] = $errorEmail;
	  }
	  
	  // Validate radio button:
	  if(!isset($_POST['referral'])){
	  	$errorRef = '<p class="error">Please Select: How did you hear about us?</p>';
	  	echo $errorRef;
	  	$error ['errorRef'] = $errorRef;
	  }
	   
	
}