<?php

?>

<html>
	<head>
		<title>RNJ - Settings</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
            <div id="wrapper">
                <?php
		
		if($typeOfEmployee[0]['type'] == 'e')
			include (__DIR__ . "/../include_employee.php");
		else
			include (__DIR__ . "/../include.php"); 
		
		?>
                <div id="content_inside">
                    <div id="main_block">
                        <div class="about">
                            <h1>Manage your account</h1><BR>
                            <p>
                                Click <a <?php $passresetURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/passwordreset"; echo "href='{$passresetURL}'"; ?> >here</a> to reset your password.
                                <BR><BR>
                                Click <a <?php $passresetURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/updateaccount"; echo "href='{$passresetURL}'"; ?> >here</a> to update your account.
                            </p>
                        </div>
                    </div>
                </div>
             </div>
        </body>
</html>