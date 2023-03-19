<!--

Name of screen: suppliers.php
Purpose of screen: The main menu for the suppliers page.
Student ID: C00274246
Student Name: Jack Foley
Date written: February 2023

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="css/suppliers.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
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
        <a href="#" class="selected">Supplier</a>
    </div>
    <main>
        <div class="box-container">
            <a href="addsupplier.php">
                <div class="box">
                    <p>Add Supplier</p>
                </div>
            </a>
            <a href="amendview.php">
                <div class="box">
                    <p>Amend Supplier</p>
                </div>
            </a>
            <a href="deletesupplier.php">
                <div class="box">
                    <p>Delete Supplier</p>
                </div>
            </a>
            <a href="">
                <div class="box"></div>
            </a>
        </div>
    </main>
</div>
</body>
<script src="js/date.js"></script>
</html>