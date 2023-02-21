<?php
include_once 'dbh.inc.php';

// Check if not deleted
$id = $_POST['suppliers'];

$sql = "SELECT supplierID FROM suppliers WHERE deleted = 0 AND supplierID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($id == $row['supplierID']) {
            $stmt = $conn->prepare("UPDATE suppliers SET deleted = 1 WHERE supplierID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            header("Location: ../deletesupplier.php?error=success");
        } else {
            header("Location: ../deletesupplier.php?error=unknownSupplier");
        }
    }

    $stmt->close();
    exit();
}