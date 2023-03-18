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

if (isset($_POST['submitted'])) {

    $supplierId = $_POST['supplierID'];
    $drugId = $_POST['drugID'];

    // The drug table has a supplierId column.
    // How can I select the drug name from the drug table where supplierId = $supplierId?
    $query = "SELECT * FROM drug WHERE supplierId = $supplierId AND deleted = 0";

}