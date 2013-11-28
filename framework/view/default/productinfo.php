<?php
	if(isset($_POST['addtointerests']))
	{
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		phpsec\SQL("INSERT INTO `user_interested_product` (USERID, pid) VALUES (?, ?)", array($userID, $productID));
		$this->info .= "Added to interest";
	}
?>

<html>
	<head>
		<title>RNJ - Buy <?php echo $productInfo[0]['pname']; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
		<?php include (__DIR__ . "/include.php"); ?>
		
		<div id="main_block" class="style1">	
			<div id="item">
				<h3> <?php echo $productCat[0]['kname']; ?> > <?php echo $productSubCat[0]['kkname'] ?> </h3>
				<br />
				
				<div class="big_view">
					<table border="1">
						<tr>
							<td><img <?php echo "src=\"$imageURL\"" ?> ></td>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="description">
				<table>
					<tr>
						<td>Product ID:</td>
						<td id="productid"> <?php echo $productInfo[0]['pid']; ?> </td>
					</tr>
					
					<tr>
						<td>Product Name:</td>
						<td id="productname"> <?php echo $productInfo[0]['pname']; ?> </td>
					</tr>
					
					<tr>
						<td>Product Price:</td>
						<td id="productprice"> <?php echo $productInfo[0]['price']; ?> </td>
					</tr>
					
					<tr>
						<td>Items Left:</td>
						<td id="inventory"> <?php echo $productInfo[0]['tinventory']; ?> </td>
					</tr>
				</table>
				
				<BR><BR><BR>
				<input type="submit" name="addtocart" id="addtocart" value="Add to Cart" />
				
				<form name='form-interest' id='form-interest' method='POST' action=''>
					<input type="submit" name="addtointerests" id="addtointerests" value="Add to Interests" />
				</form>
			</div>
		</div>
	</body>
</html>