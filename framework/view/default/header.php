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
			echo "
				<ul id=\"menu\">
					<li><a href=\"index\" class=\"but1_active\">Home</a></li>
					<li><a href=\"cart\" class=\"but2_active\">Shopping Cart</a></li>
					<li><a href=\"settings\" class=\"but3_active\">Settings</a></li>
				</ul>
			";
		}
		else
		{
			echo "
				<ul id=\"menu\">
					<li><a href=\"home\" class=\"but1_active\">Home</a></li>
					<li><a href=\"signup\" class=\"but2_active\">Register</a></li>
					<li><a href=\"login\" class=\"but3_active\">Log in</a></li>
				</ul>
			";
		}
	?>
</div>
