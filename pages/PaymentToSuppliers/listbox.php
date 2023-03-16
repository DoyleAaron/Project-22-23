<?php
    include '../../assets/php/db_connection.php';

    $sql = ("SELECT * FROM Suppliers WHERE deleted = 0");

    if(!$result = mysqli_query($conn, $sql)){
        die("Error in query " . mysqli_error($conn));
    }

    echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

    while ($row = $result->fetch_assoc()) {
        $id = $row['supplierID'];
        $name = $row['supplierName'];
        $address = $row['address'];
        $email = $row['email'];
        $website = $row['website'];
        $telephone = $row['telephone'];
        $infoString = $id . "|" . $name . "|" . $address . "|" . $email . "|" . $website . "|" . $telephone;
        echo "<option value=\"$infoString\">$name</option>";
    }

    echo "</select>";
    mysqli_close($conn);
?>