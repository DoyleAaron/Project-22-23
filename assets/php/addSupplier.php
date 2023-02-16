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

// selecting everything from suppliers for getting last row
$sql = "SELECT * FROM Suppliers";

// getting the result
$result = mysqli_query($conn, $sql);    

// Get the last supplierID
while($row = mysqli_fetch_array($result)) {
    $last_id = $row['supplierID'];
}

// Add 1 to the last supplierID
$new_id = $last_id + 1;

// insert
$sql = "INSERT INTO Suppliers (supplierID, supplierName, address, email, website, telephone, deleted) VALUES ('$new_id', '$supplierName', '$address', '$email', '$website', '$telephone', '0')";

$result = mysqli_query($conn, $sql);

header("Location: ../../pages/add_supplier.html");

?>