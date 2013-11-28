<?php

?>

<html>
	<head>
		<title>RNJ - Settings</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
		<?php include (__DIR__ . "/../include.php"); ?>
		
		Click <a <?php $passresetURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/passwordreset"; echo "href='{$passresetURL}'"; ?> >here</a> to reset your password.
		<BR><BR><BR>
		Click <a <?php $passresetURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/updateaccount"; echo "href='{$passresetURL}'"; ?> >here</a> to update your account.
	</body>
</html>