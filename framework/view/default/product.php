<?php

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
					$imageURL = \phpsec\HttpRequest::Protocol() . "://" . \phpsec\HttpRequest::Host() . \phpsec\HttpRequest::PortReadable() . "/rnj/framework/file/" . $products[($cols*$i)+$j]['imageurl'];
					$tableStructure .= "<img src=\"{$imageURL}\">";
					$tableStructure .= "</td>";
				}
			}
			
			$tableStructure .= "</tr>";
		}
		
		return $tableStructure;
	}

?>

<div id="product-show" name="product-show">
	<label><h1>Choose Category:</h1></label>
	<select name="pro-cat" id="pro-cat">
		<option name="monitor" id="monitor">Monitors</option>
	</select>
	
	<BR><BR><BR>
	<?php
		$products = phpsec\SQL("SELECT * FROM product", array());

		$productTable = "<table border='4'>";
		$productTable .= getTableElementStructure(10, $products, "r", "c");
		$productTable .= "</table>";
		
		echo $productTable;
	?>
</div>