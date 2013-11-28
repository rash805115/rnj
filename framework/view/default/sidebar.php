<?php

?>

<div id="sidebar">
	<h1>Categories</h1>
	<ul id="list">
		<?php
			$link1 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/products?category=0";
			$link2 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/products?category=1";
			$link3 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/products?category=2";
			$link4 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/products?category=3";
			$link5 = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/products?category=4";
		?>
		<li><a href=<?php echo $link1; ?> >Electronics</a></li>
		<li><a href=<?php echo $link2; ?> >Clothes</a></li>
		<li><a href=<?php echo $link3; ?> >Books</a></li>
		<li><a href=<?php echo $link4; ?> >Furniture</a></li>
		<li><a href=<?php echo $link5; ?> >Kitchen</a></li>				
	</ul>
</div>