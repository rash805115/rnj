<?php

class ProductInfoController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$userID = require_once(__DIR__ . '/../users/isuserlogged.php');
		
		$productID = $_GET['pid'];
		$productInfo = phpsec\SQL("SELECT * FROM product WHERE pid = ?", array($productID));
		
		if(count($productInfo) != 0)
		{
			$productSubCat = phpsec\SQL("SELECT kid, kkname FROM ptype WHERE kkid = ?", array($productInfo[0]['kkid']));
			$productCat = phpsec\SQL("SELECT kname FROM pkind WHERE kid = ?", array($productSubCat[0]['kid']));
			$imageURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/file/images/" . $productCat[0]['kname'] . "/" . $productInfo[0]['imageurl'];
		}
		else
		{
			$this->error .= "ERROR: This Product ID is not valid!";
		}
		
		return require_once(__DIR__ . "/../../view/default/productinfo.php");
	}
}

?>
