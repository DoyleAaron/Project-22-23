<!-- 
Page: editCustomer.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen that the user will see when they click on the Amend Customer Details option in the menu and it allows the user to update information about the user on the database
-->
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
    }
	 //This function is connecting to the listbox file and is being used to populate the form so the user can select their desired 	        customer 

    function toggleLock(){
        if(document.getElementById("amendViewbutton").value == "Amend Details"){
            document.getElementById("amendfirstName").disabled = false;
            document.getElementById("amendsecondName").disabled = false;
            document.getElementById("amendcustomerAddress").disabled = false;
            document.getElementById("amenddob").disabled = false;
            document.getElementById("amendtelephoneNumber").disabled = false; 
            document.getElementById("amendViewbutton").value = "View Details"; 
        	}else{
            document.getElementById("amendfirstName").disabled = true;
            document.getElementById("amendsecondName").disabled = true; 
            document.getElementById("amendcustomerAddress").disabled = true;
            document.getElementById("amenddob").disabled = true;
            document.getElementById("amendtelephoneNumber").disabled = true; 
            document.getElementById("amendViewbutton").value = "Amend Details"; 
        }
    }
	//This function is using a button to enable and disable the editing of customer information
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
            return true;
        } else{
            populate();
            toggleLock();
            return false;
        }
    }
	// This function is a pop up that will occur when the user clicks submit just to make sure they meant to click it
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
	<link rel="stylesheet" href="AmendView.css">
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
           <a href="#">Drugs</a>
            <a href="#">Stock Control</a>
            <a href="#">Doctor</a>
            <a href="../Menu/AaronsMenu.html" class="selected">Customer</a>
            <a href="#">Supplier</a>
        </div>
        <main>
            <div class="amendcustbox">
            <h2 align= "center">Amend or View Customer</h2>
            <?php include 'listbox.php'; ?>
                <input type="button" class="buttoncss" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
				
                <form name="myForm" action="AmendCustomer.php" align= "center"onsubmit="return confirmCheck()" method="post">

                <div class="inputbox">
					<label for="amendcustomerID" >Customer Id</label>
					<input type = "number" name = "amendcustomerID" id = "amendcustomerID" placeholder="Customer ID" disabled>
                </div>
					
                 <div class="inputbox">
                    <label for="amendfirstName">First Name</label>
                    <input type="text" name="amendfirstName" id="amendfirstName" placeholder="First Name" pattern="^[A-Za-z]+$" title="First Name must be only letters
                     and less than 20 characters" maxlength="20" required>
                 </div>
        
                <div class="inputbox">
                    <label for="amendsecondName">Surname</label>
                    <input type="text" name="amendsecondName" id="amendsecondName" placeholder="Surname" pattern="[A-Za-z]+$" title="Surname must be only 
                    letters and less than 20 characters" maxlength="20" required>
                </div>
        
                <div class="inputbox">
                    <label for="amenddob">Date Of Birth</label>
                    <input type="date" name="amenddob" id="amenddob" placeholder="Date Of Birth" min='1900-01-01' max='2023-03-29' required>
                </div>

                <div class="inputbox">
                    <label for="amendcustomerAddress">Address</label>
                    <input type="text" name="amendcustomerAddress" id="amendcustomerAddress" placeholder="Address" pattern="^[A-Za-z0-9\s]+$" title="Address must only
                     conatin letters and numbers" required >
                </div>

                <div class="inputbox">
                    <label for="amendtelephoneNumber">Phone Number  </label>
                    <input type="text" name="amendtelephoneNumber" id="amendtelephoneNumber" placeholder="Phone Number" pattern="^[0-9\s]+$" title="Phone Number must
                     only contain numbers and spaces with a max of 12 characters" maxlength="12" required 					   >	   
                </div>
                
                <input type="submit" class = "buttoncss" value="Save Changes">
        	</form>
         </div>
      </main>
  </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>
