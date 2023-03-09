<?php
include '../assets/php/db_connection.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amenddob']));

$sql = "UPDATE Customer SET firstName = '$_POST[amendfirstName]',
        secondName = '$_POST[amendsecondName]',
        customerAddress = '$_POST[amendcustomerAddress]',
        dob = '$dbDate',
        telephoneNumber = '$_POST[amendtelephoneNumber]',
        PPSN = '$_POST[amendPPSN]' WHERE customerID = '$_POST[amendcustomerID]'";
     
if(! mysqli_query($conn, $sql)){
    echo "Error ".mysqli_error($conn);
} else{
    if(mysqli_affected_rows($conn) !=0){
        echo "The records for <br> ". $_POST['amendfirstName']. " " . $_POST['amendsecondName'] . " has been updated";
    } else{
        echo "No records were changed";
    }

}
mysqli_close($conn);
?>
<form action="AmendCustomer.html.php" method="post">

<input type="submit" value="Return to Previous Screen">
</form>