<?php

include 'dbh.inc.php';

/*
supplierName varchar 30
address varchar 255
email varchar 30
website varchar 30
telephone int 11
deleted int 1
*/

// getting all information from form post

if (isset($_POST['submit'])) {

    $supplierName = $_POST['supplierName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $telephone = $_POST['telephone'];
    $deleted = 0;

// selecting everything from suppliers for getting last row
    $sql = "SELECT MAX(supplierID) AS supplierID FROM suppliers";

// getting the result
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

// Get the last supplierID
    $row = mysqli_fetch_array($result);

// Add 1 to the last supplierID
    $new_id = $row['supplierID'] + 1;

// insert
    $stmt = $conn->prepare("INSERT INTO suppliers (supplierID, supplierName, address, email, website, telephone, deleted) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi", $new_id, $supplierName, $address, $email, $website, $telephone, $deleted);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!isset($_SESSION)) {
        session_start();
    }

    if (mysqli_error($conn)) {
        $_SESSION['success'] = false;
    } else {
        $_SESSION['success'] = true;
    }

    $stmt->close();

    header("Location: ../../pages/addsupplier.php");

}