<!--

Name of screen: amendview.php
Purpose of screen: Amend or view a supplier from the database.
Student ID: C00274246
Student Name: Jack Foley
Date written: February 2023

-->

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
    <link rel="stylesheet" href="css/amendview.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <script src="js/date.js" defer></script>
    <script src="js/amendview.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
        <form name="form" action="includes/amendview.inc.php" method="post" class="info-wrapper">
            <div class="title">
                <h1>Amend Supplier</h1>
            </div>
            <div class="info">
                <label for="select">Supplier </label>
                <select name="select" id="select" onchange="change()">
                    <?php

                    $stmt = $conn->prepare("SELECT * FROM suppliers WHERE deleted = 0");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $id = $row['supplierID'];
                        $name = $row['supplierName'];
                        $address = $row['address'];
                        $email = $row['email'];
                        $website = $row['website'];
                        $telephone = $row['telephone'];
                        $infoString = $id . "|" . $name . "|" . $address . "|" . $email . "|" . $website . "|" . $telephone;
                        echo "<option value=\"$infoString\">$name</option>";
                    }

                    ?>
                </select>
            </div>

            <div class="info">
                <label for="id">ID </label>
                <input type="text" name="id" id="id" disabled required>
            </div>

            <div class="info">
                <label for="name">Name </label>
                <input type="text" name="name" id="name" disabled required>
            </div>

            <div class="info">
                <label for="address">Address </label>
                <input type="text" name="address" id="address" disabled required>
            </div>

            <div class="info">
                <label for="email">Email </label>
                <input type="email" name="email" id="email" disabled required>
            </div>

            <div class="info">
                <label for="website">Website </label>
                <input type="url" name="website" id="website" disabled required>
            </div>

            <div class="info">
                <label for="telephone">Telephone </label>
                <input type="text" name="telephone" id="telephone" pattern="\d{9,12}" disabled required>
            </div>

            <div class="buttons">
                <div class="amend-buttons">
                    <button id="amend" type="button" onclick="toggle()">Amend</button>
                    <button id="save" type="button" onclick="confirmSave()">Save Changes</button>
                    <button id="hidden" type="submit"></button>
                </div>
            </div>

            <div class="err">
                <?php
                if (isset($_GET['amend'])) {
                    if ($_GET['amend'] == "success") {
                        echo "<p class='success'>Amend successful</p>";
                    } else if ($_GET['amend'] == "failed") {
                        echo "<p class='fail'>Amend failed</p>";
                    }
                }
                ?>
            </div>
        </form>
    </main>
</div>
</body>
</html>