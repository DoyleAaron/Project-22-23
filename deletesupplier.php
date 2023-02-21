<?php
include_once('includes/dbh.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="css/deletesupplier.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="js/date.js" defer></script>
    <script src="js/deletesupplier.js" defer></script>
</head>
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
        <form name="form" action="includes/deletesupplier.inc.php" method="post">
            <h1>Delete Supplier</h1>
            <div class="group">
                <label for="suppliers">Supplier </label>
                <?php
                $sql = "SELECT supplierID, supplierName FROM suppliers WHERE deleted = 0;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    echo '<select name="suppliers" id="suppliers">';
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['supplierID'] . "'>" . $row['supplierName'] . "</option>";
                    }
                } else {
                    echo '<select name="suppliers" id="suppliers" disabled>';
                    echo "<option value=''>No suppliers found</option>";
                }
                echo '</select>';
                ?>
            </div>
            <button type="button" id="delete" name="delete" onclick="submitForm()">Delete</button>
            <?php

            if (isset($_GET['error'])) {
                if ($_GET['error'] == "success") {
                    echo "<p class='success'>Supplier deleted successfully!</p>";
                } else if ($_GET['error'] == "unknownSupplier") {
                    echo "<p class='error'>Supplier not found.</p>";
                }
            }

            ?>
        </form>
    </main>
</div>
</body>
</html>