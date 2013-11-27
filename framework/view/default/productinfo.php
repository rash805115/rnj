<?php

?>

<html>
	<head>
		<title>...........(Product name)...............</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
<div id="wrapper">	
	<?php include (__DIR__ . "/include.php"); ?>
	<div id="content_inside">
		<div id="main_block" class="style1">	
			<div id="item">
				<h4>
				
				Show sub categories(this product is from what Category )
				
				</h4><br />
				<div class="big_view">
                                    Place product's image here.
                                    <br />
				</div>
			</div>
			<div class="description">
				<p style="font-size:20px;color">
					Product Name:
				</p>
				<p style="font-size:20px;color">
					Product ID:
				</p>
				<p style="font-size:20px;color">
					Price:  
				</p>

                                <input type="submit" name="submit" id="submit" value="Submit">

			</div>
		</div>
	</div>
</div>
    </body>
</html>