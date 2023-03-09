<?php
    session_start();
    include '../../assets/php/db_connection.php';

    $sql = "UPDATE Doctor SET deleted = true WHERE doctorID = '$_POST[DelId]'";

    if(!mysqli_query($conn, $sql)){
        echo "Error " . mysqli_error($conn);
    }

    $_SESSION["doctorID"] = $_POST["DelId"];
    $_SESSION["firstName"] = $_POST["DelFirstname"];
    $_SESSION["lastName"] = $_POST["DelSurname"];
    $_SESSION["surgeryAddress"] = $_POST["DelSurgAddress"];
    $_SESSION["surgeryTelephone"] = $_POST["DelSurgPhone"];
    $_SESSION["mobileTelephone"] = $_POST["DelPhone"];
    $_SESSION["homeAddress"] = $_POST["DelAddress"];
    $_SESSION["homeTelephone"] = $_POST["DelHomePhone"];

    mysqli_close($conn);

?>
<script>
    window.location = "DeleteDoctor.html.php"
</script>