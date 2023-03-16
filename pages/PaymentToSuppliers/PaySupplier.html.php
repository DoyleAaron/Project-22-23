<?php
include '../../assets/php/db_connection.php';
?>

<!-- 
    Icons obtained from https://remixicon.com/ and https://fonts.google.com/icons 
 -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy</title>
        <link rel="stylesheet" href="../../assets/css/template.css">
        <link rel="stylesheet" href="../../assets/css/PaymentToSupplier.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <script defer>
            function populate() {
                var listbox = document.getElementById("listbox");
                var result = listbox.options[listbox.selectedIndex].value;
                var supplierDetails = result.split('|');
                document.getElementById("SupId").value = supplierDetails[0];
                document.getElementById("SupName").value = supplierDetails[1];
                document.getElementById("SupAddress").value = supplierDetails[2];
            }
            function confirmCheck(){
                var response = confirm('Are you sure you want to pay this supplier? ');
                if(response){
                    document.getElementById("SupId").disabled = false;
                    document.getElementById("SupName").disabled = false;
                    document.getElementById("SupAddress").disabled = false;
                    return true;
                }
                else
                {
                    populate();
                    return false;
                }
            }
        </script>
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
            <a href="#">Supplier</a>
        </div>
        <main align = "center">
            <?php include 'listbox.php';?>
            <p id="display"></p>
            <form action="LetterToSupplier.html.php" method="post" onsubmit="return confirmCheck()">
                <p class = "input"><label for = "SupId">Supplier ID</label>
                    <input type = "text" name = "SupId" id = "SupId" placeholder= "Supplier ID" disabled>
                </p>
                <p class = "input"><label for = "SupName">Supplier Name</label>
                    <input type = "text" name = "SupName" id = "SupName" placeholder= "Supplier Name" autocomplete=off disabled/>
                </p>
                <p class = "input"><label for = "SupAddress">Supplier Address</label>
                    <input type = "text" name = "SupAddress" id = "SupAddress" placeholder= "Supplier Address" autocomplete=off disabled/>
                </p>
                <p>
                    <input class="button" type = "submit" value = "Process Payment"/>
                </p>
            </form>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>