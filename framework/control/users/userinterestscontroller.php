<?php

class UserInterestsController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$userID = require_once(__DIR__ . '/../users/isuserlogged.php');
		
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		$interestedProducts = phpsec\SQL("SELECT pid FROM `user_interested_product` WHERE USERID = ?", array($userID));
		
		return require_once(__DIR__ . "/../../view/default/user/interests.php");
	}
}

?>
