<!-- 
Page: Customeradd.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the screen is seen by the user when they click on the add customer screen and it allows them to add a new customer to the database
-->
<?php
include '../assets/php/db_connection.php';
?>

<!-- 
    Icons obtained from https://remixicon.com/ and https://fonts.google.com/icons 
 -->

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CustomerAdd.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
	<script>
	function confirmation(){
        var answer = confirm('Would you like to upload this customer?');
        if(answer){
            return true;
        }
        else
        {
            return false;
        }
    } 
//This function is just used to confirm the upload of a new user to the database and stops accidental uploads
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
            <div class = "addcustbox">
            <H2 align ="center" font="open sans">Add Customer</H2>
            <form action="CustomerUpload.php" method="post" align="center" onsubmit= "return confirmation()">
				
                <div class="inputbox">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" placeholder="First Name" pattern="^[A-Za-z]+$" title="First Name must be only
                     letters and less than 20 characters" maxlength="20" required>
                </div>
        
                <div class="inputbox">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="surname" placeholder="Surname" pattern="[A-Za-z]+$" title="Surname must be only 
                    letters and less than 20 characters" maxlength="20" required>
                </div>
        
                <div class="inputbox">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" name="dob" id="dob" placeholder="Date Of Birth" min='1900-01-01' max='2023-03-29' required>
                </div>

                <div class="inputbox">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Address" pattern="^[A-Za-z0-9\s]+$" title="Address must only conatin letters
                     and numbers" required >
                </div>

                <div class="inputbox">
                    <label for="phonenum">Phone Number  </label>
                    <input type="text" name="phonenum" id="phonenum" placeholder="Phone Number" pattern="^[0-9\s]+$" title="Phone Number must only contain numbers 
                    and spaces with a max of 12 characters" maxlength="12" required >
                </div>
                
                <div class="buttons">
                    <input type="reset" class="buttoncss" value="Clear Form" name="reset">
                    <input type="submit" class="buttoncss"  value="Send Form" name="submit">
				</div>   
            </form>
				<a href="../Menu/AaronsMenu.html" class="homeMenu">Return To Menu</a>
          	</div>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>