<?php 
include 'db_connection.php'; // including db connection for use

/* 
supplierName varchar 30
address varchar 255
email varchar 30
website varchar 30
telephone int 11
deleted int 1
*/

// getting all information from form post

$supplierName = $_POST['supplierName'];
$address = $_POST['address'];
$email = $_POST['email'];
$website = $_POST['website'];
$telephone = $_POST['telephone'];

// sanitizing the data - prevent SQL injection
$supplierName = mysqli_real_escape_string($conn, $supplierName);
$address = mysqli_real_escape_string($conn, $address);
$email = mysqli_real_escape_string($conn, $email);
$website = mysqli_real_escape_string($conn, $website);
$telephone = mysqli_real_escape_string($conn, $telephone);

// selecting everything from suppliers for getting last row
$sql = "SELECT MAX(supplierID) AS supplierID FROM suppliers";

// getting the result
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));  

// Get the last supplierID
$row = mysqli_fetch_array($result);

// Add 1 to the last supplierID
$new_id = $row['supplierID'] + 1;

// insert
$sql = "INSERT INTO Suppliers (supplierID, supplierName, address, email, website, telephone, deleted) VALUES ($new_id, $supplierName, $address, $email, $website, $telephone, '0')";

$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

echo $result;


?>