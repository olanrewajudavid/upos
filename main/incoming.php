<?php
session_start();
//echo "Something"; die();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$date = $_POST['date'];
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['price'];
$code=$row['product_code'];
$gen=$row['gen_name'];
$name=$row['product_name'];
$p=$row['profit'];
$qty_left = $row['qty']; 
//echo $qty_left; die();
//echo $p;
if($c > $qty_left){
	
	/*echo "<script type='text/javascript'>alert('out of stock');</script>";*/
	//header("location: sales.php?id=$w&invoice=$a&err=+err");
	//echo "Product is insufficient! The quatity left is:".$qty_left;
	die();
	} 
	
}
/*echo $a."<br>".$b."<br>".$c."<br>".$w."<br>".$date."<br>".$discount."<br>"; die();*/

//edit qty
$sql = "UPDATE products 
        SET qty=qty-?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
$fffffff=$asasa-$discount;
$d=$fffffff*$c;
$profit=$p*$c;
// query
$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,profit,product_code,gen_name,date) VALUES (:a,:b,:c,:d,:e,:f,:h,:i,:j,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':k'=>$date));
//header("location: sales.php?id=$w&invoice=$a");
echo "sales.php?id="."$w"."&invoice="."$a";


?>