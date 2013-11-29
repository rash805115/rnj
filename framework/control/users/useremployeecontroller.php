<?php

class UserEmployeeController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$userID = require_once(__DIR__ . '/isuserlogged.php');
		
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		$typeOfEmployee = phpsec\SQL("SELECT type FROM XUSER WHERE USERID = ?", array($userID));
		
		if($typeOfEmployee[0]['type'] != 'e')
		{
			$url_to_redirect = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header('Location: '.$url_to_redirect);
		}
		
		$designation = phpsec\SQL("SELECT title FROM employee WHERE USERID = ?", array($userID));
		
		return require_once(__DIR__ . "/../../view/default/user/employee.php");
	}
}

?>
