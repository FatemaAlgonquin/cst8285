<?php
require_once ('abstractDAO.php');
require_once ('./model/userModel.php');
/**
 * Description of userDAO
 * @author Fatema
 */

class userAdminDAO extends abstractDAO {
	private $authenticated = false;
	private $username;
	private $lastLogin;
    private $adminId;
	
	function __construct() {
		try {
			parent::__construct ();
		} catch ( mysqli_sql_exception $e ) {
			throw $e;
		}
	}
	
	public function authenticate($username, $password){
		$query = "SELECT * FROM adminusers WHERE username = ? AND password = ?";
		$stmt = $this->mysqli->prepare($query);
		$stmt->bind_param('ss', $username, $password);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows == 1){
			$this->username = $username;
			//$this->password = $password;
			$this->authenticated = true;
			$user = $result->fetch_assoc();
			if(!is_null($user['Lastlogin'])){
				// database has lastLogin date.
				$this->lastLogin = $user['Lastlogin'];
                $this->adminId = $user['AdminID'];
			}else{
				// first time login
				$this->lastLogin = 'never';
			}
			
			// regardless first login or not, we should update lastLogin value with current time.
			$query = "UPDATE adminusers SET lastLogin = now() WHERE username = ? AND password = ?";
			$stmt = $this->mysqli->prepare($query);
			$stmt->bind_param('ss', $username, $password);
			$stmt->execute();
		
			
		}
		$stmt->free_result();
	}
	
	public function isAuthenticated(){
		return $this->authenticated;
	}
	
	public function getLastLoginDate(){
		return $this->lastLogin;
	}
	
	public function getUserName(){
		return $this->username;
	}
    
    public function getAdminId(){
		return $this->adminId;
	}
}
?>
