<?php

class ProductController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		if ( ! preg_match("/^\d+$/", $_GET['category']) )
		{
			$_GET['category'] = 1;
		}
		
		$cat = $_GET['category'];
		return require_once(__DIR__ . "/../../view/default/product.php");
	}
}

?>
