<?php
include '../assets/php/db_connection.php';

date_default_timezone_set ("UTC");

$sql = "use BigPharma;";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}

$sql = "Insert into Doctor(firstName, lastName, surgeryAddress, surgeryTelephone, mobileNumber, homeAddress, homeTelephone)
VALUES ('$_POST[firstname]','$_POST[surname]','$_POST[surgAddress]','$_POST[surgPhone]','$_POST[phone]','$_POST[address]','$_POST[homePhone]')";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}


echo "<br>A record has been added for Dr. " . $_POST['surname'];

mysqli_close($conn) ;


?>