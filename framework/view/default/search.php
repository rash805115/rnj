<?php

	if(isset($_POST['search']))
	{
		$toSearch = $_POST['search-bar'];
		
		$search1 = phpsec\SQL("SELECT * from pkind", array());
		$search2 = phpsec\SQL("SELECT * from ptype", array());
		$search3 = phpsec\SQL("SELECT * from product", array());
		
		foreach($search1 as $match)
		{
			if(strtolower($match['kname']) == strtolower($toSearch))
			{
				$search1_res = phpsec\SQL("SELECT kid from pkind where kname = ?", array($match['kname']));
				$search1_res = phpsec\SQL("SELECT kkid from ptype where kid = ?", array($search1_res[0]['kid']));
				$a = array();
				foreach($search1_res as $s)
				{
					$t = phpsec\SQL("SELECT * from product where kkid = ?", array($s['kkid']));
					$a = array_merge($a, $t);
				}
				$search1_res = $a;
				break;
			}
		}
		
		foreach($search2 as $match)
		{
			if(strtolower($match['kkname']) == strtolower($toSearch))
			{
				$search2_res = phpsec\SQL("SELECT kkid from ptype where kkname = ?", array($match['kkname']));
				$search2_res = phpsec\SQL("SELECT * from product where kkid = ?", array($search2_res[0]['kkid']));
				break;
			}
		}
		
		foreach($search3 as $match)
		{
			if(strpos(strtolower($match['pname']), strtolower($toSearch)) >= 0)
			{
				$search3_res = phpsec\SQL("SELECT * from product where pname = ?", array($match['pname']));
				break;
			}
		}
		
		
		
		function show_table($ta)
		{
			$table = "<table border='1' width=\"85%\">"
                                . "<tr>"
                                . "<th width=\"8%\">ID</th>"
                                . "<th width=\"47%\">Product Name</th>"
                                . "<th width=\"10%\">Inventory</th>"
                                . "<th width=\"10%\">Price</th>"
                                . "<th width=\"10%\">Store</th>"
                                . "</tr>";
			foreach($ta as $t)
			{
				$link = "http://localhost/rnj/framework/productinfo?pid=" . $t['pid'];
				$table .= "<tr><td>{$t['pid']}</td><td><a href=\"{$link}\">{$t['pname']}</a></td><td>{$t['tinventory']}</td><td>{$t['price']}</td></tr>";
			}
			$table .= "</table>";
			
			echo $table;
		}
	}

?>

<html>
	<head>
		<title>RNJ - Search</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
	</head>
	
	<body>
            <div id="wrapper">
                <?php include (__DIR__ . "/include.php"); ?>
		   <div id="content_inside">
                    <div id="main_block">
                        <div class="news"> 
                            <div id="search-div">
                                <h1>Search</h1><br/><br/>
                                
                                <form method="POST" action="" id="search-form" name="search-form">
                                    enter your keyword here...
                                        <input type="text" name="search-bar" id="search-bar" maxlength="128" size="80" />
                                        <input type="submit" name="search" id="search" value="Go" />
                                </form>
                                <br/>
                            </div>
                         </div> 
                        
                        
                         <div id="frame">
                            
                            <div id="answer">
                                    <?php
				    echo "By Category:";
                                        if(count($search1_res) > 0)
                                        {
                                                show_table($search1_res);
                                        }
					echo "By Sub-Category:";
                                        if(count($search2_res) > 0)
                                        {
                                                show_table($search2_res);
                                        }
echo "By Produt Name:";
                                        if(count($search3_res) > 0)
                                        {
                                                show_table($search3_res);
                                        }
                                    ?>
                            </div>
                         </div>   
                    </div>
                </div>
	    </div>
	</body>
</html>