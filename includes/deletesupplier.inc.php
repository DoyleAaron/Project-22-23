<?php
include_once 'dbh.inc.php';

// TODO: Do not delete if there is a current order w/ supplier or there is a stock item from supplier in the stocks table

if (isset($_POST['submitted'])) {
    // Check if not deleted
    $id = $_POST['id'];
    $sql = "SELECT supplierID FROM suppliers WHERE deleted = 0 AND supplierID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if (hasOrder($conn, $id)) {
        header("Location: ../deletesupplier.php?delete=has-order");
        exit();
    }

    if (hasStock($conn, $id)) {
        header("Location: ../deletesupplier.php?delete=has-stock");
        exit();
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($id == $row['supplierID']) {
                $stmt = $conn->prepare("UPDATE suppliers SET deleted = 1 WHERE supplierID = ?");
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

function hasOrder($con, $id): bool {
    $stmt = $con->prepare("SELECT supplierID FROM orders WHERE supplierID = ? AND paid = 0");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->num_rows > 0;
}

function hasStock($con, $id): bool {
    $stmt = $con->prepare("SELECT supplierID FROM counterstock WHERE supplierID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->num_rows > 0;
}