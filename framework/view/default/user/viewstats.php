<?php

if(isset($_POST["stats"]))
{
    $selectedStat = $_POST["stats"];
    
    $selectedPidQ6= $_POST["pnameQ6"];
    $selectedPidQ7= $_POST["pnameQ7"];
    $selectedPidQ8= $_POST["pnameQ8"];
    $selectedPidQ15_1= $_POST["pnameQ15_1"];
    $selectedPidQ15= $_POST["pnameQ15"];
    
    $selectedDateQ6_1= strtotime($_POST["dateQ6_1"]);
    $selectedDateQ6_2= strtotime($_POST["dateQ6_2"]);
    $selectedDateQ8_1= strtotime($_POST["dateQ8_1"]);
    $selectedDateQ8_2= strtotime($_POST["dateQ8_2"]);
    $selectedDateQ10_1= strtotime($_POST["dateQ10_1"]);
    $selectedDateQ10_2= strtotime($_POST["dateQ10_2"]);
    $selectedDateQ10_1_1= strtotime($_POST["dateQ10_1_1"]);
    $selectedDateQ10_1_2= strtotime($_POST["dateQ10_1_2"]);
    $selectedDateQ10_2_1= strtotime($_POST["dateQ10_2_1"]);
    $selectedDateQ10_2_2= strtotime($_POST["dateQ10_2_2"]);
    $selectedDateQ12_1= strtotime($_POST["dateQ12_1"]);
    $selectedDateQ12_2= strtotime($_POST["dateQ12_2"]);
    $selectedDateQ12_1_1= strtotime($_POST["dateQ12_1_1"]);
    $selectedDateQ12_1_2= strtotime($_POST["dateQ12_1_1"]);
    $selectedDateQ12_2_1= strtotime($_POST["dateQ12_2_1"]);
    $selectedDateQ12_2_2= strtotime($_POST["dateQ12_2_2"]);
    $selectedDateQ14_1= strtotime($_POST["dateQ14_1"]);
    $selectedDateQ14_2= strtotime($_POST["dateQ14_2"]);
    
    $selectedTimeQ8= $_POST["timeQ8"];
    $selectedTimeQ10= $_POST["timeQ10"];
    $selectedTimeQ12= $_POST["timeQ12"];
    $selectedTimeQ14= $_POST["timeQ14"];
    
    $selectedSidQ1_1= $_POST["sidQ1_1"];
    $selectedSidQ9_2= $_POST["sidQ9_2"];
    $selectedSidQ10_2= $_POST["sidQ10_2"];
    $selectedSidQ11_2= $_POST["sidQ11_2"];
    $selectedSidQ12_2= $_POST["sidQ12_2"];
    $selectedSidQ15_1= $_POST["sidQ15_1"];
}

function getAllProductsId()
{
    $result = phpsec\SQL("SELECT pid, pname FROM product");
    return $result;
}

function getAllProductsName()
{
    $result = phpsec\SQL("SELECT pname FROM product");
    return $result;
}

function getAllStoresId()
{
    $result = phpsec\SQL("SELECT sid, streetaddr FROM store");
    return $result;
}

?>

