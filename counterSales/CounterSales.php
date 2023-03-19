<!-- 
Page: CounterSales.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is used to insert the transactions that have been made into the CounterSales table
-->

<br><br>
<?php

include '../assets/php/db_connection.php';

$description = $_POST['description'];
$retailPrice = $_POST['retailPrice'];
$quantity = $_POST['quantity'];

$sql = "INSERT into CounterSales(description,retailPrice,quantity) VALUES ('$description','$retailPrice','$quantity')";

if(! mysqli_query($conn, $sql)){
    echo "Error ". mysqli_error($conn);
}

mysqli_close($conn);

?>
<form action="CounterSales.html.php" method="post">
<p>Added To Cart</p>
<input type="submit" value="Return To Screen">
</form>
