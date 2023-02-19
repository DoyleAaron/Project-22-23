<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['success'])) {
    $_SESSION['success'] = false;
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
        <a href="suppliers.php" class="selected">Supplier</a>
    </div>
    <main>
        <span>
            <?php
            if ($_SESSION['success']) {
                echo '<script>
                            const success = "Supplier added successfully.";
                            const span = document.querySelector("main span");
                            
                            // set span text to success
                            span.innerHTML = success;
                            span.style.display = "block";
                            
                            setInterval(() => {
                                span.style.display = "none"
                            }, 5000);
                        </script>';
                $_SESSION['success'] = false;
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
            <form action="../assets/includes/addsupplier.inc.php" method="post" name="form">
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
                    <button class="left" name="submit" onclick="validate()">Submit</button>
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