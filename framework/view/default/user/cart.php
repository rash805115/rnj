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
	
	if(isset($_POST['checkout']))
	{
		$allPID = explode(",", $_POST['pids']);
		$pidGroup = array();
		
		for($i=0; $i<count($allPID); $i++)
		{
			if (array_key_exists($allPID[$i], $pidGroup))
			{
				$pidGroup[$allPID[$i]] += 1;
			}
			else
			{
				$pidGroup[$allPID[$i]] = 1;
			}
		}
		
		foreach($pidGroup as $key=>$value)
		{
			$lastInsertedTID = phpsec\SQL("INSERT INTO transaction (pid, date, quantity) VALUES (?, ?, ?)", array($key, phpsec\time(), $value));
			phpsec\SQL("INSERT INTO `user_buy_transaction` (tid, USERID) VALUES (?, ?)", array($lastInsertedTID, $userID));
		}
		
		\setcookie("PRODUCTID", "", \time() - 3600);
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
			<form name='form-cart' id='form-cart' method='POST' action=''>
				<table id='table-cart' border='1'>
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Image</th>
						<th>Remove</th>
					</tr>

					<?php
						$total = 0;
						$AllCartIDs = "";

						for($i=0; $i<count($products); $i++)
						{
							$productInfo = phpsec\SQL("SELECT * FROM product WHERE pid = ?", array($products[$i]));
							if(count($productInfo) != 0)
							{
								$total += $productInfo[0]['price'];
								$AllCartIDs .= $productInfo[0]['pid'] . ",";
								
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
						
						$AllCartIDs = substr($AllCartIDs, 0, -1);
					?>

					<tr>
						<td></td>
						<th align='right'><h1>Total:</h1></th>
						<th><h1><?php echo $total; ?></h1><input type='hidden' name='pids' value=<?php echo $AllCartIDs; ?> /></th>
						<td><input type="submit" name="checkout" id="checkout" value="Checkout" /></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>