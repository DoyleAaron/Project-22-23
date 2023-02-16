<?php
include '../assets/php/db_connection.php';

date_default_timezone_set ("UTC");

$sql = "use BigPharma;";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}

$sql = "Insert into Customer(firstName, secondName, email, dob, customerAddress, telephoneNumber, PPSN)
VALUES ('$_POST[firstname]','$_POST[surname]','$_POST[email]','$_POST[dob]','$_POST[customerAddress]','$_POST[phonenum]','$_POST[ppsn]')";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}


echo "<br>A record has been added for Customer " . $_POST['firstName'] . $_POST['secondName'];

mysqli_close($conn) ;


?>