<!--

Name of screen: reorder.php
Purpose of screen: Manually reorder stock from a supplier.
Student ID: C00274246
Student Name: Jack Foley
Date written: March 2023

-->

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

include_once 'includes/dbh.inc.php';
include_once 'includes/getsuppliers.php';

$suppliers = getSupplierOptions();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="css/reorder.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="js/date.js" defer></script>
    <script src="js/reorder.js" defer></script>
<body>
<div class="horizonal-nav">
    <span id="time"></span>
    <div class="logo-container">
        <i class="ri-capsule-line"></i>
        <span id="logo-title"> | BP</span>
    </div>
    <div class="account-container">
        <button>
            <span class="accountId">Logout</span>
        </button>
    </div>
</div>
<div class="main-container">
    <div class="vertical-nav">
        <a href="#">Drugs</a>
        <a href="#">Stock Control</a>
        <a href="#">Doctor</a>
        <a href="#">Customer</a>
        <a href="suppliers.php" class="selected">Supplier</a>
    </div>
    <main>
        <form name="form" action="includes/reorder.inc.php" method="post" class="info-wrapper" onsubmit="return confirm('Are you sure you want to reorder this supplier?')">
            <div class="title">
                <h1>Reorder</h1>
            </div>
            <div class="info">
                <label for="select">Supplier </label>
                <select name="select" id="select">
                    <?php
                    echo $suppliers;
                    ?>
                </select>
            </div>

            <div class="info">
                <label for="drug-select">Drug </label>
                <select name="drug-select" id="drug-select" onchange="pop()">
                </select>
            </div>

            <div class="info">
                <label for="id">ID </label>
                <input type="text" name="id" id="id" readonly>
            </div>

            <div class="info">
                <label for="brandName">Brand Name </label>
                <input type="text" name="brandName" id="brandName" readonly>
            </div>

            <div class="info">
                <label for="genName">Generic Name </label>
                <input type="text" name="genName" id="genName" readonly>
            </div>

            <div class="info">
                <label for="form">Form </label>
                <input type="text" name="form" id="form" readonly>
            </div>

            <div class="info">
                <label for="strength">Strength </label>
                <input type="url" name="strength" id="strength" readonly>
            </div>

            <div class="info">
                <label for="usage">Usage </label>
                <input type="text" name="usage" id="usage" readonly>
            </div>

            <div class="info">
                <label for="sideEffects">Side Effects </label>
                <input type="text" name="sideEffects" id="sideEffects" readonly>
            </div>

            <div class="in">
                <label for="amount">Reorder Amount </label>
                <input type="number" name="amount" id="amount" min="1" value="0" max="1000" required>
            </div>

            <input type="hidden" name="supplierID" id="supplierID">
            <input type="hidden" name="drugID" id="drugID">
            <input type="hidden" name="submitted">

            <div class="buttons">
                <button id="reorder" type="submit">Confirm Reorder</button>
            </div>

            <div class="err">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "none") {
                        echo "<p class='success'>Reorder successful</p>";
                    } else if ($_GET['error'] == "fail") {
                        echo "<p class='fail'>Reorder failed</p>";
                    } else if ($_GET['error'] == "bad-quantity") {
                        echo "<p class='fail'>Bad quantity!</p>";
                    }
                }
                ?>
            </div>
        </form>
    </main>
</div>
</body>
</html>