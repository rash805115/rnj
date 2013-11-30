<?php

if(isset($_POST["stats"]))
{
    $selectedStat = $_POST["stats"];
    
    $selectedPidQ6= $_POST["pnameQ6"];
    $selectedPidQ7= $_POST["pnameQ7"];
    $selectedPidQ8= $_POST["pnameQ8"];
    
    $selectedTimeQ6= $_POST["timeQ6"];
    $selectedTimeQ8= $_POST["timeQ8"];
    $selectedTimeQ10= $_POST["timeQ10"];
    $selectedTimeQ12= $_POST["timeQ12"];
    $selectedTimeQ14= $_POST["timeQ14"];
}

function getAllProductsId()
{
    $result = phpsec\SQL("SELECT pid FROM product");
    return $result;
}

function getAllProductsName()
{
    $result = phpsec\SQL("SELECT pname FROM product");
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
                                        in 
                                         <select name="timeQ6">
                                            <option value="this week">this week</option> <br>
                                            <option value="last 14 days">last 14 days</option> <br>
                                            <option value="last 30 days">last 30 days</option> <br>
                                            <option value="last 60 days">last 60 days</option> <br>
                                        </select>
                                        ?
                                    <br>
                                    <input type="radio" name="stats" value="q7">What are the total sales of 
                                        <select name="pnameQ7">
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
                                    <input type="radio" name="stats" value="q8">What are the total sales of 
                                        <select name = "pnameQ8" >
                                            <option value="all products">all products</option><br>
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
                                        in 
                                        <select name="timeQ8">
                                            <option value="this week">this week</option> <br>
                                            <option value="last 14 days">last 14 days</option> <br>
                                            <option value="last 30 days">last 30 days</option> <br>
                                            <option value="last 60 days">last 60 days</option> <br>
                                        </select>
                                        ?
                                    <br>
                                    <input type="radio" name="stats" value="q9">What is 10 best-selling products?<br>
                                    <input type="radio" name="stats" value="q10">What is the best-selling product in  
                                        <select name="timeQ10">
                                            <option value="this week">this week</option> <br>
                                            <option value="last 14 days">last 14 days</option> <br>
                                            <option value="last 30 days">last 30 days</option> <br>
                                            <option value="last 60 days">last 60 days</option> <br>
                                        </select>
                                        ?
                                    <br>
                                    
                                    <input type="radio" name="stats" value="q11">What is 10 worst-selling products?<br>
                                    <input type="radio" name="stats" value="q12">What is the worst-selling products in
                                        <select name="timeQ12">
                                            <option value="this week">this week</option> <br>
                                            <option value="last 14 days">last 14 days</option> <br>
                                            <option value="last 30 days">last 30 days</option> <br>
                                            <option value="last 60 days">last 60 days</option> <br>
                                        </select>
                                        ?
                                    <br>
                                    <input type="radio" name="stats" value="q13">What are the products which have never been sold at all?<br>
                                    <input type="radio" name="stats" value="q14">What are the products which have never been sold in
                                         <select name="timeQ14">
                                            <option value="this week">this week</option> <br>
                                            <option value="last 14 days">last 14 days</option> <br>
                                            <option value="last 30 days">last 30 days</option> <br>
                                            <option value="last 60 days">last 60 days</option> <br>
                                        </select>
                                        ?
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
                                    echo "<tr>";
                                    echo "<td>$result</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q2"){
                                    echo "<tr>";
                                    echo "<td>Who has sold products the most?</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                } 
                                else if($selectedStat == "q3"){
                                    echo "<tr>";
                                    echo "<td>Who has sold products the least?</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
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
                                    echo "<tr>";
                                    echo "<td>How many employees are working at each store?</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                } 
                                else if($selectedStat == "q6"){
                                    echo "<tr>";
                                    echo "<td>How many customers have bought ".$selectedPidQ6." in ".$selectedTimeQ6."?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q7"){
                                    echo "<tr>";
                                    echo "<td>What are the total sales of ".$selectedPidQ7."?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                } 
                                else if($selectedStat == "q8"){
                                    echo "<tr>";
                                    echo "<td>What are the total sales of ".$selectedPidQ8." in ".$selectedTimeQ8."?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q9"){
                                    echo "<tr>";
                                    echo "<td>What is 10 best-selling products?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                               } 
                                else if($selectedStat == "q10"){
                                    echo "<tr>";
                                    echo "<td>What is the best-selling product in ".$selectedTimeQ10."?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q11"){
                                    echo "<tr>";
                                    echo "<td>What is 10 worst-selling products?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                } 
                                else if($selectedStat == "q12"){
                                    echo "<tr>";
                                    echo "<td>What is the worst-selling products in ".$selectedTimeQ12."?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
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
                                else if($selectedStat == "q14"){
                                    echo "<tr>";
                                    echo "<td>What are the products which have never been sold in ".$selectedTimeQ14."?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
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