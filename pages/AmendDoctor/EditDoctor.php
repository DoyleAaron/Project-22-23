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
        <link rel="stylesheet" href="../../assets/css/amendDoctor.css">
        <script defer>
            function populate() {
            var listbox = document.getElementById("listbox");
            var result = listbox.options[listbox.selectedIndex].value;
            var doctorDetails = result.split(', ');
            document.getElementById("display").innerHTML = "The details of the selected doctor are " + result;
            document.getElementById("amendid").value = doctorDetails[0];
            document.getElementById("amendFirstname").value = doctorDetails[1];
            document.getElementById("amendSurname").value = doctorDetails[2];
            document.getElementById("amendSurgAddress").value = doctorDetails[3];
            document.getElementById("amendSurgPhone").value = doctorDetails[4];
            document.getElementById("amendPhone").value = doctorDetails[5];
            document.getElementById("amendAddress").value = doctorDetails[6];
            document.getElementById("amendcode").value = doctorDetails[7];
            }

            function toggleLock(){
                if(document.getElementById("amendViewButton").value == "Amend Details"){
                    document.getElementById("amendFirstname").disabled = false;
                    document.getElementById("amendSurname").disabled = false;
                    document.getElementById("amendSurgAddress").disabled = false;
                    document.getElementById("amendSurgPhone").disabled = false;
                    document.getElementById("amendPhone").disabled = false;
                    document.getElementById("amendAddress").disabled = false;
                    document.getElementById("amendHomePhone").disabled = false;
                    document.getElementById("amendViewButton").value = "View Details";
                }   
                else
                {
                    document.getElementById("amendFirstname").disabled = true;
                    document.getElementById("amendSurname").disabled = true;
                    document.getElementById("amendSurgAddress").disabled = true;
                    document.getElementById("amendSurgPhone").disabled = true;
                    document.getElementById("amendPhone").disabled = true;
                    document.getElementById("amendAddress").disabled = true;
                    document.getElementById("amendHomePhone").disabled = true;
                    document.getElementById("amendViewButton").value = "Amend Details";
                }
            }
            function confirmCheck(){
                var response = confirm('Are you sure you want to save changes? ');
                if(response){
                    document.getElementById("amendid").disabled = false;
                    document.getElementById("amendFirstname").disabled = false;
                    document.getElementById("amendSurname").disabled = false;
                    document.getElementById("amendSurgAddress").disabled = false;
                    document.getElementById("amendSurgPhone").disabled = false;
                    document.getElementById("amendPhone").disabled = false;
                    document.getElementById("amendAddress").disabled = false;
                    document.getElementById("amendHomePhone").disabled = false;
                    return true;
                }
                else
                {
                    populate();
                    toggleLock();
                    return false;
                }
            } 

        </script>
    </head>
    <body>
        <h1> Amend/view a Doctor </h1>
        Please select a doctor to view and edit
        <?php include 'listbox.php';?>

        <p id="display"></p>
        <input type = "button" value = "Amend Details" id = "amendViewButton" onclick = "toggleLock()">

        <form action="AmendDoctor.php" method="post" onsubmit="return confirmCheck()">
                <p class = "input"><label for = "amendFirstname">First Name</label>
                    <input type = "text" name = "amendFirstname" id = "amendFirstname" placeholder= "First Name" autocomplete=off pattern="[a-zA-Z]+" maxlength="30" title="Must contain only letters" required/>
                </p>
                <p class = "input"><label for = "amendSurname">Last Name</label>
                    <input type = "text" name = "amendSurname" id = "amendSurname" placeholder= "Last Name" autocomplete=off pattern="[a-zA-Z]+" maxlength="30" title="Must contain only letters" required/>
                </p>
                <p class = "input"><label for = "amendSurgAddress">Surgery Address</Address></label>
                    <input type = "text" name = "amendSurgAddress" id = "amendSurgAddress" placeholder= "Surgery Address" autocomplete=off maxlength="100" size = "40" required/>
                </p>
                <p class = "input"><label for = "amendSurgPhone">Surgery Phone Number</label>
                    <input type = "text" name = "amendSurgPhone" id = "amendSurgPhone" placeholder= "Surgery Number" autocomplete=off pattern="[\s0-9-()]+"  maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " required/>
                </p>
                <p class = "input"><label for = "amendPhone">Mobile Number</label>
                    <input type = "text" name = "amendPhone" id = "amendPhone" placeholder= "Mobile Number" autocomplete=off pattern="[\s0-9-()]+"  maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen "  required/>
                </p>
                <p class = "input"><label for = "amendAddress">Home Address</Address></label>
                    <input type = "text" name = "amendAddress" id = "amendAddress" placeholder= "Home Address" autocomplete=off maxlength="100" size = "40" required/>
                </p>
                <p class = "input"><label for = "amendHomePhone">Home Phone Number</label>
                    <input type = "text" name = "amendHomePhone" id = "amendHomePhone" placeholder= "Home Phone Number" autocomplete=off pattern="[\s0-9-()]+" maxlength="15" title="Must contain numbers and can contain brackets, spaces and hyphen " required/>
                </p>
                <p>
                    <input class="button" type = "submit" value = "Submit"/>
                </p>
            </form>

    </body>
</html>