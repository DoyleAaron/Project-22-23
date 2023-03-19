<!-- 
Page: CompletePurchase.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is used to clear the cart and take away the stock levels for the transaction
-->
<?php
include '../assets/php/db_connection.php';

$sql = "SELECT description, quantity FROM CounterSales";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        $description = $row["description"];
        $quantity = $row["quantity"];
        $quansql = "UPDATE CounterStock SET quantity = quantity - $quantity WHERE description = '$description'";
        $queryresult = mysqli_query($conn, $quansql);
    }
	$delsql = "DELETE FROM CounterSales";
	$queryresult = mysqli_query($conn, $delsql);

    echo "Stock Quantities Updated And The Cart Has Been Cleared";
} else {
    echo "Cart is empty.";
}
mysqli_close($conn);
?>
<br>
<form action="CounterSales.html.php" method="post">
<input type="submit" value="Return To Counter Sales">
</form>

<!-- 
Sources that helped me complete this page:
https://www.w3schools.com/php/func_mysqli_fetch_array.asp
-->