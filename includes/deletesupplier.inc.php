<?php
include_once 'dbh.inc.php';

if (isset($_POST['submitted'])) {
    // Check if not deleted
    $id = $_POST['id'];
    $sql = "SELECT supplierID FROM Suppliers WHERE deleted = 0 AND supplierID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($id == $row['supplierID']) {
                $stmt = $conn->prepare("UPDATE Suppliers SET deleted = 1 WHERE supplierID = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                header("Location: ../deletesupplier.php?delete=success");
            } else {
                header("Location: ../deletesupplier.php?delete=failed");
            }
        }

        $stmt->close();
        exit();
    }
}