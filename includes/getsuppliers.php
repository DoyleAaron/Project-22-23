<?php

include_once 'dbh.inc.php';

function getSupplierOptions()
{
    global $conn;
    $query = "SELECT * FROM suppliers WHERE deleted = 0";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $suppId = $row['supplierID'];
            $name = $row['supplierName'];
            $address = $row['address'];
            $email = $row['email'];
            $website = $row['website'];
            $telephone = $row['telephone'];
            $infoString = "$suppId|$name|$address|$email|$website|$telephone";
            $options .= "<option value=\"$infoString\">$name</option>";
        }
    } else {
        $options = '<option value="">No records found</option>';
    }

    return $options;
}