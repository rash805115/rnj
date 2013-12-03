<?php

?>

<html>
	<head>
		<title>RNJ - User History</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
		<div id="wrapper">
			<?php include (__DIR__ . "/../include.php"); ?>
			<table border="1">
				<tr>
					<th>Product Name</th>
					<th>Purchase Date</th>
					<th>Quantity</th>
				</tr>
				<?php
				foreach($result as $history)
				{
					$id = phpsec\SQL("SELECT * FROM transaction WHERE tid = ?", array($history['tid']));
					$name = phpsec\SQL("SELECT pname FROM product WHERE pid = ?", array($id[0]['pid']));
					$date = gmdate("Y-m-d H:i:s", $id[0]['date']);
					echo "
						<tr><td>{$name[0]['pname']}</td><td>{$date}</td><td>{$id[0]['quantity']}</td></tr>
					";
				}
				?>
			</table>
		</div>
	</body>
</html>