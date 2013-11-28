<?php
	try
	{
		$userSession = new phpsec\Session();
		$sessionID = $userSession->existingSession();

		if ($sessionID != FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/index";
			header("Location: {$nextURL}");
		}
	}
	catch (Exception $e)
	{
		$this->error .= $e->getMessage() . "<BR>";
	}
?>

<html>
	<head>
		<title>RNJ - E-Commerce Portal</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
		<div id="wrapper">
                    <?php include (__DIR__ . "/include.php"); ?>
                    <div id="content_inside">
                        <div id="main_block">
                            <div class="about">
                                <BR>
                                <h1> Welcome to RNJ</h1>
                                <BR>
                                <p style="font-size:22px;color:#574c4b;">&emsp;&emsp;We are "RNJ" online shopping store. We are confident that you enjoy many many products here. 
                                    You'll find clothing, electronics, make up, skin care products, games, books, sporting goods, and much, much more! BEST PRICE GUARANTEE!</p><br>
                                <BR><BR>
                                
                            </div>
                            <div class="fadein">
                                <!--This section is picture sile which will show image of product randomly-->
                                <!--Please echo product's image here-->
                                
                                <!--Three <img> below are used for testing "picture slide"-->
                                <img src="http://hereelsewhere.com/wp-content/uploads/2012/06/Chambre22-500x332.jpeg">
                                <img src="http://www.worlddesignhotels.com/wp-content/uploads/407/X%20Ordinary%20Room-500x332.jpg">
                                <img src="http://armywife101.com/wp-content/uploads/2012/09/DoubleTree-Suites-by-Hilton-exterior-photo-Downtown-Disney-Resort-Area-Hotels-500x332.jpg">
                            </div>
                            <!--This script is for picture slide-->
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                            <script>
                            $(function(){
                                    $('.fadein img:gt(0)').hide();
                                    setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
                            });
                            </script>
                        </div>
                    </div>
                </div>
	</body>
</html>
