<?php

class UserCartController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$userID = require_once(__DIR__ . '/../users/isuserlogged.php');
		
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		if (isset($_COOKIE['PRODUCTID']))
		{
			$productsInCart = $_COOKIE['PRODUCTID'];
			$products = explode(",", $productsInCart);
		}
		
		return require_once(__DIR__ . "/../../view/default/user/cart.php");
	}
}

?>
