<?php

?>
<html>
	<head>
		<title>RNJ - Home</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/../include.php"); ?>
                <div id="content_inside">
                    <div id="main_block">
                        <div class="about">
                            <h1>Hello, <?php echo $userID; ?>.</h1><BR>
                            <p>
                                You are already logged in to your RNJ account.<BR>
                                Enjoy shopping!
                                <BR><BR><BR>
                                Click <a <?php $logoutURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/logout"; echo "href='{$logoutURL}'"; ?> >here</a> to logout.
                            </p>
                        </div>
                    </div>
                </div>
             </div>
        </body>
</html>
