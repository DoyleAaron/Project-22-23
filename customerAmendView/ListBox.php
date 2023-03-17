<!-- 
Page: listbox.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the code that is used to populate the Customer information into the form so that the information can be altered
-->
<?php
include '../assets/php/db_connection.php';
date_default_timezone_set('UTC');

$sql = "SELECT * FROM Customer WHERE deleted = false";

if(!$result = mysqli_query($conn, $sql))
{
    die('Error when querying the database' . mysqli_error($conn));
}

echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{
	$customerID = $row['customerID'];
    $firstName = $row['firstName'];
    $secondName = $row['secondName'];
    $customerAddress = $row['customerAddress'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
    $telephoneNumber = $row['telephoneNumber'];
	
    $allText = "$customerID,$firstName,$secondName,$customerAddress,$dob,$telephoneNumber";
    echo "<option value = '$allText'>$firstName  $secondName </option>";
}

echo "</select>";
mysqli_close($conn);

?>