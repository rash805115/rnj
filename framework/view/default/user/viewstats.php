<?php

if(isset($_POST["stats"]))
{
    $selectedStat = $_POST["stats"];
    
    $selectedPidQ6= $_POST["pnameQ6"];
    $selectedPidQ7= $_POST["pnameQ7"];
    $selectedPidQ8= $_POST["pnameQ8"];
    $selectedPidQ15_1= $_POST["pnameQ15_1"];
    $selectedPidQ15= $_POST["pnameQ15"];
    
    $selectedDateQ6_1= $_POST["dateQ6_1"];
    $selectedDateQ6_2= $_POST["dateQ6_2"];
    $selectedDateQ8_1= $_POST["dateQ8_1"];
    $selectedDateQ8_2= $_POST["dateQ8_2"];
    $selectedDateQ10_1= $_POST["dateQ10_1"];
    $selectedDateQ10_2= $_POST["dateQ10_2"];
    $selectedDateQ10_1_1= $_POST["dateQ10_1_1"];
    $selectedDateQ10_1_2= $_POST["dateQ10_1_2"];
    $selectedDateQ10_2_1= $_POST["dateQ10_2_1"];
    $selectedDateQ10_2_2= $_POST["dateQ10_2_2"];
    $selectedDateQ12_1= $_POST["dateQ12_1"];
    $selectedDateQ12_2= $_POST["dateQ12_2"];
    $selectedDateQ12_1_1= $_POST["dateQ12_1_1"];
    $selectedDateQ12_1_2= $_POST["dateQ12_1_2"];
    $selectedDateQ12_2_1= $_POST["dateQ12_2_1"];
    $selectedDateQ12_2_2= $_POST["dateQ12_2_2"];
    $selectedDateQ14_1= $_POST["dateQ14_1"];
    $selectedDateQ14_2= $_POST["dateQ14_2"];
    
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
    $result = phpsec\SQL("SELECT pid FROM product");
    return $result;
}

function getAllProductsName()
{
    $result = phpsec\SQL("SELECT pname FROM product");
    return $result;
}

function getAllStoresId()
{
    $result = phpsec\SQL("SELECT sid FROM store");
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
                                    <input type="radio" name="stats" value="q1_1">How much does each employee sell products at the store 
                                    <select name = "sidQ1_1" >
                                            <?php
                                            $storeId = getAllStoresId();
                                            for ($i = 0; $i < count($storeId); $i++)
                                            {
                                                echo "<option value=".$storeId[$i][sid].">";
                                                echo $storeId[$i][sid]."</option> <br>";
                                            }                                       
                                            ?>
                                    </select>
                                    sells products ?
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
                                    <input type="radio" name="stats" value="q11">What is the worst-selling products?<br>
                                    <input type="radio" name="stats" value="q11_1">What is 10 worst-selling products?<br>
                                    <input type="radio" name="stats" value="q11_2">What is 10 best-selling products of a store
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
                                    <input type="radio" name="stats" value="q12">What is the worst-selling products between 
                                        <input type='date' name="dateQ12_1">
                                        and 
                                        <input type='date' name="dateQ12_2"> 
                                    <br>
                                    <input type="radio" name="stats" value="q12_1">What is 10 worst-selling products between 
                                        <input type='date' name="dateQ12_1_1">
                                        and 
                                        <input type='date' name="dateQ12_1_2"> 
                                    <br>
                                    <input type="radio" name="stats" value="q12_2">What is 10 worst-selling product of a store
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
                                    <input type="radio" name="stats" value="q14">What are the products which have never been sold between 
                                        <input type='date' name="dateQ14_1">
                                        and 
                                        <input type='date' name="dateQ14_2">
                                    <br>
                                    <input type="radio" name="stats" value="q15">What are the inventory of
                                    <select name = "pnameQ15" >
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
                                    ?
                                    <br>
                                    <input type="radio" name="stats" value="q15_1">What are the inventory of
                                    <select name = "pnameQ15_1" >
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
                                
                                else if($selectedStat == "q1_1"){
                                    echo "<tr>";
                                    echo "<td>How much does each employee sell products at store#".$selectedSidQ1_1." sells products ?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
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
                                    echo "<td>How many customers have bought ".$selectedPidQ6." between ".$selectedDateQ6_1." and ".$selectedDateQ6_2." ?</td>";     
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
                                    echo "<td>What are the total sales of ".$selectedPidQ8." between ".$selectedDateQ8_1." and ".$selectedDateQ8_2." ?</td>";   
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                
                                else if($selectedStat == "q9"){
                                    echo "<tr>";
                                    echo "<td>What is the best-selling product?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                               } 
                               
                                else if($selectedStat == "q9_1"){
                                    echo "<tr>";
                                    echo "<td>What is 10 best-selling products?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                               } 
                               else if($selectedStat == "q9_2"){
                                    echo "<tr>";
                                    echo "<td>What is 10 best-selling products of a store# ".$selectedSidQ9_2." ?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q10"){
                                    echo "<tr>";
                                    echo "<td>What is the best-selling product between ".$selectedDateQ10_1." and ".$selectedDateQ10_2." ?</td>";   
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q10_1"){
                                    echo "<tr>";
                                    echo "<td>What is 10 best-selling product between ".$selectedDateQ10_1_1." and ".$selectedDateQ10_1_2." ?</td>";   
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q10_2"){
                                    echo "<tr>";
                                    echo "<td>What is 10 best-selling product in a store# ".$selectedSidQ10_2."between ".$selectedDateQ10_2_1." and ".$selectedDateQ10_2_2." ?</td>";   
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q11"){
                                    echo "<tr>";
                                    echo "<td>What is the worst-selling products?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q11_1"){
                                    echo "<tr>";
                                    echo "<td>What is 10 worst-selling products?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                } 
                                else if($selectedStat == "q11_2"){
                                    echo "<tr>";
                                    echo "<td>What is 10 worst-selling products of a store# ".$selectedSidQ11_2."?</td>";      
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q12"){
                                    echo "<tr>";
                                    echo "<td>What is the worst-selling products between ".$selectedDateQ12_1." and ".$selectedDateQ12_2." ?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q12_1"){
                                    echo "<tr>";
                                    echo "<td>What is 10 worst-selling products between ".$selectedDateQ12_1_1." and ".$selectedDateQ12_1_2." ?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q12_2"){
                                    echo "<tr>";
                                    echo "<td>What is 10 worst-selling product in a store# ".$selectedSidQ12_2." between ".$selectedDateQ12_2_1." and ".$selectedDateQ12_2_2." ?</td>";   
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
                                    echo "<td>What are the products which have never been sold between ".$selectedDateQ14_1." and ".$selectedDateQ14_2." ?</td>";     
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q15"){
                                    echo "<tr>";
                                    echo "<td>What are the inventory of ".$selectedPidQ15." ?</td>";   
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>report displayed here</td>";
                                    echo "</tr>";
                                }
                                else if($selectedStat == "q15_1"){
                                    echo "<tr>";
                                    echo "<td>What are the inventory of ".$selectedPidQ15_1." in a store# ".$selectedSidQ15_1." ?</td>";   
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