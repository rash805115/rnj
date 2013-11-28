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
	
	if(isset($_POST['addtocart']))
	{
		if ($userID == FALSE)
		{
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/login";
			header("Location: {$nextURL}");
		}
		
		if (isset($_COOKIE['PRODUCTID']) && strlen($_COOKIE['PRODUCTID']) > 0)
		{
			$currentProductList = $_COOKIE['PRODUCTID'];
			$currentProductList .= "," . $productID;
			\setcookie("PRODUCTID", $currentProductList, \time() + 2592000, null, null, FALSE, TRUE);
		}
		else if (isset($_COOKIE['PRODUCTID']) && strlen($_COOKIE['PRODUCTID']) < 1)
		{
			\setcookie("PRODUCTID", $productID, \time() + 2592000, null, null, FALSE, TRUE);
		}
		else
		{
			\setcookie("PRODUCTID", $productID, \time() + 2592000, null, null, FALSE, TRUE);
		}
		
		$this->info .= "Added to cart";
	}
?>

<html>
	<head>
		<title>RNJ - Buy <?php echo $productInfo[0]['pname']; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/include.php"); ?>
                <div id="content_inside">
                    <div id="main_block" class="style1">	
                            <div id="item">
                                    <h4> <?php echo $productCat[0]['kname']; ?> > <?php echo $productSubCat[0]['kkname'] ?> </h4>
                                    <br />

                                    <div class="big_view">
                                            <table border= "1" width="303" height="260">
                                                    <tr>
                                                            <td><img <?php echo "src=\"$imageURL\"" ?> width="303" height="260" ></td>
                                                    </tr>
                                            </table>
                                    </div>
                            </div>

                            <div class="description">
                                    <table width="350" >
                                            <tr>
                                                    <td width= "40%">Product ID:</td>
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

                                    <BR><BR>
                                    <table width="350" >
                                            <tr>
                                                    <td>
                                                        <form name='form-cart' id='form-cart' method='POST' action=''>
                                                                <input type="image" src= "http://localhost/rnj/framework/file/images/cart.png" alt="Submit" name="addtocart" id="addtocart" value="Add to Cart"/>
                                                        </form>
                                                    </td>
                                            </tr>
                                            <tr>
                                                    <td>
                                                        <form name='form-interest' id='form-interest' method='POST' action=''>
                                                                <input type="image" src= "http://localhost/rnj/framework/file/images/interest.png" name="addtointerests" id="addtointerests" value="Add to Interests"/>
                                                        </form>
                                                    </td>
                                            </tr>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
	</body>
</html>