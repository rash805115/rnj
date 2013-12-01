<?php

class UserPaymentController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$userID = require_once(__DIR__ . '/../users/isuserlogged.php');
		
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		$productIDs = $userSession->getData("productids");
		$productIDs = $productIDs[0]['VALUE'];
		
		return require_once(__DIR__ . "/../../view/default/user/payment.php");
	}
}

?>
