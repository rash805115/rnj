<?php
	$userLoggedIn = FALSE;

	try
	{
		$userSession = new phpsec\Session();
		$sessionID = $userSession->existingSession();

		if ($sessionID != FALSE)
		{
			$userLoggedIn = TRUE;
		}
	}
	catch (Exception $e)
	{
		$this->error .= $e->getMessage() . "<BR>";
	}
?>

<div id="header">																																																																								
	<img <?php echo('src="' . "http://localhost/rnj/framework/file/images/ban.png" . '"'); ?> alt="banner" width=1000 height="222" border="0" usemap="#Map" />
	<BR>																																										
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css"> 
	
	<?php
		if ($userLoggedIn == TRUE)
		{
			$link1 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/index";
			$link2 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/cart";
			$link3 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/interests";
			$link4 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/settings";
			$link5 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/purchasehistory";
			
			echo "
				<ul id=\"menu\">
					<li><a href=\"{$link1}\" class=\"but1_active\">Home</a></li>
					<li><a href=\"{$link2}\" class=\"but2_active\">Shopping Cart</a></li>
					<li><a href=\"{$link3}\" class=\"but3_active\">Interests</a></li>
					<li><a href=\"{$link4}\" class=\"but4_active\">Settings</a></li>
					<li><a href=\"{$link5}\" class=\"but4_active\">Purchase History</a></li>
				</ul>
			";
		}
		else
		{
			echo "
				<ul id=\"menu\">
					<li><a href=\"home\" class=\"but1_active\">Home</a></li>
					<li><a href=\"signup\" class=\"but2_active\">Register</a></li>
					<li><a href=\"search\" class=\"but3_active\">Search</a></li>
					<li><a href=\"login\" class=\"but4_active\">Log in</a></li>
				</ul>
			";
		}
	?>
</div>
