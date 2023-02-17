<?php 
//include '../assets/php/db_connection.php'; // including db connection for use
include 'C:\Users\Jack\Documents\College\Project-22-23\assets\php\db_connection.php';

$sql = "SELECT * FROM Suppliers WHERE deleted = 0";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="../assets/css/add_suppliers.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
            <a href="../pages/suppliers.html" class="selected">Supplier</a>
        </div>
        <main>
            <div class="title">
                <h1>Remove Supplier</h1>
            </div>
            <div class="form-container">
                <select name="suppliers" id="suppliers">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['supplierID'] . '">' . $row['supplierName'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>