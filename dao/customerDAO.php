<?php
require_once ('abstractDAO.php');
require_once ('./model/customerModel.php');

/**
 * Description of customerDAO
 * @author Fatema
 */
class customerDAO extends abstractDAO {
	function __construct() {
		try {
			parent::__construct ();
		} catch ( mysqli_sql_exception $e ) {
			throw $e;
		}
	}
	public function addCustomer($customer) {
		if (is_numeric ( $customer->getCustName () )) {
			return 'Customers cannot be a number.';
		}
		if (! $this->mysqli->connect_errno) {
			
			$query = 'INSERT INTO mailingList (customerName, phoneNumber, emailAddress, referrer) VALUES (?,?,?,?)';
			$stmt = $this->mysqli->prepare ( $query );
			$stmt->bind_param ( 'ssss', $customer->getCustName (), $customer->getphoneNumber (), $customer->getEmailAddress (), $customer->getReferrer () );
			
			// Execute the statement
			$stmt->execute ();
			if ($stmt->error) {
				echo '<p class="error">Error:' . '</p>';
				
				return $stmt->error;
			} else {
				echo '<p class="success">Thank you for Signing up.</p>';
				return $employee->getCustName () . ' added successfully!';
			}
		} else {
			return 'Could not connect to Database.';
		}
	}
	
	
	public function getCustomers() {
		// The query method returns a mysqli_result object
		$result = $this->mysqli->query ( 'SELECT * FROM mailingList' );
		$customres = Array ();
		
		if ($result->num_rows >= 1) {
			while ( $row = $result->fetch_assoc () ) {
				// Create a new customer object, and add it to the array.
				$customer = new CustomerModel ( null, $row ['customerName'], $row ['phoneNumber'], $row ['emailAddress'], $row ['referrer'] );
				$customres [] = $customer;
			}
			$result->free ();
			return $customres;
		}
		$result->free ();
		return false;
	}
	
	public function getCustomerByEmail($email){
		$query = 'SELECT * FROM mailingList WHERE emailAddress = ?';
		$stmt = $this->mysqli->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		
		$result = $stmt->get_result();
		if($result->num_rows >=1){
			$customers = Array();
			while($temp = $result->fetch_assoc()){
				$cust = new CustomerModel( _id, $temp['customerName'], $temp['phoneNumber'], $temp['emailAddress'], null);
				$customers [] = $cust; 
			}
			
			$result->free();
			return $customers;
		}
		$result->free();
		return false;
	}
}

?>
