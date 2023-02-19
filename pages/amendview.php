<?php

include_once '../assets/includes/amendview.cache.php';

if (!isset($_SESSION)) {
    session_start();
    writeToSession();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="../assets/css/amendview.css">
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
        <a href="suppliers.php" class="selected">Supplier</a>
    </div>
    <main>
        <span>
            <?php
            if ($_SESSION['success']) {
                echo '<script>
                            const success = "Supplier modified successfully.";
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
        <div class="wrapper">
            <form action="../assets/includes/amendview.inc.php" method="post" class="info-wrapper">

                <div class="info">
                    <label for="suppliers">Supplier </label>
                    <select name="suppliers" id="suppliers" onchange="changed()" onload="initSelect()">
                        <?php

                        include_once '../assets/includes/dbh.inc.php';

                        $stmt = $conn->prepare("SELECT supplierID, supplierName FROM suppliers WHERE deleted = 0");
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<option value=''>No suppliers found</option>";
                            exit();
                        }

                        while ($row = $result->fetch_assoc()) {
                            $supplierName = $row['supplierName'];
                            $supplierId = $row['supplierID'];
                            echo "<option value='$supplierId'>$supplierName</option>";
                        }

                        $stmt->close();
                        ?>
                    </select>
                </div>

                <div class="info">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="<?php
                    if (isset($_SESSION['address'])) {
                        echo $_SESSION['address'];
                    } ?>">
                </div>

                <div class="info">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    } ?>">
                </div>

                <div class="info">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" value="<?php
                    if (isset($_SESSION['website'])) {
                        echo $_SESSION['website'];
                    } ?>">
                </div>

                <div class="info">
                    <label for="telephone">Phone</label>
                    <input type="text" name="telephone" id="telephone" value="<?php
                    if (isset($_SESSION['telephone'])) {
                        echo $_SESSION['telephone'];
                    } ?>">
                </div>
                <div class="buttons">
                    <div class="amend-buttons">
                        <button type="button" name="amend" id="buttonAmend" title="Enable Editing"
                                onclick="toggleEdit()">Enable Editing
                        </button>
                        <button type="submit" name="submit-amend" id="submitAmend">Submit Changes</button>
                    </div>
                    <button type="submit" name="view" id="buttonView">View</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
<script src="../assets/js/date.js"></script>

<script>

    // Variables
    let supplierId = document.getElementById("suppliers").value;

    let address = document.getElementById("address");
    let email = document.getElementById("email");
    let website = document.getElementById("website");
    let telephone = document.getElementById("telephone");

    let buttonAmend = document.getElementById("buttonAmend");
    let submitAmend = document.getElementById("submitAmend");

    // Initialisation
    address.disabled = true;
    email.disabled = true;
    website.disabled = true;
    telephone.disabled = true;
    buttonAmend.innerHTML = "Enable Editing";
    submitAmend.style.display = "none";

    function initSelect() {
        cache();

        let id = 1;
        let address = localStorage.getItem(id + "-address");
        let email = localStorage.getItem(id + "-email");
        let website = localStorage.getItem(id + "-website");
        let telephone = localStorage.getItem(id + "-telephone");

        document.getElementById("address").value = address;
        document.getElementById("email").value = email;
        document.getElementById("website").value = website;
        document.getElementById("telephone").value = telephone;
    }


    function cache() {
        // This PHP script is used to store the supplier's details in local storage
        // This greatly improves performance as it means the database doesn't have to be queried every time the supplier is changed.
        // It is also safe because all SQL queries are done server sided and not hard coded into the JS.
        <?php
        echo '
        for (let i = 0; i < document.getElementById("suppliers").options.length; i++) {
            
        }
        
        for (let i = 0; i < document.getElementById("suppliers").options.length; i++) {
                if (document.getElementById("suppliers").options[i].value === ' . $_SESSION['supplierID'] . ') {
                    localStorage.setItem("' . $_SESSION['supplierID'] . '-address", "' . $_SESSION['supplierID']['address'] . '");
                    localStorage.setItem("' . $_SESSION['supplierID'] . '-email", "' . $_SESSION['supplierID']['email'] . '");
                    localStorage.setItem("' . $_SESSION['supplierID'] . '-website", "' . $_SESSION['supplierID']['website'] . '");
                    localStorage.setItem("' . $_SESSION['supplierID'] . '-telephone", "' . $_SESSION['supplierID']['telephone'] . '");
                }
         }
            ';
        ?>
    }

    function toggleEdit() {
        if (address.disabled) {
            address.disabled = false;
            email.disabled = false;
            website.disabled = false;
            telephone.disabled = false;
            buttonAmend.innerHTML = "Disable Editing";
            submitAmend.style.display = "block";
        } else {
            address.disabled = true;
            email.disabled = true;
            website.disabled = true;
            telephone.disabled = true;
            buttonAmend.innerHTML = "Enable Editing";
            submitAmend.style.display = "none";
        }
    }

    function changed() {

        let id = document.getElementById("suppliers").value;
        let address = localStorage.getItem(id + "-address");
        let email = localStorage.getItem(id + "-email");
        let website = localStorage.getItem(id + "-website");
        let telephone = localStorage.getItem(id + "-telephone");

        document.getElementById("address").value = address;
        document.getElementById("email").value = email;
        document.getElementById("website").value = website;
        document.getElementById("telephone").value = telephone;

    }
</script>
</html>