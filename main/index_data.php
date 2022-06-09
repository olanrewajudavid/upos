<?php 
//Customer
include('../connect.php');
//Now Date
//$date = date('m/d/Y h:i:s a', time());
//$date = date('Y', time());
//echo $date;

$date_today = date('m/d/y');
$date_month = date('m');
$date_year = date('y');

				$result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
				$result->execute();
				$customers = $result->rowcount();
				$customers = number_format($customers);

//Suppliers
				$result = $db->prepare("SELECT * FROM supliers");
				$result->execute();
				$suppliers = $result->rowcount();
				$suppliers = number_format($suppliers);

//Products
				$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold DESC");
				$result->execute();
				$products = $result->rowcount();
				$products = number_format($products);

//Total Sales 

				$sql = $db->prepare("SELECT amount FROM sales");
				$sql->execute();
				$no = $sql->rowcount();
				$row = $sql->fetch(PDO::FETCH_ASSOC);
				$sales1 = 0;
				 foreach($sql as $row){
                $product_price = array($row["amount"]);

                $values = array_sum($product_price );
                $salesr += $values;
				}
				//$sales = round($sales);
				
				$sales = number_format($sales1);
				
//Sales Today

				/*$sqld = $db->prepare("SELECT amount FROM sales WHERE date = '$date_today'");
				$sqld->execute();
				$nod = $sqld->rowcount();
				$rowd = $sqld->fetch(PDO::FETCH_ASSOC);
				$sales1d = 0;
				foreach($sqld as $rowd){
                $product_priced = array($rowd["amount"]);
                $valuesd = array_sum($product_priced );
                $sales1d += $valuesd;
				}
				
				$salesd = number_format($sales1d);*/
				
$select_today = "SELECT SUM(amount) FROM sales where date = '$date_today'";
$salesd_query =	mysqli_query($db2,$select_today);
$row_salesd = mysqli_fetch_array($salesd_query);											
$salesdr = $row_salesd['SUM(amount)'];
$salesd = number_format($salesdr);

//Sales this month
$select_month = "SELECT SUM(amount) FROM sales where date LIKE '$date_month%'";
$salesm_query =	mysqli_query($db2,$select_month);
$row_salesm = mysqli_fetch_array($salesm_query);											$salesmr = $row_salesm['SUM(amount)'];
$salesm = number_format($salesmr);
				

//Sales This Year
$select_year = "SELECT SUM(amount) FROM sales where date LIKE '%$date_year'";
$sales_query =	mysqli_query($db2,$select_year);
$row_sales = mysqli_fetch_array($sales_query);											
$salesr = $row_sales['SUM(amount)'];
$sales = number_format($salesr);

				
//Total Profits
				/*$sql = $db->prepare("SELECT profit FROM sales");
				$sql->execute();
				$no = $sql->rowcount();
				$row = $sql->fetch(PDO::FETCH_ASSOC);
				$profit1 = 0;
				 foreach($sql as $row){
                $product_profit = array($row["profit"]);

                $values = array_sum($product_profit);
                $profit1 += $values;
				}
				
				$profit = number_format($profit1);*/

//Profit Today
$profit_today = "SELECT SUM(profit) FROM sales where date = '$date_today'";
$profitd_query =	mysqli_query($db2,$profit_today);
$row_profitd = mysqli_fetch_array($profitd_query);
$profitdr = $row_profitd['SUM(profit)'];											
$profitd = number_format($profitdr);

//Profit This Month				
$profit_month = "SELECT SUM(profit) FROM sales where date LIKE '$date_month%'";
$profitm_query =	mysqli_query($db2,$profit_month);
$row_profitm = mysqli_fetch_array($profitm_query);											$profitmr = $row_profitm['SUM(profit)'];
$profitm = number_format($profitmr);

//Profit Overall
$profit = "SELECT SUM(profit) FROM sales where date LIKE '%$date_year'";
$profit_query =	mysqli_query($db2,$profit);
$row_profit = mysqli_fetch_array($profit_query);											$profitr = $row_profit['SUM(profit)'];
$profit = number_format($profitr);


//Percentage Profit



//Profit Today
$profitd_perc = $profitdr/$salesdr;
$profitd_perc = $profitd_perc*100;
$profitd_perc = round($profitd_perc,2);


//Profit This Month
$profitm_perc = $profitmr/$salesmr;
$profitm_perc = $profitm_perc*100;
$profitm_perc = round($profitm_perc,2);


//Frofit This year
$profit_perc = $profitr/$salesr;
$profit_perc = $profit_perc*100;
$profit_perc = round($profit_perc,2);

//Now Date
//$date = date('m/d/Y h:i:s a', time());
/*$date = date('m/d/Y', time());

$sql = $db->prepare("SELECT amount FROM sales WHERE date = $date");
				$sql->execute();
				$no = $sql->rowcount();
				$row = $sql->fetch(PDO::FETCH_ASSOC);
				$sales_today = 0;
				 foreach($sql as $row){
                $sales_now = array($row["amount"]);

                $values = array_sum($sales_now );
                $sales_today += $values;
				}
				
				$sales_today = number_format($sales_today);*/
				
				//echo "<script>alert('$sales_today')///script>";

?>