<?php
include '../assets/php/db_connection.php';

date_default_timezone_set ("UTC");

$sql = "use BigPharma;";

if (!mysqli_query($conn, $sql) ){
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}

$sql = "SELECT MAX(doctorID) AS id FROM Doctor";

$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
}
$id = $id + 1;

$sql = "Insert into Doctor(doctorID, firstName, lastName, surgeryAddress, surgeryTelephone, mobileNumber, homeAddress, homeTelephone)
VALUES ($id, '$_POST[firstname]','$_POST[surname]','$_POST[surgAddress]','$_POST[surgPhone]','$_POST[phone]','$_POST[address]','$_POST[homePhone]')";

if (!mysqli_query($conn, $sql) ){ 
    die ("An Error in the SQL Query: " . mysqli_error($conn));
}



echo "<br>A record has been added for Dr. " . $_POST['surname'];

mysqli_close($conn) ;


?>

<form action = "AddDoctor.php" method = "post">
    <input type = "submit" value = "Return to previous page">
</form>