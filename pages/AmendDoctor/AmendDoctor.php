<?php 
    include '../../assets/php/db_connection.php';

    $sql = "UPDATE Doctor SET firstName = '$_POST[amendname]', 
    lastName = '$_POST[amendaddress]', 
    sugeryAddress = '$_POST[amendphone]', 
    sugeryTelephone = '$_POST[amendaverage]', 
    mobileNumber = '$_POST[amendyear]', 
    homeAddress = '$_POST[amendyear]',
    homeTelephone = '$_POST[amendcode]' WHERE doctorID = '$_POST[amendid]'";

    if(!mysqli_query($conn, $sql)){
        echo "Error in query " . mysqli_error($conn);
    }
    else{
        if(mysqli_affected_rows($conn) != 0){
            echo mysqli_affected_rows($conn) . " record(s) updated <br>";
            echo "Student ID " . $_POST['amendid'] . ", " . $_POST['amendname'] . ", "
            . ", " . $_POST['amendaddress']  . ", " . $_POST['amendphone']  . ", " . $_POST['amendaverage']
            . ", " . $dbDate  . ", " . $_POST['amendyear']  . ", " . $_POST['amendcode'] . 
            " has been updated. ";
        }
        else{
            echo "No records updated";
        }
    }
    mysqli_close($conn);

    ?>

    <form action = "AmendView.html.php" method = "post">
    <input type = "submit" value = "Return to previous page">
    </form>