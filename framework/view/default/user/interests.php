<?php
	if(isset($_POST['removefrominterests']))
	{
		phpsec\SQL("DELETE FROM `user_interested_product` WHERE USERID = ? AND pid = ?", array($userID, $_POST['pid']));
		$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/interests";
		header("Location: {$nextURL}");
	}
?>

<html>
	<head>
		<title>RNJ - Interests</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/../include.php"); ?>
                <div id="content_inside">
                    
                    <div id="frame">
                            <div id='interests' name='interests'>
                                    <table id='table-interests' border='1' width="95%" >
                                            <tr>
                                                    <th width="6%" >ID</th>
                                                    <th width="12%" >Product Name</th>
                                                    <th width="7%" >Price</th>
                                                    <th width="45%" >Product Image</th>
                                                    <th width="17%" >Buy</th>
                                                    <th width="8%" >Remove</th>
                                            </tr>

                                            <?php
                                                    for($i=0; $i<count($interestedProducts); $i++)
                                                    {
                                                            $productInfo = phpsec\SQL("SELECT * FROM product WHERE pid = ?", array($interestedProducts[$i]['pid']));
                                                            if(count($productInfo) != 0)
                                                            {
                                                                    $productSubCat = phpsec\SQL("SELECT kid, kkname FROM ptype WHERE kkid = ?", array($productInfo[0]['kkid']));
                                                                    $productCat = phpsec\SQL("SELECT kname FROM pkind WHERE kid = ?", array($productSubCat[0]['kid']));
                                                                    $imageURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/file/images/" . $productCat[0]['kname'] . "/" . $productInfo[0]['imageurl'];
                                                                    $productDesc = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/productinfo?pid=" . $interestedProducts[$i]['pid'];

                                                                    echo "
                                                                            <tr>
                                                                                    <td>{$productInfo[0]['pid']}</td>
                                                                                    <td>{$productInfo[0]['pname']}</td>
                                                                                    <td>{$productInfo[0]['price']}</td>
                                                                                    <td><a href=\"$productDesc\"><img src=\"{$imageURL}\"></a></td>
                                                                                    <td><a href=\"\">Add to Cart</a></td>
                                                                                    <td>
                                                                                            <form id='form-remove-interest' name='form-remove-interest' method='POST' action=''>
                                                                                                    <input type='hidden' name='pid' value={$productInfo[0]['pid']} />
                                                                                                    <input type='submit' name='removefrominterests' id='removefrominterests' value='Remove' />
                                                                                            </form>
                                                                                    </td>
                                                                            </tr>
                                                                    ";
                                                            }
                                                    }
                                            ?>

                                    </table>
                            </div>
                    </div>
                </div>
             </div>
	</body>
</html>