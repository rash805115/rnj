<?php

class ProductController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		return require_once(__DIR__ . "/../../view/default/productinfo.php");
	}
}

?>
