<!-- 
Page: listbox.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the code that is used to populate the from so that the user can select a customer that they wish to delete
-->
<?php
include '../assets/php/db_connection.php';
date_default_timezone_set('UTC');

$sql = "SELECT * FROM Customer WHERE deleted = false";
//This code is selecting all the information for the customers that arent deleted from the system

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
	//This while loop is going through the array and putting all of the information into the form for the user to see and it puts the customers full name into the listbox so that the user can find their desired user
}

echo "</select>";
mysqli_close($conn);

?>