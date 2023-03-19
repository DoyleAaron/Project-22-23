<?php

include_once("dbh.inc.php");

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$website = $_POST['website'];
$telephone = $_POST['telephone'];

$stmt = $conn->prepare("UPDATE suppliers SET supplierName = ?, address = ?, email = ?, website = ?, telephone = ? WHERE supplierID = ? AND deleted = 0");
$stmt->bind_param("sssssi", $name, $address, $email, $website, $telephone, $id);
$stmt->execute();

if ($stmt->affected_rows == 1) {
    header("Location: ../amendview.php?amend=success");
} else {
    header("Location: ../amendview.php?amend=failed");
}