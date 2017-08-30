<?php
class CustomerModel {
	private $_id;
	private $customerName;
	private $phoneNumber;
	private $emailAddress;
	private $referrer;
	function __construct($_id, $customerName, $phoneNumber, $emailAddress, $referrer) {
		$this->setId ( $_id );
		$this->setCustName ( $customerName );
		$this->setphoneNumber ( $phoneNumber );
		$this->setEmailAddress ( $emailAddress );
		$this->setReferrer ( $referrer );
	}
	public function getId() {
		return $this->_id;
	}
	public function setId($_id) {
		$this->_id = $_id;
	}
	public function getCustName() {
		return $this->customerName;
	}
	public function setCustName($customerName) {
		$this->customerName = $customerName;
	}
	public function getphoneNumber() {
		return $this->phoneNumber;
	}
	public function setphoneNumber($phoneNumber) {
		$this->phoneNumber = $phoneNumber;
	}
	public function getEmailAddress() {
		return $this->emailAddress;
	}
	public function setEmailAddress($emailAddress) {
		$this->emailAddress = $emailAddress;
	}
	public function getReferrer() {
		return $this->referrer;
	}
	public function setReferrer($referrer) {
		$this->referrer = $referrer;
	}
}
?>