<?php
include '../assets/php/db_connection.php';
date_default_timezone_set('UTC');

$sql = "SELECT * FROM Customer WHERE Deleted = false";

if(!$result = mysqli_query($conn, $sql))
{
    die('Error in querying the database' . mysqli_error($conn));
}

echo "<br><select name='ListBox' id='ListBox' onclick='populate()'>";

while($row = mysqli_fetch_array($result))
{
    $firstName = $row['firstName'];
    $secondName = $row['secondName'];
    $customerAddress = $row['customerAddress'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
    $telephoneNumber = $row['telephoneNumber'];
    $PPSN = $row['PPSN'];
	
    $allText = "$firstName,$secondName,$customerAddress,$dob,$telephoneNumber,$PPSN";
    echo "<option value = '$allText'>$firstName . $secondName </option>";
}

echo "</select>";
mysqli_close($conn);

?>