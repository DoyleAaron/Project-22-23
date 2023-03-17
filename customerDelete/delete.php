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
    } else {


    $sql = "UPDATE Customer SET deleted = 1 WHERE customerID = '$_POST[delID]'";

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