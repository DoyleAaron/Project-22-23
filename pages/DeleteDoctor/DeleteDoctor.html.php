<?php
include '../../assets/php/db_connection.php';
?>

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
        <link rel="stylesheet" href="../../assets/css/deleteDoctor.css">
        <script defer>
            function populate() {
            var listbox = document.getElementById("listbox");
            var result = listbox.options[listbox.selectedIndex].value;
            var doctorDetails = result.split('+ ');
            document.getElementById("DelId").value = doctorDetails[0];
            document.getElementById("DelFirstname").value = doctorDetails[1];
            document.getElementById("DelSurname").value = doctorDetails[2];
            document.getElementById("DelSurgAddress").value = doctorDetails[3];
            document.getElementById("DelSurgPhone").value = doctorDetails[4];
            document.getElementById("DelPhone").value = doctorDetails[5];
            document.getElementById("DelAddress").value = doctorDetails[6];
            document.getElementById("DelHomePhone").value = doctorDetails[7];
            }
            function confirmCheck(){
                var response = confirm('Are you sure you want to save changes? ');
                if(response){
                    document.getElementById("DelId").disabled = false;
                    document.getElementById("DelFirstname").disabled = false;
                    document.getElementById("DelSurname").disabled = false;
                    document.getElementById("DelSurgAddress").disabled = false;
                    document.getElementById("DelSurgPhone").disabled = false;
                    document.getElementById("DelPhone").disabled = false;
                    document.getElementById("DelAddress").disabled = false;
                    document.getElementById("DelHomePhone").disabled = false;
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
                <a href="#" class="selected">Doctor</a>
                <a href="#">Customer</a>
                <a href="#">Supplier</a>
            </div>
            <main align = "center">
                <h2> Delete a Doctor </h2>
                Please select a doctor to delete
                <?php include 'listbox.php';?>

                <p id="display"></p>
                <br><br>
                <form action="DeleteDoctor.php" method="post" onsubmit="return confirmCheck()">
                    <p class = "input"><label for = "DelId">Doctor ID</label>
                        <input type = "text" name = "DelId" id = "DelId" placeholder= "Doctor ID" disabled>
                    </p>
                    <p class = "input"><label for = "DelFirstname">First Name</label>
                        <input type = "text" name = "DelFirstname" id = "DelFirstname" placeholder= "First Name" autocomplete=off pattern="[a-zA-Z]+" maxlength="30" title="Must contain only letters" disabled required/>
                    </p>
                    <p class = "input"><label for = "DelSurname">Last Name</label>
                        <input type = "text" name = "DelSurname" id = "DelSurname" placeholder= "Last Name" autocomplete=off pattern="[a-zA-Z]+" maxlength="30" title="Must contain only letters" disabled required/>
                    </p>
                    <p class = "input"><label for = "DelSurgAddress">Surgery Address</Address></label>
                        <input type = "text" name = "DelSurgAddress" id = "DelSurgAddress" placeholder= "Surgery Address" autocomplete=off maxlength="100" size = "40" disabled required/>
                    </p>
                    <p class = "input"><label for = "DelSurgPhone">Surgery Phone Number</label>
                        <input type = "text" name = "DelSurgPhone" id = "DelSurgPhone" placeholder= "Surgery Number" autocomplete=off pattern="[\s0-9-()]+"  maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " disabled required/>
                    </p>
                    <p class = "input"><label for = "DelPhone">Mobile Number</label>
                        <input type = "text" name = "DelPhone" id = "DelPhone" placeholder= "Mobile Number" autocomplete=off pattern="[\s0-9-()]+"  maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " disabled  required/>
                    </p>
                    <p class = "input"><label for = "DelAddress">Home Address</Address></label>
                        <input type = "text" name = "DelAddress" id = "DelAddress" placeholder= "Home Address" autocomplete=off maxlength="100" size = "40" disabled required/>
                    </p>
                    <p class = "input"><label for = "DelHomePhone">Home Phone Number</label>
                        <input type = "text" name = "DelHomePhone" id = "DelHomePhone" placeholder= "Home Phone Number" autocomplete=off pattern="[\s0-9-()]+" maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " disabled required/>
                    </p>
                    <p>
                        <input class="button" type = "submit" value = "Delete the record"/>
                    </p>
                </form>
                <?php
                if(ISSET($_SESSION["doctorID"])){
                    echo "<h1 class='myMessage'>Record deleted for " . 
                    $_SESSION["firstName"] . " " . $_SESSION["lastName"] . "</h1>";
                }
                ?>
            </main>
        </div>
    </body>
    <script src="../assets/js/date.js"></script>
</html>