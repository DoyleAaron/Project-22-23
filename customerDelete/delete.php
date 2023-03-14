<?php 
    session_start();
?>
<br><br>
<?php

    include '../assets/php/db_connection.php';

    $sql = "UPDATE Customer SET deleted = true WHERE customerID = '$_POST[delID]'";

    if(! mysqli_query($con, $sql)){
        echo "Error ". mysqli_error($con);
    }

    $_SESSION["customerID"] = $_POST['delID'];
    $_SESSION["firstName"] = $_POST['delfirstName'];
    $_SESSION["lastName"] = $_POST['delsecondName'];
    $_SESSION["customerAddress"] = $_POST['delcustomerAddress'];
    $_SESSION["dob"] = $_POST['deldob'];
    $_SESSION["telephoneNumber"] = $_POST['deltelephoneNumber'];
    $_SESSION["PPSN"] = $_POST['delPPSN'];

    mysqli_close($con);

?>

<script>
    window.location = "custDelete.php"
</script>