<html>
	<head>
		<title>RNJ - Employee View Stats</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" type="text/css" <?php echo('href="' . "http://localhost/rnj/framework/file/css/style.css" . '"'); ?> />
                
		<script type="text/javascript">
                    function setTable(what)
		    {
			if(document.getElementById(what).style.display=="none")
			{
			    document.getElementById(what).style.display="block";
			}
			else if(document.getElementById(what).style.display=="block")
			{
			    document.getElementById(what).style.display="none";
			}
                    }
		</script>

        </head>

	<body>
            <div id="wrapper">
                    <?php include (__DIR__ . "/../include_employee.php"); ?>
                  
		    <div id="content_inside">
                        <div id="main_block">
                            <div class="stats">
                                <BR>
                                <h1>Statistics</h1>
                                <p>Please select a statistics question that you want to query from the list below.</p>
                                <BR>
                               
				<form name='form-stats' id='form-stats' method='POST' action="">
                                                                        
                                    <input type="radio" name="stats" value="q1">How much does each employee sell products?<br>
                                    <input type="radio" name="stats" value="q1_1">How much does each employee sell products at the  
                                    <select name = "sidQ1_1" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i]['sid'].">";
                                                echo $storeId[$i]['streetaddr']."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                    store?
                                    <br>
                                    <input type="radio" name="stats" value="q2">Who has sold products the most?<br>
                                    <input type="radio" name="stats" value="q3">Who has sold products the least?<br>
                                    <input type="radio" name="stats" value="q4">Who has bought products the most?<br>
                                    <input type="radio" name="stats" value="q5">How many employees are working at each store?<br>
                                    <input type="radio" name="stats" value="q6">How many customers have bought 
                                         <select name = "pnameQ6" >
                                            <!-- List all product's name -->
                                            <?php
                                            $productsId = getAllProductsId();
                                            $productsName = getAllProductsName();
                                            for ($i = 0; $i < count($productsId); $i++)
                                            {
                                                echo "<option value=".$productsId[$i]['pid'].">";
                                                echo $productsName[$i]['pname']."</option> <br>";
                                            }                                       
                                            ?>
                                            
                                        </select>
                                        between 
                                        <input type='date' name="dateQ6_1">
                                        and 
                                        <input type='date' name="dateQ6_2">
                                        
                                    <br>
                                    <input type="radio" name="stats" value="q7">What are the total sales of 
                                        <select name="pnameQ7">
                                            <!-- List all product's name -->
                                            <?php
						$productsId = getAllProductsId();
						$productsName = getAllProductsName();
						for ($i = 0; $i < count($productsId); $i++)
						{
						    echo "<option value='{$productsId[$i]['pname']}'>";
						    echo $productsId[$i]['pname']."</option> <br>";
						}                                       
                                            ?>
                                        </select>
                                        ?
                                    <br>
                                    <input type="radio" name="stats" value="q8">What are the total sales of 
                                        <select name = "pnameQ8" >
                                            <option value="all">all products</option><br>
                                            <!-- List all product's name -->
                                            <?php
                                            $productsId = getAllProductsId();
                                            $productsName = getAllProductsName();
                                            for ($i = 0; $i < count($productsId); $i++)
                                            {
					    echo "<option value='{$productsId[$i]['pname']}'>";
                                                echo $productsId[$i]['pname']."</option> <br>";
                                            }                                       
                                            ?>
                                        </select>
                                        between 
                                        <input type='date' name="dateQ8_1">
                                        and 
                                        <input type='date' name="dateQ8_2">

                                    <br>
                                    <input type="radio" name="stats" value="q9">What is the best-selling product?<br>
                                    <input type="radio" name="stats" value="q9_1">What is 10 best-selling products?<br>
                                    <input type="radio" name="stats" value="q9_2">What is 10 best-selling products of a store
                                    <select name = "sidQ9_2" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i][sid].">";
                                                echo $storeId[$i][sid]."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                    ?
                                    <br>
                                    <input type="radio" name="stats" value="q10">What is the best-selling product   
                                        between 
                                        <input type='date' name="dateQ10_1">
                                        and 
                                        <input type='date' name="dateQ10_2">
                                        
                                    <br>
                                    <input type="radio" name="stats" value="q10_1">What is 10 best-selling product   
                                        between 
                                        <input type='date' name="dateQ10_1_1">
                                        and 
                                        <input type='date' name="dateQ10_1_2">
                                        
                                    <br>
                                    <input type="radio" name="stats" value="q10_2">What is 10 best-selling product of a store
                                    <select name = "sidQ10_2" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i][sid].">";
                                                echo $storeId[$i][sid]."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                        between 
                                        <input type='date' name="dateQ10_2_1">
                                        and 
                                        <input type='date' name="dateQ10_2_2">
                                        
                                    <br>
                                    <input type="radio" name="stats" value="q11">What is the bottom product among products which has been sold more than 1?<br>
                                    <input type="radio" name="stats" value="q11_1">What is 10 worst-selling products?<br>
                                    <input type="radio" name="stats" value="q11_2">What is 10 worst-selling products of a store
                                    <select name = "sidQ11_2" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i][sid].">";
                                                echo $storeId[$i][sid]."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                    ?
                                    <br>
                                    <input type="radio" name="stats" value="q12">What is the bottom product among products which has been sold more than 1 between 
                                        <input type='date' name="dateQ12_1">
                                        and 
                                        <input type='date' name="dateQ12_2"> 
                                    <br>
                                    
                                    <input type="radio" name="stats" value="q12_2">What are the 10 worst-selling products of a store
                                    <select name = "sidQ12_2" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i][sid].">";
                                                echo $storeId[$i][sid]."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                        between 
                                        <input type='date' name="dateQ12_2_1">
                                        and 
                                        <input type='date' name="dateQ12_2_2">
                                        
                                    <br>
                                    <input type="radio" name="stats" value="q13">What are the products which have never been sold at all?<br>
                                    
                                    <input type="radio" name="stats" value="q15">What are the inventory of
                                    <select name = "pnameQ15" >
                                            <!-- List all product's name -->
                                            <?php
                                            $productsId = getAllProductsId();
                                            $productsName = getAllProductsName();
                                            for ($i = 0; $i < count($productsId); $i++)
                                            {
                                                echo "<option value=".$productsId[$i]['pid'].">";
                                                echo $productsName[$i]['pname']."</option> <br>";
                                            }                                       
                                            ?>
                                     </select>
                                    ?
                                    <br>
                                    <input type="radio" name="stats" value="q15_1">What are the inventory of
                                    <select name = "pnameQ15_1" >
                                            <!-- List all product's name -->
                                            <?php
                                            $productsId = getAllProductsId();
                                            $productsName = getAllProductsName();
                                            for ($i = 0; $i < count($productsId); $i++)
                                            {
                                                echo "<option value=".$productsId[$i]['pid'].">";
                                                echo $productsName[$i]['pname']."</option> <br>";
                                            }                                       
                                            ?>
                                     </select>
                                    in a store
                                    <select name = "sidQ15_1" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i][sid].">";
                                                echo $storeId[$i][sid]."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                    ?
                                    <br>
                                    <br>
                                    <br>
                                    <input type="submit" name="genStatsReport" id="genStatsReport" value="Generate report" />
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </form>
                            </div>
                            <div class="statsReport">
                                
                            <?php
			    //NOT Sorted
                            if($selectedStat)
                            {
                                echo "<table border= \"1\" width =\"600\" height =\"100\">";
                                if($selectedStat == "q1"){
                                    $query =	"SELECT X.FIRST_NAME, X.LAST_NAME, SUM(Temp.sales) AS total_sales 
						FROM USER U, user_sell_product S, XUSER X,
						(SELECT T.tid, P.price*T.quantity AS sales 
						FROM product P, transaction T
						WHERE P.pid=T.pid) AS Temp
						WHERE U.USERID = S.USERID AND X.USERID = U.USERID AND Temp.tid = S.tid 
						GROUP BY S.USERID";
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>How much does each employee sell products?</td>";
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['FIRST_NAME']} {$product['LAST_NAME']} with a total selling amount of {$product['total_sales']}</td>";
					echo "</tr>";
				    }
                                }
                                
                                else if($selectedStat == "q1_1"){
                                    $query =    "SELECT Temp2.sid, X.FIRST_NAME, X.LAST_NAME, SUM(Temp1.sales) AS total_sales 
						FROM USER U, user_sell_product S, XUSER X,
						(SELECT T.tid, P.price*T.quantity AS sales 
						FROM product P, transaction T
						WHERE P.pid=T.pid) AS Temp1,
						(SELECT employeeid, sid
						FROM employee_workin_store 
						WHERE sid=".$selectedSidQ1_1.") AS Temp2
						WHERE U.USERID = S.USERID AND X.USERID = U.USERID 
						AND Temp1.tid = S.tid AND Temp2.employeeid=S.USERID 
						GROUP BY S.USERID";
				    
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>How much does each employee sell products at store #".$selectedSidQ1_1."?</td>";     
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['FIRST_NAME']} {$product['LAST_NAME']} with a total selling amount of {$product['total_sales']}</td>";
					echo "</tr>";
				    }
                                }
                                
                                else if($selectedStat == "q2"){
                                    $query =	"SELECT X.FIRST_NAME, X.LAST_NAME,  SUM(Temp.sales) AS total_sales 
						FROM USER U, user_sell_product S, XUSER X,
						(SELECT T.tid, P.price*T.quantity AS sales 
						FROM product P, transaction T
						WHERE P.pid=T.pid) AS Temp
						WHERE U.USERID = S.USERID AND Temp.tid = S.tid AND X.USERID = U.USERID
						GROUP BY S.USERID
						HAVING SUM(Temp.sales) =
						(SELECT MAX(Temp2.total_sales)
						FROM (SELECT SUM(Temp1.sales) AS total_sales 
						FROM user_sell_product S1, 
						(SELECT T1.tid, P1.price*T1.quantity AS sales 
						FROM product P1, transaction T1
						WHERE P1.pid=T1.pid) AS Temp1
						WHERE Temp1.tid = S1.tid 
						GROUP BY S1.USERID) AS Temp2)";
					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>Who has sold products the most?</td>";
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['FIRST_NAME']} {$product['LAST_NAME']} with a total selling amount of {$product['total_sales']}</td>";
					echo "</tr>";
				    }
                                } 
                                else if($selectedStat == "q3"){
                                    $query =	"SELECT X.FIRST_NAME, X.LAST_NAME,  SUM(Temp.sales) AS total_sales 
						FROM USER U, user_sell_product S, XUSER X,
						(SELECT T.tid, P.price*T.quantity AS sales 
						FROM product P, transaction T
						WHERE P.pid=T.pid) AS Temp
						WHERE U.USERID = S.USERID AND Temp.tid = S.tid AND X.USERID = U.USERID
						GROUP BY S.USERID
						HAVING SUM(Temp.sales) =
						(SELECT MIN(Temp2.total_sales)
						FROM (SELECT SUM(Temp1.sales) AS total_sales 
						FROM user_sell_product S1, 
						(SELECT T1.tid, P1.price*T1.quantity AS sales 
						FROM product P1, transaction T1
						WHERE P1.pid=T1.pid) AS Temp1
						WHERE Temp1.tid = S1.tid 
						GROUP BY S1.USERID) AS Temp2)";
				    
				    $result = phpsec\SQL($query, array());
					
				    echo "<tr>";
                                    echo "<td>Who has sold products the least?</td>";
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['FIRST_NAME']} {$product['LAST_NAME']} with a total selling amount of {$product['total_sales']}</td>";
					echo "</tr>";
				    }
                                } 
                                else if($selectedStat == "q4"){
                                    $query =	"SELECT X.FIRST_NAME, X.LAST_NAME,  SUM(Temp.purchase) AS total_purchase 
						FROM USER U, user_buy_transaction S, XUSER X,
						(SELECT T.tid, P.price*T.quantity AS purchase 
						FROM product P, transaction T
						WHERE P.pid=T.pid) AS Temp
						WHERE U.USERID = S.USERID AND Temp.tid = S.tid AND X.USERID = U.USERID
						GROUP BY S.USERID
						HAVING SUM(Temp.purchase) =
						(SELECT MAX(Temp2.total_purchase)
						FROM (SELECT SUM(Temp1.purchase) AS total_purchase 
						FROM user_buy_transaction S1, 
						(SELECT T1.tid, P1.price*T1.quantity AS purchase 
						FROM product P1, transaction T1
						WHERE P1.pid=T1.pid) AS Temp1
						WHERE Temp1.tid = S1.tid 
						GROUP BY S1.USERID) AS Temp2)";
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>Who has bought products the most?</td>";
                                    echo "</tr>";
				    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['FIRST_NAME']} {$product['LAST_NAME']} with a total purchase amount of {$product['total_purchase']}</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q5"){
                                    $query =	"SELECT E.sid, COUNT(E.employeeid) AS num_workers 
						FROM store S, employee_workin_store E
						WHERE S.sid = E.sid 
						GROUP BY E.sid";
					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>How many employees are working at each store?</td>";
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['num_workers']} employees are working in store #{$product['sid']}</td>";
					echo "</tr>";
				    }
                                } 
                                else if($selectedStat == "q6"){
                                    $query =	"SELECT COUNT( DISTINCT S.USERID ) AS num_customers
						FROM user_buy_transaction S, transaction T, product P
						WHERE P.pid = T.pid
						AND T.date >={$selectedDateQ6_1}
						AND T.date <={$selectedDateQ6_2}";
					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>How many customers have bought ".$selectedPidQ6." between ".$_POST["dateQ6_1"]." and ".$_POST["dateQ6_2"]." ?</td>";     
                                    echo "</tr>";
				    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['num_customers']} number of customer(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q7"){
                                    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales 
						FROM product P, transaction T 
						WHERE P.pid=T.pid AND P.pname=\"{$selectedPidQ7}\"";
				    
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is the total sale of ".$selectedPidQ7."?</td>";     
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['total_sales']} is the total sale for this product.</td>";
					echo "</tr>";
				    }
                                } 
                                else if($selectedStat == "q8"){
                                    if($selectedPidQ8 == "all")
				    {
					    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales
							FROM product P, transaction T 
							WHERE P.pid=T.pid AND T.date >={$selectedDateQ8_1} AND T.date <={$selectedDateQ8_2} GROUP BY T.pid";
                                                       
						$result = phpsec\SQL($query, array());
				    
						echo "<tr>";
						echo "<td>What are the total sales of ".$selectedPidQ8." between ".$_POST["dateQ8_1"]." and ".$_POST["dateQ8_2"]." ?</td>";   
						echo "</tr>";
						foreach($result as $product)
						{
						    echo "<tr>";
						    echo "<td>{$product['pname']} is sold {$product['total_sales']} times.</td>";
						    echo "</tr>";
						}
				    }
				    else
				    {
					    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales
							FROM product P, transaction T 
							WHERE P.pid=T.pid AND T.date >={$selectedDateQ8_1} AND T.date <={$selectedDateQ8_2} AND P.pname='{$selectedPidQ8}'";
							
					    $result = phpsec\SQL($query, array());
				    
						echo "<tr>";
						echo "<td>What are the total sales of ".$selectedPidQ8." between ".$_POST["dateQ8_1"]." and ".$_POST["dateQ8_2"]." ?</td>";   
						echo "</tr>";
						foreach($result as $product)
						{
						    echo "<tr>";
						    echo "<td>{$product['total_sales']} number of customer(s) bought this product.</td>";
						    echo "</tr>";
						}
				    }
                                }
                                
                                else if($selectedStat == "q9"){
                                    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales 
                                                FROM product P, transaction T
                                                WHERE P.pid=T.pid 
                                                GROUP BY T.pid
                                                HAVING SUM(T.quantity) =
                                                (SELECT MAX(total_sales)
                                                FROM (SELECT SUM(T1.quantity) AS total_sales 
                                                FROM transaction T1
                                                GROUP BY T1.pid) AS temp)"
                                                ;
					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is the best-selling product?</td>";     
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                               } 
                               
                                else if($selectedStat == "q9_1"){
                                    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales 
						FROM product P, transaction T
						WHERE P.pid=T.pid 
						GROUP BY T.pid
						ORDER BY total_sales DESC
						LIMIT 10";
					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What are the 10 best-selling products?</td>";     
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                               } 
                               else if($selectedStat == "q9_2"){
                                    $query =	"SELECT Temp.sid, P.pname, SUM(T.quantity) AS total_sales 
						FROM product P, transaction T, user_sell_product S, 
						(SELECT employeeid, sid
						FROM employee_workin_store 
						WHERE sid=".$selectedSidQ9_2.") AS Temp
						WHERE P.pid=T.pid AND T.tid=S.tid AND Temp.employeeid=S.USERID
						GROUP BY T.pid
						ORDER BY total_sales DESC
						LIMIT 10";
				       
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is 10 best-selling products of a store# ".$selectedSidQ9_2." ?</td>";     
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q10"){
                                    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales 
						FROM product P, transaction T
						WHERE P.pid=T.pid AND T.date >={$selectedDateQ10_1} AND T.date <= {$selectedDateQ10_2}
						GROUP BY T.pid
						HAVING SUM(T.quantity) =
						(SELECT MAX(total_sales)
						FROM (SELECT SUM(T1.quantity) AS total_sales 
						FROM transaction T1
						GROUP BY T1.pid) AS temp)";
					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is the best-selling product between ".$_POST["dateQ10_1"]." and ".$_POST["dateQ10_2"]." ?</td>";   
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q10_1"){
                                    $query =	
                                                
                                                "SELECT P.pname, SUM(T.quantity) AS total_sales 
                                                FROM product P, transaction T
                                                WHERE P.pid=T.pid AND T.date >={$selectedDateQ10_1_1} AND T.date <= {$selectedDateQ10_1_2}
                                                GROUP BY T.pid
                                                ORDER BY total_sales DESC
                                                LIMIT 10";

					
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is 10 best-selling product between ".$_POST["dateQ10_1_1"]." and ".$_POST["dateQ10_1_2"]." ?</td>";   
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q10_2"){
                                    $query =	"SELECT Temp.sid, P.pname, SUM(T.quantity) AS total_sales 
						FROM product P, transaction T, user_sell_product S, 
						(SELECT employeeid, sid
						FROM employee_workin_store 
						WHERE sid=".$selectedSidQ10_2.") AS Temp
						WHERE P.pid=T.pid AND T.tid=S.tid AND Temp.employeeid=S.USERID
						AND T.date >={$selectedDateQ10_2_1} AND T.date <= {$selectedDateQ10_2_1}
						GROUP BY T.pid
						ORDER BY total_sales DESC
						LIMIT 10";
					
				    $result = phpsec\SQL($query, array());
						
				    echo "<tr>";
                                    echo "<td>What is 10 best-selling product in a store# ".$selectedSidQ10_2."between ".$_POST["dateQ10_2_1"]." and ".$_POST["dateQ10_2_2"]." ?</td>";   
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q11"){
                                    $query ="SELECT P.pname, SUM(T.quantity) AS total_sales 
                                            FROM product P, transaction T
                                            WHERE P.pid=T.pid 
                                            GROUP BY T.pid
                                            HAVING SUM(T.quantity) =
                                            (SELECT MIN(total_sales)
                                            FROM (SELECT SUM(T1.quantity) AS total_sales 
                                            FROM transaction T1
                                            GROUP BY T1.pid) AS temp)";
			    
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is the bottom product among products which has been sold more than 1?</td>";      
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s). </td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q11_1"){
                                    $query =	"SELECT P.pname, SUM(T.quantity) AS total_sales 
