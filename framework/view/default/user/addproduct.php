<?php

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
		    
		    <form id="addpro" name="addpro" method="POST" action="">
			<div id="kind">
				Please choose a category:
				<?php
					$result = phpsec\SQL("select * from pkind", array());
					
					$select = "<select>";
					foreach($result as $s)
					{
						$select .= "<option value='pkind_{$s['kid']}'>{$s['kname']}</option>";
					}
					$select .= "</select>";
					
					echo $select;
				?>
			</div>

			<div id="type">
				Please choose a sub-category:
				<?php
					$result = phpsec\SQL("select * from ptype", array());
					
					$select = "<select>";
					foreach($result as $s)
					{
						$select .= "<option value='ptype_{$s['kkid']}'>{$s['kkname']}</option>";
					}
					$select .= "</select>";
					
					echo $select;
				?>
			</div>

			<div id="item-details">
				Enter Product Name: <input type="text" maxlength="128" name="proname" id="proname" />
				Enter Product Inventory: <input type="text" maxlength="11" name="proinv" id="proinv" />
				Enter Product Price: <input type="text" maxlength="11" name="proprice" id="proprice" />
				Enter Product Store: <input type="text" maxlength="128" name="prostore" id="prostore" />
				
				
			</div>
			    
			<div id="submit">
				<input type="submit" name="submit" id="submit" value="Add Product" />
			</div>
		    </form>
	    </div>
	</body>
</html>