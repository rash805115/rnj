<?php

$allPID = explode(",", $productIDs);
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

if(isset($_POST['submit']))
{
	$shouldCartEmpty = true;
	
	foreach($pidGroup as $key=>$value)
	{
		$result = phpsec\SQL("SELECT tinventory, store FROM product WHERE pid = ?", array($key));
		if($result[0]['tinventory'] > 0)
		{
			$lastInsertedTID = phpsec\SQL("INSERT INTO transaction (pid, date, quantity) VALUES (?, ?, ?)", array($key, phpsec\time(), $value));
			phpsec\SQL("INSERT INTO `user_buy_transaction` (tid, USERID) VALUES (?, ?)", array($lastInsertedTID, $userID));
			phpsec\SQL("UPDATE product SET `tinventory` = `tinventory` - 1 WHERE pid = ?", array($key));
			phpsec\SQL("UPDATE store SET `sinventory` = `sinventory` - 1 WHERE sid = ? AND pid = ?", array($result[0]['store'], $key));
		}
		else
		{
			$this->error .= "ERROR: Some items were not present. Transaction Failed!";
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/users/index";
			header("Location: {$nextURL}");
			$shouldCartEmpty = false;
		}
	}

	if($shouldCartEmpty)
   {
			\setcookie("PRODUCTID", "", \time() - 3600);
			$nextURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/cart";
			header("Location: {$nextURL}");
   }
}

?>

<html>
	<head>
		<title>RNJ - Payment Portal</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>

	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/../include.php"); ?>
                <div id="content_inside">
                    <div id="main_block">
                        <div class="about">
                           <h1>Payment</h1><br/>
                           <form method="POST" action="" name="payment" id="payment">
				   <select name="mode" id="mode">
					   <option value="offline">Off Line</option>
					   <option value="online">On Line</option>
				   </select><BR>
				   Store Bought From: <input type="text" name="storeid" id="storeid" maxlength="11" /><BR>
                                   <table name="table-payment" id="table-payment">
                                           <tr>
                                                   <td>Card Number:</td>
                                                   <td><input type="text" maxlength="16" name="cardno" id="cardno" /></td>
                                           </tr>
                                           <tr>
                                                   <td>Card Holder's name:</td>
                                                   <td><input type="text" maxlength="128" name="ownername" id="ownername" /></td>
                                           </tr>
                                           <tr>
                                                   <td>Expiry Date (Format: mm/yy):</td>
                                                   <td><input type="text" maxlength="4" name="expire" id="expire" /></td>
                                           </tr>
                                           <tr>
                                           
                                                   <td><BR><input type='submit' name='submit' id='submit' value='Pay' /></td>
                                                   <td><BR><input type='reset' name='reset' id='reset' value='Reset' /></td>
                                           </tr>
                                   </table>
                           </form>
                        </div>
                    </div>
                </div> 
            </div>
	</body>
</html>