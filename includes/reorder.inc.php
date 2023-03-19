<?php

/*
 * Select a supplier
 * Display drugs from the chosen supplier
 * Select a drug to reorder
 * Enter the reorder quantity
 * Print the reorder letter
 * Update the Order Table and Order Item Table
 * Repeat the process for a different supplier
 */

include_once 'dbh.inc.php';

if (isset($_POST['submitted'])) {

    $supplierId = $_POST['supplierID'];
    $drugId = $_POST['drugID'];
    $quantity = $_POST['amount'];
    $totalCost = getOrderCost($conn, $quantity, $drugId);
    $orderID = getNextOrderID($conn);
    $date = date("Y-m-d");
    $time = date("H:i:s");

    // validate that the quantity is not empty or less than 1.
    if (empty($quantity) || $quantity < 1) {
        header("Location: ../reorder.php?error=bad-quantity");
        exit();
    }

    // validate that the quantity is an integer.
    if (!is_numeric($quantity)) {
        header("Location: ../reorder.php?error=bad-quantity");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO orders (orderID, supplierID, date, time, cost, paid) VALUES (?, ?, ?, ?, ?, 0)");
    $stmt->bind_param("iissi", $orderID, $supplierId, $date, $time, $totalCost);
    $stmt->execute();
    $stmt->close();

    header("Location: ../reorder.php?error=none");

}

// This function is used to get the next orderID manually from the database.
function getNextOrderID($con): int {
    $stmt = $con->prepare("SELECT MAX(orderID) FROM orders");
    $stmt->execute();
    $result = $stmt->get_result();
    $next = $result->fetch_row()[0] + 1;
    $stmt->close();
    return $next;
}

// This function is used to get the cost of an order based on the costPrice column * the quantity.
function getOrderCost($con, $quantity, $drugId): float {
    $stmt = $con->prepare("SELECT costPrice FROM drug WHERE drugID = ?");
    $stmt->bind_param("i", $drugId);
    $stmt->execute();
    $result = $stmt->get_result();
    $price = $result->fetch_row()[0];
    $stmt->close();
    return (float) $price * $quantity;
}