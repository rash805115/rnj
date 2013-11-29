<?php

?>
<html>
	<head>
		<title>RNJ - Employee Home</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/../include.php"); ?>
                <div id="content_inside">
                    <div id="main_block">
                        <div class="about">
			    <h1>Employee Home Page</h1><BR><BR><BR>
			    <h3>Hello, <?php echo $userID; ?>.</h3>
			    <p>You designation is: <?php echo $designation[0]['title']; ?> in RNJ.</p><BR><BR>
                            <p>
                                You are now logged in to your RNJ account.<BR>
                                You are an Employee. Work Hard. Best Of Luck for today. :)
                                <BR><BR><BR>
                                Click <a <?php $logoutURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/logout"; echo "href='{$logoutURL}'"; ?> >here</a> to logout.
                            </p>
                        </div>
                    </div>
                </div>
             </div>
        </body>
</html>
