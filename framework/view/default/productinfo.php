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
	
	if(isset($_POST['comment-submit']))
	{
		phpsec\SQL("INSERT INTO review (USERID, pid, comments, rate) VALUES (?, ?, ?, ?)", array($userID, $productID, $_POST['usercomment'], $_POST['userrate']));
		$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/productinfo?pid=" . $productID;
		header("Location: {$nextURL}");
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
					    <tr>
                                                    <td>In store:</td>
                                                    <td id="store"> <?php $result1 = phpsec\SQL("SELECT streetaddr FROM store WHERE sid = ?", array($productInfo[0]['store'])); echo $result1[0]['streetaddr']; ?> </td>
                                            </tr>
                                    </table>

                                    <BR><BR>
                                    <table width="350" >
                                            <tr>
                                                    <td>
                                                        <form name='form-cart' id='form-cart' method='POST' action=''>
								<?php
									if($productInfo[0]['tinventory']>0)
										echo "<input type=\"image\" src= \"http://localhost/rnj/framework/file/images/cart.png\" alt=\"Submit\" name=\"addtocart\" id=\"addtocart\" value=\"Add to Cart\" />";
									else
										echo "This item is not currently available. Add it to your wishlist for future updates.";
								?>
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
                    
			
		    <div name='review-block' class='review-block'>
			    <?php
			    
			    if ($userID != FALSE)
			    {
				    echo "
					    <form name='user-comment' id='user-comment' method='POST' action=''>
						
                                                <span style='font-weight:bold; font-size: 16px;'>Please rate this product: </span>
						<select name='userrate'>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
						</select>
						<BR><BR>
						<textarea rows='5' cols='55' name='usercomment'>Please Enter your comments here</textarea>
						<input type='submit' name='comment-submit' id='comment-submit' value='Comment' />
					    </form>
					   
				    ";
			    }
			    
			    $result = phpsec\SQL("SELECT * FROM review WHERE pid = ?", array($productID));
			    
			    if(count($result) == 0)
			    {
				    echo "<p>No comments on this product. <br> Be the first one to comment!<BR>You need to be signed in to comment.</p>";
			    }
			    else
			    {
				echo "
                                    <BR>
                                    <BR>
					<table >
					    <tr>
                                                    
						    <td><span style='font-weight:bold;'>Username</span><br></td>
						    <td><span style='font-weight:bold;'>Comment</span><br></td>
						    <td><span style='font-weight:bold;'>Rating</span><br></td>
					    </tr>
				";

				foreach($result as $comment)
				{
					echo "
                                            
						<tr>
						    <td width = \"25%\">{$comment['USERID']} : </td>
						    <td width = \"65%\">{$comment['comments']}</td>
						    <td width = \"10%\">{$comment['rate']} / 5</td>
						</tr>
					";
				}

				echo "
					</table>
				";
			    }
			    
			    ?>
                    </div>
                        </div>
                </div>
            </div>
	</body>
</html>