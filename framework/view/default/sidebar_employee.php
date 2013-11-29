<?php

?>

<div id="sidebar">
	<h1>Categories</h1>
	<ul id="list">
		<?php
			$link1 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/employee";
			$link2 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/viewstats";
			$link3 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/settings";
		?>
		<li><a href=<?php echo $link1; ?> >Home - Employee</a></li>
		<li><a href=<?php echo $link2; ?> >View Stats</a></li>
		<li><a href=<?php echo $link3; ?> >Settings</a></li>			
	</ul>
</div>