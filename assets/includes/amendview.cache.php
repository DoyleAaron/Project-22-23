<?php

include_once 'dbh.inc.php';

function writeToSession(): void
{
    global $conn;
    $stmt = $conn->prepare("SELECT supplierID, address, email, website, telephone FROM suppliers WHERE deleted = 0");
    $stmt->execute();
    $result = $stmt->get_result();

    if (!isset($_SESSION)) {
        session_start();
    }

    while ($row = $result->fetch_assoc()) {
        $_SESSION[$row['supplierID']] = [
            'address' => $row['address'],
            'email' => $row['email'],
            'website' => $row['website'],
            'telephone' => $row['telephone']];
    }

    $stmt->close();
}
