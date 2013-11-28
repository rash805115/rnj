<?php

class ShowAsIsController extends phpsec\framework\DefaultController
{
	function Handle($Request)
	{
		$pageRequested = phpsec\HttpRequest::InternalPath();
		return require_once (__DIR__ . "/../../view/default/" . $pageRequested . ".php");
	}
}

?>
