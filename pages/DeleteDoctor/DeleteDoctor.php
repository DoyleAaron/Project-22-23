<?php
    session_start();
    include '../../assets/php/db_connection.php';

    $sql = "SELECT doctorID FROM Prescription WHERE doctorID = '$_POST[DelId]'";

    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        echo "Doctor has a perscription therefore can not be deleted.";
    }
    else{
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
    }
    
    mysqli_close($conn);
    
?>

<form action = "DeleteDoctor.html.php" method = "post">
    <br>
    <input type = "submit" value = "Return to previous page">
</form>