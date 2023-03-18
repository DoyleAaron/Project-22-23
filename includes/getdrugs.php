<?php

include_once 'dbh.inc.php';

if (isset($_GET['supplier_id'])) {
    $supplier_id = $_GET['supplier_id'];

    // Fetch records from the drugs table based on the supplier_id
    $sql = "SELECT * FROM drug WHERE supplierID = " . $supplier_id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $options = '';

    // If records are found, create option elements
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $alltext = $row["drugID"] . "|" . $row["brandName"] . "|" . $row["genericName"] . "|" . $row["form"] . "|" .
                $row['strength'] . "|" . $row["usageInstructions"] . "|" . $row["sideEffects"];
            $options .= '<option value="' . $alltext . '">' . $row["brandName"] . '</option>';
        }
    } else {
        $options = '<option value="">No records found</option>';
    }

    // Close the connection and output the options
    $conn->close();
    echo $options;
}