<?php

	$columsPerRow = 2;
        
	$catString = phpsec\SQL("SELECT kname FROM pkind WHERE kid = ?", array($cat));
	if (count($catString) == 1)
		$catString = $catString[0]['kname'];
	else
	{
		$catString = phpsec\SQL("SELECT * FROM pkind LIMIT 1", array());
		$cat = $catString[0]['kid'];
		$catString = $catString[0]['kname'];
	}
	
	$typeString = phpsec\SQL("SELECT kkid, kkname FROM ptype WHERE kid = ?", array($cat));
	
	function getProductsForID($kkid, $catString)
	{
		$result = phpsec\SQL("SELECT * FROM product WHERE kkid = ?", array($kkid));
		if (count($result ) > 0)
		{
			for ($i = 0; $i < count($result); $i++)
			{
				$result[$i]['imageurl'] = $catString . "/" . $result[$i]['imageurl'];
			}
		}
		
		return $result;
	}
	
	function getTableElementStructure($cols, $products, $trID = NULL, $tdID = NULL)
	{
		$noOfProducts = count($products);
		$rows = ($noOfProducts % $cols == 0) ? ($noOfProducts / $cols) : ( (int)($noOfProducts / $cols) + 1);
		
		$tableStructure = "";
		
		for($i = 0; $i < $rows; $i++)
		{
			$tableStructure .= "<tr";
			if ( preg_match('/^[a-zA-z0-9\.\-_]+$/', $trID ) )
			{
				$temp_row = $trID . $i;
				$tableStructure .= " name='{$temp_row}' id='{$temp_row}'";
			}
			$tableStructure .= ">";
			
			for($j = 0; $j < $cols; $j++)
			{
				if(isset($products[($cols*$i)+$j]))
				{
					$tableStructure .= "<td";
					if ( preg_match("/^[a-zA-z0-9\.\-_]+$/", $tdID ) )
					{
						$temp_col = $temp_row . "_" . $tdID . $j;
						$tableStructure .= " name='{$temp_col}' id='{$temp_col}'";
					}
					$tableStructure .= " height='100px' width='100px'>";
					$imageURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/file/images/" . $products[($cols*$i)+$j]['imageurl'];
					$productDesc = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/productinfo?pid=" . $products[($cols*$i)+$j]['pid'];
					$tableStructure .= "<a href=\"$productDesc\"><img src=\"{$imageURL}\" width=\"303\" height=\"260\"></a>";
					$tableStructure .= "</td>";
				}
			}
			
			$tableStructure .= "</tr>";
		}
		
		return $tableStructure;
	}
	
	function getSelectionMenu($elements)
	{
		$selectType = "<select";
		$selectType .= " name='select' id='select'";
		$selectType .= "><option value='-1'>All</option>";
		
		for($i = 0; $i < count($elements); $i++)
		{
			$selectType .= "<option value='";
			$selectType .= $elements[$i]['kkid'] . "'>";
			$selectType .= $elements[$i]['kkname'];
			$selectType .= "</option>";
		}
		
		$selectType .= "</select>";
		return $selectType;
	}

?>

<html>
	<head>
		<title>RNJ - <?php echo $catString; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>
	
	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/include.php"); ?>
                <div id="content_inside">
                    	<div id="main_block">
                            <div id="frame">
                                <div id="product-show" name="product-show">
                                        <label> <h2> &emsp; <?php echo $catString; ?> > <?php echo getSelectionMenu($typeString); ?> </h2></label>

                                        <BR>
                                        <?php
                                                $productTable = "";

                                                $products = array();
                                                for ($i = 0; $i < count($typeString); $i++)
                                                {
                                                        $products[$i] = getProductsForID($typeString[$i]['kkid'], $catString);
                                                        $tableId = $typeString[$i]['kkid'];
                                                        $productTable .= "<table border='4' style='display:none;' ";
                                                        $productTable .= " name='{$tableId}' id='{$tableId}'>";
                                                        $productTable .= "<td width= \"50%\">{$typeString[$i][kkname]}</td>";
                                                        $productTable .= getTableElementStructure($columsPerRow, $products[$i]);
                                                        $productTable .= "</table>";
                                                        
                                         
                                                        
                                                }

                                                echo $productTable;
                                        ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>     
            <script type="text/javascript" <?php echo('src="' . "http://localhost/rnj/framework/file/js/jquery.js" . '"'); ?> ></script>
            <script type="text/javascript" <?php echo('src="' . "http://localhost/rnj/framework/file/js/show-product.js" . '"'); ?> ></script>
	</body>
</html>