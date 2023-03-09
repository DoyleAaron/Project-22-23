<?php
include '../assets/php/db_connection.php';
?>

<!-- 
    Icons obtained from https://remixicon.com/ and https://fonts.google.com/icons 
 -->
 <script>
    function populate(){
        var sel = document.getElementById("listbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
        var customerDetails = result.split(',');
        document.getElementById("amendcustomerID").value = customerDetails[0]; 
        document.getElementById("amendfirstName").value = customerDetails[1];
        document.getElementById("amendsecondName").value = customerDetails[2];
        document.getElementById("amendcustomerAddress").value = customerDetails[3];
        document.getElementById("amenddob").value = customerDetails[4];
        document.getElementById("amendtelephoneNumber").value = customerDetails[5];
        document.getElementById("amendPPSN").value = customerDetails[6];
    }

    function toggleLock(){
        if(document.getElementById("amendViewbutton").value == "Amend Details"){
            document.getElementById("amendfirstName").disabled = false;
            document.getElementById("amendsecondName").disabled = false;
            document.getElementById("amendcustomerAddress").disabled = false;
            document.getElementById("amenddob").disabled = false;
            document.getElementById("amendtelephoneNumber").disabled = false; 
            document.getElementById("amendPPSN").disabled = false;
            document.getElementById("amendViewbutton").value = "View Details"; 
        }else{
            document.getElementById("amendfirstName").disabled = true;
            document.getElementById("amendsecondName").disabled = true; 
            document.getElementById("amendcustomerAddress").disabled = true;
            document.getElementById("amenddob").disabled = true;
            document.getElementById("amendtelephoneNumber").disabled = true; 
            document.getElementById("amendPPSN").disabled = true;
            document.getElementById("amendViewbutton").value = "Amend Details"; 
        }
    }
    function confirmCheck(){
        var response;
        response = confirm('Are you sure you want to save these changes?');
        if(response){
            document.getElementById("amendcustomerID").disabled = false;
            document.getElementById("amendfirstName").disabled = false;
            document.getElementById("amendsecondName").disabled = false;
            document.getElementById("amendcustomerAddress").disabled = false;
            document.getElementById("amenddob").disabled = false;
            document.getElementById("amendtelephoneNumber").disabled = false; 
            document.getElementById("amendPPSN").disabled = false;
            return true;
        } else{
            populate();
            toggleLock();
            return false;
        }
    }
</script>
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
            <a href="#" class="selected">Customer</a>
            <a href="#">Dispense Drugs</a>
            <a href="#">Stock Control</a>
            <a href="#">Supplier Accounts</a>
            <a href="#">File Maintenance</a>
            <a href="#">Reports</a>
        </div>
        <main>
            <h2>Amend or View Customer</h2>
            <?php
             include 'Listbox.php'; 
             ?>
            f<p id="Display"></p>
                <input type="button" class="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">

                <form name="myForm" action="AmendCustomer.php" onsubmit="return confirmCheck()" method="post">

                <label for "amendcutomerID">Customer Id</label>
                <input type = "number" name = "amendCustomerID" id = "amendCustomerID" placeholder="Customer ID" disabled>

                <label for "amendfirstName">First Name</label>
                <input type = "text" name = "amendfirstName" id = "amendfirstName" placeholder="First Name" required disabled>

                <label for "amendsecondName">Second Name</label>
                <input type = "text" name = "amendsecondName" id = "amendsecondName" placeholder="Second Name" required disabled>

                <label for "amendcustomerAddress">Customer Address</label>
                <input type = "text" name = "amendcustomerAddress" id = "amendcustomerAddress" placeholder="Customer Address" disabled>

                <label for "amenddob">Date Of Birth</label>
                <input type = "date" name = "amenddob" id = "amenddob" placeholder="Date Of Birth" title="format is dd-mm-yyyy" disabled>

                <label for "amendtelephoneNumber">Telephone Number</label>
                <input type = "number" name = "amendtelephoneNumber" id = "amendtelephoneNumber" placeholder="Telephone Number" pattern="[\s0-9-()]+" disabled>

                <label for "amendPPSN">PPSN Number</label>
                <input type = "number" name = "amendPPSN" id = "amendPPSN" placeholder="PPSN Number" pattern="^[0-9]{7}[A-Za-z]$" disabled>

                <input type="submit" class = "button" value="Save Changes">
        </form>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>