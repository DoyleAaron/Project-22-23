<?php

include_once('dbh.inc.php');
include_once('addsupplier.functions.php');

if (isset($_POST['submit'])) {

    if (emptyInputs()) {
        header("location: ../addsupplier.php" . createErrorMessage("emptyinput"));
        exit();
    }

    if (invalidName()) {
        header("location: ../addsupplier.php" . createErrorMessage("invalidname"));
        exit();
    }

    if (invalidAddress()) {
        header("location: ../addsupplier.php" . createErrorMessage("invalidaddress"));
        exit();
    }

    if (invalidEmail()) {
        header("location: ../addsupplier.php" . createErrorMessage("invalidemail"));
        exit();
    }

    if (invalidTelephone()) {
        header("location: ../addsupplier.php" . createErrorMessage("invalidphone"));
        exit();
    }

    if (invalidWebsite()) {
        header("location: ../addsupplier.php" . createErrorMessage("invalidwebsite"));
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
        header("location: ../addsupplier.php?error=stmtfailed");
        exit();
    }

    $stmt->close();
    header("location: ../addsupplier.php?error=none");
    exit();
}