<?php
include '../assets/php/db_connection.php';
// This is linking to the conection file to connect to our MySql database

date_default_timezone_set ("UTC");

$sql = "use BigPharma;";
// This is the sql command to use the database called 'BigPharma'

$sql = "Insert into Customer(firstName, secondName, dob, customerAddress, telephoneNumber, PPSN)
VALUES ('$_POST[firstname]','$_POST[surname]','$_POST[dob]','$_POST[address]','$_POST[phonenum]','$_POST[ppsn]')";
// Here I am inserting the data entered by the user into the mySql database by using the POST commands

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}
// This if statement is checking to see if either of the funcions do not go ahead , it will then give out an error code

echo "<br>A record has been added for Customer " . $_POST['firstname'] . $_POST['surname'];
// This is to let the user know that a Customer has been added to the database

mysqli_close($conn) ;

?>