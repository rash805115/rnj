<?php
	if(isset($_POST['removefromcart']))
	{
		if(($key = array_search($_POST['pid'], $products)) !== FALSE)
		{
			unset($products[$key]);
		}
		
		$productsInCart = implode(",", $products);
		
		\setcookie("PRODUCTID", $productsInCart, \time() + 2592000, null, null, FALSE, TRUE);
		
		$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/cart";
		header("Location: {$nextURL}");
	}
?>

<html>
	<head>
		<title>RNJ - Shopping Cart</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
		<?php include (__DIR__ . "/../include.php"); ?>
		
		<div id='cart' name='cart'>
			<table id='table-cart' border='1'>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Product Image</th>
					<th>Remove</th>
				</tr>
				
				<?php
					for($i=0; $i<count($products); $i++)
					{
						$productInfo = phpsec\SQL("SELECT * FROM product WHERE pid = ?", array($products[$i]));
						if(count($productInfo) != 0)
						{
							$productSubCat = phpsec\SQL("SELECT kid, kkname FROM ptype WHERE kkid = ?", array($productInfo[0]['kkid']));
							$productCat = phpsec\SQL("SELECT kname FROM pkind WHERE kid = ?", array($productSubCat[0]['kid']));
							$imageURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/file/images/" . $productCat[0]['kname'] . "/" . $productInfo[0]['imageurl'];
							$productDesc = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/productinfo?pid=" . $products[$i];
							
							echo "
								<tr>
									<td>{$productInfo[0]['pid']}</td>
									<td>{$productInfo[0]['pname']}</td>
									<td>{$productInfo[0]['price']}</td>
									<td><a href=\"$productDesc\"><img src=\"{$imageURL}\"></a></td>
									<td>
										<form id='form-remove-cart' name='form-remove-cart' method='POST' action=''>
											<input type='hidden' name='pid' value={$productInfo[0]['pid']} />
											<input type='submit' name='removefromcart' id='removefromcart' value='Remove From Cart' />
										</form>
									</td>
								</tr>
							";
						}
					}
				?>
				
			</table>
		</div>
	</body>
</html>