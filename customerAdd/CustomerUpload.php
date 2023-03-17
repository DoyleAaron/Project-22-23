<!-- 
Page: CustomerUpload.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is used to insert the customer data entered by the user into the Customer table in the database
-->
<?php
include '../assets/php/db_connection.php';


date_default_timezone_set ("UTC");

$sql = "use BigPharma;";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}


$firstName = $_POST['firstname'];
$secondName = $_POST['surname'];
$dob = $_POST['dob'];
$customerAddress = $_POST['address'];
$telephoneNumber = $_POST['phonenum'];
// Here I am using the post commands to assign the user input to the mysql variables

//Here I am selecting everything that exists in the Customer table
$sql = "SELECT * FROM Customer";

// This is getting the result of everything from the last command
$result = mysqli_query($conn, $sql);

// Here I am searching through the array until it reaches the last row and then i'm assigning this vakue to last id
while($row = mysqli_fetch_array($result)){
    $last_id = $row['customerID'];
}

$new_id = $last_id + 1;
// This is now simulating an auto incrementing feature

$sql = "Insert into Customer(customerID, firstName, secondName, dob, customerAddress, telephoneNumber, PPSN)
VALUES ('$new_id','$firstName','$secondName','$dob','$customerAddress','$telephoneNumber')";
// Here I am getting the information that was inputted by the user and putting it into the Customer Table

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}

mysqli_close($conn) ;


?>
<form action="Customeradd.php" method="post">
<input type="submit" value="Return to Previous Screen">
</form>