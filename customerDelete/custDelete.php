<?php
include '../assets/php/db_connection.php';
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
    <link rel="stylesheet" href="Delete.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<script>
    function populate(){
        var sel = document.getElementById("listbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var personDetails = result.split(',');
        document.getElementById("display").innerHTML = "The details of the selected person are: " + result;
        document.getElementsById("delID").value = personDetails[0];
        document.getElementsById("delfirstName").value = personDetails[1];
        document.getElementsById("delsecondName").value = personDetails[2];
        document.getElementsById("delcustomerAddress").value = personDetails[3];
        document.getElementsById("deldob").value = personDetails[4]; 
        document.getElementsById("deltelephoneNumber").value = personDetails[5];
        document.getElementsById("delPPSN").value = personDetails[6];  
    }
    function confirmCheck(){
        var response;
        response = confirm('Are you sure you want to delete this person?');
        if(repsonse){
        document.getElementsById("delID").disabled = false;
        document.getElementsById("delfirstName").disabled = false;
        document.getElementsById("delsecondName").disabled = false;
        document.getElementsById("delcustomerAddress").disabled = false; 
        document.getElementsById("deldob").disabled = false;
        document.getElementsById("deltelephoneNumber").disabled = false;
        document.getElementsById("delPPSN").disabled = false;  
        return true;
        } else{
            populate();
            return false;
        }
    }
</script>
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
            <a href="#" class="selected">Customer</a>
            <a href="#">Supplier</a>
        </div>
        <main>
        <h1>Delete A Person</h1>
        <h4>Please select a person and then click the delete button</h4>
        <form name="deleteForm" action="delete.php" onsubmit="return confirmCheck()" method="post">

            <label for="delid">Customer ID</label>
            <input type="text" name="delid" id="delid" disabled>

            <label for="delfirstName">First Name</label>
            <input type="text" name="delfirstName" id="delfirstName" disabled>

            <label for="delsecondName">Last Name</label>
            <input type="text" name="delsecondName" id="delsecondName" disabled>

            <label for="delcustomerAddress">Customer Address</label>
            <input type="text" name="delcustomerAddress" id="delcustomerAddress" disabled>

            <label for="deldob">Date of Birth</label>
            <input type="text" name="deldob" id="deldob" title="format is dd-mm-yyyy" disabled>

            <label for="deltelephoneNumber">Phone Number</label>
            <input type="text" name="deltelephoneNumber" id="deltelephoneNumber" disabled>

            <label for="delPPSN">PPSN</label>
            <input type="text" name="delPPSN" id="delPPSN" disabled>

            <br><br>
            <input type="submit" value="Delete the record">
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>