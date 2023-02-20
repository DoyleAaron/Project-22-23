<?php

include_once '../assets/includes/verification.php';

if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="../assets/css/addsuppliers.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
            href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
            rel="stylesheet">
    <script src="../assets/js/addsupplier.js" defer></script>
    <script src="../assets/js/date.js" defer></script>
</head>
<body>
<div class="horizontal-nav">
    <span id="time"></span>
    <div class="logo-container">
        <i class="ri-capsule-line"></i>
        <span id="logo-title"> | BP</span>
    </div>
    <div class="account-container">
        <button onclick="logout()">
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
        <div class="form-container">
            <div class="title">
                <h1>Add Supplier</h1>
            </div>
            <form onsubmit="return confirm('Do you want to add this supplier?')"
                  action="../assets/includes/addsupplier.inc.php" method="post" name="form">
                <div class="input-container">
                    <label for="supplierName">Name</label>
                    <input type="text" name="supplierName"
                           title="Only letters, numbers, spaces, commas, apostrophes, hyphens and exclamation marks are allowed.">
                </div>
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="text" name="email"
                           title="Please enter a valid email address.">
                </div>
                <div class="input-container">
                    <label for="address">Address</label>
                    <input type="text" name="address"
                           title="Only letters, numbers, spaces, commas, apostrophes, hyphens and exclamation marks are allowed.">
                </div>
                <div class="input-container">
                    <label for="website">Website</label>
                    <input type="text" name="website"
                           title="Please enter a valid website address.">
                </div>
                <div class="input-container">
                    <label for="telephone">Phone</label>
                    <input type="text" name="telephone"
                           title="Please enter a valid phone number. Example: 0771234567, (01) 1234567, +94771234567, 085-123-1234">
                </div>
                <div class="final">
                    <button class="left" name="submit" type="submit">Submit</button>
                    <input class="right" type="reset" value="Reset">
                </div>
            </form>
            <div class="error-container">
                <?php
                check();
                ?>
            </div>
        </div>
    </main>
</div>
</body>
</html>