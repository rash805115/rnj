<?php

if(isset($_POST['submit']))
{
	$pkind = substr($_POST['pkind'], 6);
	$ptype = substr($_POST['ptype'], 6);
	$goodToGo = false;
	$result = phpsec\SQL("SELECT kkid FROM ptype WHERE kid = ?", array($pkind));
	foreach($result as $kkids)
	{
		if($kkids['kkid'] == $ptype)
		{
			$goodToGo = true;
			break;
		}
	}
	
	if($goodToGo)
	{
		phpsec\SQL("INSERT INTO product (pid, kkid, pname, tinventory, price) VALUES (?, ?, ?, ?, ?)", array($pkind, $ptype, $_POST['proname'], $_POST['proinv'], $_POST['proprice']));
		$this->info .= "Product Added";
	}
}

?>

<html>
	<head>
		<title>RNJ - Add Product</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>
	
	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/../include.php"); ?>
                <div id="content_inside">
                    <div id="main_block">
                        <div class="about">
                        <h1>Add new inventory here...</h1><BR>
                        <form id="addpro" name="addpro" method="POST" action="">
                            <div id="kind" style="font-size: 18px">
                                    <br>Please choose a category: 
                                    <?php
                                            $result = phpsec\SQL("select * from pkind", array());

                                            $select = "<select name='pkind'>";
                                            foreach($result as $s)
                                            {
                                                    $select .= "<option value='pkind_{$s['kid']}'>{$s['kname']}</option>";
                                            }
                                            $select .= "</select>";

                                            echo $select;
                                    ?>
                            </div>

                            <div id="type" style="font-size: 18px">
                                    <br>Please choose a sub-category:
                                    <?php
                                            $result = phpsec\SQL("select * from ptype", array());

                                            $select = "<select name='ptype'>";
                                            foreach($result as $s)
                                            {
                                                    $select .= "<option value='ptype_{$s['kkid']}'>{$s['kkname']}</option>";
                                            }
                                            $select .= "</select>";

                                            echo $select;
                                    ?>
                            </div>

                            <div id="item-details" style="font-size: 18px">
                                    <br>Enter Product Name: <input type="text" maxlength="128" name="proname" id="proname" />
                                    <br>Enter Product Inventory: <input type="text" maxlength="11" name="proinv" id="proinv" />
                                    <br>Enter Product Price: <input type="text" maxlength="11" name="proprice" id="proprice" />


                            </div>

                            <div id="submit">
                                    <input type="submit" name="submit" id="submit" value="Add Product" />
                            </div>
                        </form>
	    </div></div></div></div>
	</body>
</html>