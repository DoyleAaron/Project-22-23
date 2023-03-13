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
    <link rel="stylesheet" href="../assets/css/template.css">
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
        document.getElementsById("delid").value = personDetails[0];
        document.getElementsById("delfirstname").value = personDetails[1];
        document.getElementsById("dellastname").value = personDetails[2];
        document.getElementsById("deldob").value = personDetails[3]; 
    }
    function confirmCheck(){
        var response;
        response = confirm('Are you sure you want to delete this person?');
        if(repsonse){
        document.getElementsById("delid").disabled = false;
        document.getElementsById("delfirstname").disabled = false;
        document.getElementsById("dellastname").disabled = false;
        document.getElementsById("deldob").disabled = false; 
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

            <label for="delid">Person ID</label>
            <input type="text" name="delid" id="delid" disabled>
            <label for="delfirstname">First Name</label>
            <input type="text" name="delfirstname" id="delfirstname" disabled>
            <label for="dellastname">Last Name</label>
            <input type="text" name="dellastname" id="dellastname" disabled>
            <label for="delDOB">Date of Birth</label>
            <input type="text" name="delDOB" id="delDOB" title="format is dd-mm-yyyy" disabled>
            <br><br>
            <input type="submit" value="Delete the record">
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>