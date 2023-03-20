<!-- 
Page: custDelete.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is seen by the user when they click on the delete customer screen and it allows them to delete a customer from the database as long as they dont have an active prescription
-->
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
        var customerDetails = result.split(',');
        document.getElementById("delID").value = customerDetails[0];
        document.getElementById("delfirstName").value = customerDetails[1];
        document.getElementById("delsecondName").value = customerDetails[2];
        document.getElementById("delcustomerAddress").value = customerDetails[3];
        document.getElementById("deldob").value = customerDetails[4]; 
        document.getElementById("deltelephoneNumber").value = customerDetails[5];
    }
	// This function is used to populate the form so that the user can select a customer to delete
    function confirmCheck(){
        var response;
        response = confirm('Are you sure you want to delete this person?');
        if(response){
        document.getElementById("delID").disabled = false;
        document.getElementById("delfirstName").disabled = false;
        document.getElementById("delsecondName").disabled = false;
        document.getElementById("delcustomerAddress").disabled = false; 
        document.getElementById("deldob").disabled = false;
        document.getElementById("deltelephoneNumber").disabled = false;
        return true;
        } else{
            populate();
            return false;
        }
    }
	// This function is a pop up that will occur when the user clicks submit just to make sure they meant to click it
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
			<div class="form-container">
        <h1 align="center">Delete A Customer</h1>
        <h4 align="center">Please select a customer and then click the delete button</h4>
		<?php include 'listbox.php'; ?>
        <form name="deleteForm" action="delete.php" onsubmit="return confirmCheck()" method="post">

			<div class="inputbox">
				<label for="delID">Customer ID</label>
				<input type="text" name="delID" id="delID" disabled>
			</div>

			<div class="inputbox">
				<label for="delfirstName">First Name</label>
				<input type="text" name="delfirstName" id="delfirstName" disabled>
			</div>

			<div class="inputbox">
				<label for="delsecondName">Last Name</label>
				<input type="text" name="delsecondName" id="delsecondName" disabled>
			</div>

			<div class="inputbox">
				<label for="delcustomerAddress">Customer Address</label>
				<input type="text" name="delcustomerAddress" id="delcustomerAddress" disabled>
			</div>

			<div class="inputbox">
				<label for="deldob">Date of Birth</label>
				<input type="text" name="deldob" id="deldob" title="format is dd-mm-yyyy" disabled>
			</div>

			<div class="inputbox">
				<label for="deltelephoneNumber">Phone Number</label>
				<input type="text" name="deltelephoneNumber" id="deltelephoneNumber" disabled>
			</div>
			<br>
			
            <input type="submit" value="Delete the record" class ="buttoncss" align="center">
			
			</form>
			</div>
        </main>
    </div>
</body>
	
    <script src="../assets/js/date.js"></script>
</html>