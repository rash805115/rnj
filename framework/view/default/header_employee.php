<?php

?>

<div id="header">																																																																								
	<img <?php echo('src="' . "http://localhost/rnj/framework/file/images/ban.png" . '"'); ?> alt="banner" width=1000 height="222" border="0" usemap="#Map" />
	<BR>																																										
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css"> 
	
	<?php
		$link1 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/employee";
		$link2 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/viewstats";
		$link3 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/settings";
		$link4 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/index";
			
	
		echo "
			<ul id=\"menu\">
				<li><a href=\"{$link1}\" class=\"but1_active\">Home</a></li>
				<li><a href=\"{$link2}\" class=\"but2_active\">View Stats</a></li>
				<li><a href=\"{$link3}\" class=\"but4_active\">Settings</a></li>
				<li><a href=\"{$link4}\" class=\"but4_active\">Shop</a></li>
			</ul>
		";
	?>
</div>
