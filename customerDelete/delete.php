<!-- 
Page: delete.php
Name: Aaron Doyle
StudentID: C00272515
Date: 17/3/23
Purpose: This is the code that is used to check if the user has an active prescription in the database and if they dont it will activate the deleted column in the database which will stop them showing up on the system
-->
<?php 
    session_start();
?>
<br><br>
<?php

    include '../assets/php/db_connection.php';
	
    $customerId = $_POST['delID'];

    $sql = "SELECT * FROM Prescription WHERE customerID = '$customerId'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "This customer has a current prescription and cannot be deleted.";
    } 
	//This if statement is using the sql statement above and checking if that users id exists in the prescription table and will not 	   delete the user if they do exist in that table, if not then it will proceed to delete the user as normal
	else {
    $sql = "UPDATE Customer SET deleted = 1 WHERE customerID = '$_POST[delID]'";
	//This line of code is setting the deleted column in the table to 1 instead of zero which will not show their information in any of the other screens on the system

    if(! mysqli_query($conn, $sql)){
        echo "Error ". mysqli_error($conn);
    }

    $_SESSION["customerID"] = $_POST['delID'];
    $_SESSION["firstName"] = $_POST['delfirstName'];
    $_SESSION["lastName"] = $_POST['delsecondName'];
    $_SESSION["customerAddress"] = $_POST['delcustomerAddress'];
    $_SESSION["dob"] = $_POST['deldob'];
    $_SESSION["telephoneNumber"] = $_POST['deltelephoneNumber'];
		
	echo "Record deleted for ".$_POST['delfirstName']. " ". $_POST['delsecondName'];
	}

    mysqli_close($conn);

?>
<form action="custDelete.php" method="post">

<input type="submit" value="Return To Previous Screen">
</form>