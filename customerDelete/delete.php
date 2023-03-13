<?php 
    session_start();
?>
<br><br>
<?php

    include '../assets/php/db_connection.php';

    $sql = "UPDATE Customer SET deleted = true WHERE customerID = '$_POST[delid]'";

    if(! mysqli_query($con, $sql)){
        echo "Error ". mysqli_error($con);
    }

    $_SESSION["customerID"] = $_POST['delid'];
    $_SESSION["firstName"] = $_POST['delfirstname'];
    $_SESSION["lastName"] = $_POST['dellastname'];
    $_SESSION["customerAddress"] = $_POST['delcustaddress'];
    $_SESSION["dob"] = $_POST['deldob'];
    $_SESSION["telephoneNumber"] = $_POST['delphonenum'];
    $_SESSION["PPSN"] = $_POST['delppsn'];

    mysqli_close($con);

?>

<script>
    window.location = "custDelete.php"
</script>