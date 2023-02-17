<?php

include '../assets/php/db_connection.php';

/*
supplierName varchar 30
address varchar 255
email varchar 30
website varchar 30
telephone int 11
deleted int 1
*/

// getting all information from form post

// if the form is not submitted
$success = false;

if (isset($_POST['supplierName']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['website']) && isset($_POST['telephone'])) {

    $supplierName = $_POST['supplierName'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $telephone = $_POST['telephone'];

// selecting everything from suppliers for getting last row
    $sql = "SELECT MAX(supplierID) AS supplierID FROM suppliers";

// getting the result
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

// Get the last supplierID
    $row = mysqli_fetch_array($result);

// Add 1 to the last supplierID
    $new_id = $row['supplierID'] + 1;

// Sanitize the data - prevent SQL injection
    $supplierName = mysqli_real_escape_string($conn, $supplierName);
    $address = mysqli_real_escape_string($conn, $address);
    $email = mysqli_real_escape_string($conn, $email);
    $website = mysqli_real_escape_string($conn, $website);
    $telephone = mysqli_real_escape_string($conn, $telephone);

// insert
    $sql = "INSERT INTO suppliers (supplierID, supplierName, address, email, website, telephone, deleted) VALUES ('$new_id', '$supplierName', '$address', '$email', '$website', '$telephone', '0')";

    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    if (mysqli_error($conn)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } else {
        $success = true;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="../assets/css/add_suppliers.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
            href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
            rel="stylesheet">
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
        <a href="./suppliers.html" class="selected">Supplier</a>
    </div>
    <main>
                <span>
                    <?php
                    if ($success) {
                        echo '<script>
                            const success = "Supplier added successfully.";
                            const span = document.querySelector("main span");
                            
                            // set span text to success
                            span.innerHTML = success;
                        </script>';
                    } else {
                        echo '
                            <script>
                                const span = document.querySelector("main span");
                                span.innerHTML = "";
                                span.style.display = "none";
                            </script>
                            ';
                    }
                    ?>
                </span>
        <div class="form-container">
            <div class="title">
                <h1>Add Supplier</h1>
            </div>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" name="form">
                <div class="input-container">
                    <label for="supplierName">Name</label>
                    <input type="text" name="supplierName"
                           pattern="^[a-zA-Z0-9\s,'.\-!]+$"
                           maxlength="30"
                           title="Only letters, numbers, spaces, commas, apostrophes, hyphens and exclamation marks are allowed."
                           required>
                </div>
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="text" name="email"
                           pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
                           maxlength="30"
                           title="Please enter a valid email address."
                           required>
                </div>
                <div class="input-container">
                    <label for="address">Address</label>
                    <input type="text" name="address"
                           pattern="^[a-zA-Z0-9\s,'.\-!]+$"
                           maxlength="255"
                           title="Only letters, numbers, spaces, commas, apostrophes, hyphens and exclamation marks are allowed."
                           required>
                </div>
                <div class="input-container">
                    <label for="website">Website</label>
                    <input type="text" name="website"
                           pattern="^[a-zA-Z0-9\-]+.[a-zA-Z]{2,4}$"
                           maxlength="30"
                           title="Please enter a valid website address."
                           required>
                </div>
                <div class="input-container">
                    <label for="telephone">Phone</label>
                    <input type="text" name="telephone"
                           pattern="^\[[0-9]{2,3}\]\s[0-9]{7,10}$|^\([0-9]{2,3}\)\s[0-9]{7,10}$|^[0-9]{9,13}$|^\+[0-9]{3,4}[0-9]{9,13}$|[0-9]{2,3}\-[0-9]{3,4}\-[0-9]{4,6}"
                           maxlength="15"
                           title="Please enter a valid phone number. Example: 0771234567, (01) 1234567, +94771234567, 085-123-1234"
                           required>
                </div>
                <div class="final">
                    <button class="left" onclick="validate()">Submit</button>
                    <input class="right" type="reset" value="Reset">
                </div>
            </form>
        </div>
    </main>
</div>
</body>
<script src="../assets/js/date.js"></script>
<script>

    function logout() {
        let result = confirm("Are you sure you want to logout?");

        if (result) {
            window.location.href = "index.html";
            return;
        }

        return false;
    }

    function validate() {
        let result = confirm("Are you sure you want to add this supplier?");

        if (result) {
            document.form.submit();
            return;
        }

        return false;
    }
</script>
</html>