FROM product P, transaction T
WHERE P.pid=T.pid 
GROUP BY T.pid
ORDER BY total_sales ASC
LIMIT 10";

				    
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What is the 10 worst-selling products?</td>";      
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold 0 time(s).</td>";
					echo "</tr>";
				    }
                                } 
                                else if($selectedStat == "q11_2"){
                                    $query =	"SELECT Temp.sid, P.pname, SUM(T.quantity) AS total_sales 
						FROM product P, transaction T, user_sell_product S, 
						(SELECT employeeid, sid
						FROM employee_workin_store 
						WHERE sid={$selectedSidQ11_2}) AS Temp
						WHERE P.pid=T.pid AND T.tid=S.tid AND Temp.employeeid=S.USERID
						GROUP BY T.pid
						ORDER BY total_sales ASC
						LIMIT 10";
					
				    $result = phpsec\SQL($query, array());
						
				    echo "<tr>";
                                    echo "<td>What is 10 worst-selling products of a store# ".$selectedSidQ11_2."?</td>";      
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q12"){
                                    $query = "SELECT P.pname, SUM(T.quantity) AS total_sales 
                                            FROM product P, transaction T
                                            WHERE P.pid=T.pid AND T.date >= {$selectedDateQ12_1} AND T.date <= {$selectedDateQ12_2}
                                            GROUP BY T.pid
                                            HAVING SUM(T.quantity) =
                                            (SELECT MIN(total_sales)
                                            FROM (SELECT SUM(T1.quantity) AS total_sales 
                                            FROM transaction T1
                                            GROUP BY T1.pid) AS temp)";
                                    $result = phpsec\SQL($query, array());
                                    echo "<tr>";
                                    echo "<td>What is the bottom product among products which has been sold more than 1 between ".$_POST["dateQ12_1"]." and ".$_POST["dateQ12_2"]." ?</td>";     
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }

                                else if($selectedStat == "q12_2"){
                                    $query = "SELECT Temp.sid, P.pname, SUM(T.quantity) AS total_sales 
FROM product P, transaction T, user_sell_product S, 
(SELECT employeeid, sid
FROM employee_workin_store 
WHERE sid={$selectedSidQ12_2}) AS Temp
WHERE P.pid=T.pid AND T.tid=S.tid AND Temp.employeeid=S.USERID
	AND T.date >={$selectedDateQ12_2_1} AND T.date <={$selectedDateQ12_2_2}
GROUP BY T.pid
ORDER BY total_sales ASC
LIMIT 10";
$result = phpsec\SQL($query, array());
                                    echo "<tr>";
                                    echo "<td>What is 10 worst-selling product in a store# ".$selectedSidQ12_2." between ".$_POST["dateQ12_2_1"]." and ".$_POST["dateQ12_2_2"]." ?</td>";   
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>{$product['pname']} is sold {$product['total_sales']} time(s).</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q13"){
                                    $query =	"SELECT P.pid, P.pname 
						FROM product P
						WHERE P.pid NOT IN (SELECT T.pid FROM transaction T)";
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What are the products which have never been sold at all?</td>";     
                                    echo "</tr>";
				    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>The product {$product['pname']} with id = {$product['pid']} has never been sold. :(</td>";
					echo "</tr>";
				    }
                                } 

                                else if($selectedStat == "q15"){
                                    $query = "SELECT P.pname, P.tinventory 
					FROM product P where P.pid = $selectedPidQ15";
				    
				    $result = phpsec\SQL($query, array());
				    
				    echo "<tr>";
                                    echo "<td>What are the inventory of ".$selectedPidQ15." ?</td>";   
                                    echo "</tr>";
                                    foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>The product {$product['pname']} has inventory of {$product['tinventory']}</td>";
					echo "</tr>";
				    }
                                }
                                else if($selectedStat == "q15_1"){
                                    $query = "SELECT P.pname, H.sinventory 
						FROM product P, store_has_product H
						WHERE P.pid=H.pid AND H.sid={$selectedSidQ15_1} AND P.pname={$selectedPidQ15_1}";
					$result = phpsec\SQL($query, array());
					echo "<tr>";
                                    echo "<td>What are the inventory of ".$selectedPidQ15_1." in a store# ".$selectedSidQ15_1." ?</td>";   
                                    echo "</tr>";
                                   foreach($result as $product)
				    {
					echo "<tr>";
					echo "<td>The product {$product['pname']} has inventory of {$product['sinventory']}</td>";
					echo "</tr>";
				    }
                                }
                                
                                $selectedStat = null;
                                echo " </table>";  
                            }

                            ?>        
                                
                                
                                
                             
                        </div>
                    </div>
                </div>
            </div>
            
        
        
            
            
            
            
        
</table>

            
	</body>
</html>