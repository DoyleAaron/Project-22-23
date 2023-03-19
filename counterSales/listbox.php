<!-- 
Page: listbox.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is used to populate the stock form on the Counter Sales screen with the description and retail price of the item
-->
<?php
include '../assets/php/db_connection.php';
date_default_timezone_set('UTC');

$sql = "SELECT description, retailPrice FROM CounterStock";

if(!$result = mysqli_query($conn, $sql))
{
    die('Error when querying the database' . mysqli_error($conn));
}

echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{
	$description = $row['description'];
	$retailPrice = $row['retailPrice'];
   
	
    $allText = "$description,$retailPrice";
    echo "<option value = '$allText'>$description</option>";
}

echo "</select>";
mysqli_close($conn);

?>