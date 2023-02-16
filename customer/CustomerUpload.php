<?php
include '../assets/php/db_connection.php';
// This is linking to the conection file to connect to our MySql

date_default_timezone_set ("UTC");

$sql = "use BigPharma;";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}


$firstName = $POST_['firstname'];
$secondName = $POST_['surname'];
$dob = $POST_['dob'];
$customerAddress = $POST_['address'];
$telephoneNumber = $POST_['phonenum'];
$PPSN = $POST_['PPSN'];
// Here I am using the post commands to assign the user input to the mysql variables

//Here I am selecting everything that exists in the Customer table
$sql = "SELECT * FROM Customer";

// This is getting the result of everything from the last command
$result = mysqli_query($conn, $sql);

// Here I am searching through the array until it reaches the last row and then i'm assigning this vakue to last id
while($row = mysqli_fetch_array($result)){
    $last_id = $row['customerID'];
}

// Then I am adding one to last id to create an auto incrementing feature for the customer id
$new_id = $last_id + 1;

$sql = "Insert into Customer(customerID, firstName, secondName, dob, customerAddress, telephoneNumber, PPSN)
VALUES ('$new_id ', $firstname','$surname','$dob','$address','$phonenum','$ppsn')";
// Here I am inserting the data entered by the user into the mySql database using the posted details that i did earlier

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}
// This if statement is checking to see if either of the funcions do not go ahead , it will then give out an error code

echo "<br>A record has been added for Customer " . $_POST['firstname'] . " " . $_POST['surname'];
// This is to let the user know that a Customer has been added to the database

mysqli_close($conn) ;


?>