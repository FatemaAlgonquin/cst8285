<?php


require_once('./dao/userAdminDAO.php');
session_start();
if(isset($_SESSION['AdminID'])){
	if($_SESSION['AdminID']->isAuthenticated()){
		//session_write_close();
		header('Location:mailing_list.php');
	}
}else{
	$missingFields = false;
	if(isset($_POST['submit'])){
		if(isset($_POST['username']) && isset($_POST['password'])){
			if($_POST['username'] == "" || $_POST['password'] == ""){
				$missingFields = true;
			} else {
				//All fields set, fields have a value
				$userAdmindao = new userAdminDAO();
				//if(!$userAdmindao->hasDbError()){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$userAdmindao->authenticate($username, $password);
				if($userAdmindao->isAuthenticated()){
					$_SESSION['AdminID'] = $userAdmindao;
					header('Location: mailing_list.php');
				}
			}
		}
	}else{
		// GET request
		include 'header.php';
		?>
	<!DOCTYPE html>
	<html>
	    <head>
	        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	        <title>Week 12</title>
	    </head>
	    <body>
	        <!-- MESSAGES -->
	        
	        <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	        <table>
	            <tr>
	                <td>Username:</td>
	                <td><input type="text" name="username" id="username"></td>
	            </tr>
	            <tr>
	                <td>Password:</td>
	                <td><input type="password" name="password" id="password"></td>
	            </tr>
	            <tr>
	                <td><input type="submit" name="submit" id="submit" value="Login"></td>
	                <td><input type="reset" name="reset" id="reset" value="Reset"></td>
	            </tr>
	        </table>
	            
	        </form>
	    </body>
	</html>
	<?php
	}
}
?>
