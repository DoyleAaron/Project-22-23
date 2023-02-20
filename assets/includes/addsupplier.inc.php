<?php

include_once('../../assets/includes/dbh.inc.php');
include_once('../../assets/includes/verification.php');

if (emptyInputs()) {
    header("location: ../../pages/addsupplier.php?error=emptyinput");
    exit();
}

if (invalidName()) {
    header("location: ../../pages/addsupplier.php?error=invalidname");
    exit();
}

if (invalidAddress()) {
    header("location: ../../pages/addsupplier.php?error=invalidaddress");
    exit();
}

if (invalidEmail()) {
    header("location: ../../pages/addsupplier.php?error=invalidemail");
    exit();
}

if (invalidTelephone()) {
    header("location: ../../pages/addsupplier.php?error=invalidphone");
    exit();
}

if (invalidWebsite()) {
    header("location: ../../pages/addsupplier.php?error=invalidwebsite");
    exit();
}

$stmt = $conn->prepare("SELECT MAX(supplierID) as id FROM suppliers");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
    }
}

$id = $id + 1;

$supplierName = $_POST['supplierName'];
$email = $_POST['email'];
$address = $_POST['address'];
$website = $_POST['website'];
$telephone = $_POST['telephone'];

$stmt = $conn->prepare("INSERT INTO suppliers (supplierID, supplierName, email, address, website, telephone, deleted) VALUES (?, ?, ?, ?, ?, ?, 0)");
$stmt->bind_param("isssss", $id, $supplierName, $email, $address, $website, $telephone);
$stmt->execute();

// check for error
if ($stmt->error) {
    header("location: ../../pages/addsupplier.php?error=stmtfailed");
    exit();
}

$stmt->close();
header("location: ../../pages/addsupplier.php?error=none");
exit();