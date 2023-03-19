<!-- 
Page: cart.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is used to show the user what is currently in the customers cart
-->
<?php
include '../assets/php/db_connection.php';

$sql = "SELECT description, retailPrice, quantity FROM CounterSales";
$result = mysqli_query($conn, $sql);
					
if(mysqli_num_rows($result) > 0){
    echo "<table>";
    echo "<tr><th>Description</th><th>Retail Price</th><th>Quantity</th></tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["retailPrice"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Cart Empty";
}
mysqli_close($conn);
?>
<!--
The idea for this code was learned from these sources:
https://www.youtube.com/watch?v=bHFoobciCTM
https://www.w3schools.com/php/php_mysql_select.asp
https://www.youtube.com/watch?v=Q-Qtdpr-_Ds
-->