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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/addDoctor.css">
    <script defer>
    function confirmCheck(){
        var response = confirm('Are you sure you want to add doctor? ');
        if(response){
            return true;
        }
        else
        {
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
            <a href="#" class="selected">Doctor</a>
            <a href="#">Customer</a>
            <a href="#">Supplier</a>
        </div>
        <main>
            <h2 align = "center">Add a Doctor</h2>
            <form action="DoctorInsert.php" method="post" onsubmit="return confirmCheck()">
                <p class = "input"><label for = "firstname">First Name</label>
                    <input type = "text" name = "firstname" id = "firstname" placeholder= "First Name" autocomplete=off pattern="[a-zA-Z]+" maxlength="30" title="Must contain only letters" required/>
                </p>
                <p class = "input"><label for = "surname">Last Name</label>
                    <input type = "text" name = "surname" id = "surname" placeholder= "Last Name" autocomplete=off pattern="[a-zA-Z]+" maxlength="30" title="Must contain only letters" required/>
                </p>
                <p class = "input"><label for = "surgAddress">Surgery Address</Address></label>
                    <input type = "text" name = "surgAddress" id = "surgAddress" placeholder= "Surgery Address" autocomplete=off maxlength="100" size = "40" required/>
                </p>
                <p class = "input"><label for = "surgPhone">Surgery Phone Number</label>
                    <input type = "text" name = "surgPhone" id = "surgPhone" placeholder= "Surgery Number" autocomplete=off pattern="[\s0-9-()]+"  maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " required/>
                </p>
                <p class = "input"><label for = "phone">Mobile Number</label>
                    <input type = "text" name = "phone" id = "phone" placeholder= "Mobile Number" autocomplete=off pattern="[\s0-9-()]+"  maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen "  required/>
                </p>
                <p class = "input"><label for = "address">Home Address</Address></label>
                    <input type = "text" name = "address" id = "address" placeholder= "Home Address" autocomplete=off maxlength="100" size = "40" required/>
                </p>
                <p class = "input"><label for = "homePhone">Home Phone Number</label>
                    <input type = "text" name = "homePhone" id = "homePhone" placeholder= "Home Phone Number" autocomplete=off pattern="[\s0-9-()]+" maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " required/>
                </p>
                <p>
                    <input class="button" type = "submit" value = "Submit"/>
                    <br>
                    <input class="button" type = "reset" value = "Clear"/>
                </p>
            </form>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>