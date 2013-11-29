<?php

class UserSettingsController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$userID = require_once(__DIR__ . '/../users/isuserlogged.php');
		
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		$typeOfEmployee = phpsec\SQL("SELECT type FROM XUSER WHERE USERID = ?", array($userID));
		
		return require_once(__DIR__ . "/../../view/default/user/settings.php");
	}
}

?>
