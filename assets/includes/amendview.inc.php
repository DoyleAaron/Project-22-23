<?php
include_once 'dbh.inc.php';

if (isset($_POST['view'])) {
    $supplierID = $_POST['suppliers'];

    $stmt = $conn->prepare("SELECT supplierID, supplierName, address, email, website, telephone FROM suppliers WHERE supplierID = ? AND deleted = 0");
    $stmt->bind_param("i", $supplierID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No suppliers found";
        exit();
    }

    while ($row = $result->fetch_assoc()) {
        $_SESSION['supplierID'] = $row['supplierID'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['website'] = $row['website'];
        $_SESSION['telephone'] = $row['telephone'];
    }

    $stmt->close();
    header("Location: ../../pages/amendview.php");
} else if (isset($_POST['submit-amend'])) {
    $supplierID = $_POST['suppliers'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $stmt = $conn->prepare("UPDATE suppliers SET address = ?, email = ?, website = ?, telephone = ? WHERE supplierID = ? AND deleted = 0");
    $stmt->bind_param("ssssi", $address, $email, $website, $telephone, $supplierID);
    $stmt->execute();
    $stmt->close();

    $_SESSION['success'] = true;
    header("Location: ../../pages/amendview.php");
} else {
    header("Location: ../../pages/amendview.php");
    exit();
}


