<?php
include '../../assets/php/db_connection.php';
?>

<!-- 
    Icons obtained from https://remixicon.com/ and https://fonts.google.com/icons 
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="../../assets/css/template.css">
    <link rel="stylesheet" href="../../assets/css/PaymentToSupplier.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="horizonal-nav">
        <span id="time"></span>
            <div class="logo-container">
            <i class="ri-capsule-line"></i>
            <span id="logo-title"> | BP</span>
        </div>
        <div class="account-container">
            <button>
                <span class="accountId">Logout</span>
            </button>
        </div>
    </div>
    <div class="main-container">
        <div class="vertical-nav">
            <a href="#">Drugs</a>
            <a href="#">Stock Control</a>
            <a href="#">Doctor</a>
            <a href="#">Customer</a>
            <a href="#">Supplier</a>
        </div>
        <main>
            <br>
            <a href = "PaySupplier.html.php" class = "button" align = "left">Back</a>
            <div class = "letter">
                <div align="right">
                    Big Pharma,<br>
                    street,<br>
                    Co. Carlow<br>
                    <?php
                        $date = date('d-m-y');
                        echo $date;
                    ?>
                </div>
                <div>
                    <?php
                        $sql = "SELECT supplierName FROM Suppliers WHERE supplierID = '$_POST[SupId]'";

                        if(!$result = mysqli_query($conn, $sql)){
                            die("Error in query " . mysqli_error($conn));
                        }
                        while($row = mysqli_fetch_assoc($result)) {
                            echo $row["supplierName"];
                        }
                        $sql = "SELECT address FROM Suppliers WHERE supplierID = '$_POST[SupId]'";

                        if(!$result = mysqli_query($conn, $sql)){
                            die("Error in query " . mysqli_error($conn));
                        }
                        while($row = mysqli_fetch_assoc($result)) {
                            $address_parts = explode(", ", $row["address"]); // use explode to split address at every comma
                            foreach ($address_parts as $part) {              // https://www.w3schools.com/php/func_string_explode.asp
                                echo $part ."," . "<br>";
                            }
                        }
                        ?>  
                </div>   
                <br><br>Enclosed please find cheque for total amount in payment
                of the following invoices:<br><br>
                <div class = "grid-container">
                    <div class = "grid-container-child">
                        <b>Your invoive Reference</b><br>
                        <?php
                            $sql = "SELECT orderID FROM Orders WHERE supplierID = '$_POST[SupId]' AND paid = 0";

                            if(!$result = mysqli_query($conn, $sql)){
                                die("Error in query " . mysqli_error($conn));
                            }
                            while($row = mysqli_fetch_assoc($result)) {
                                echo $row["orderID"] . "<br>";
                            }

                        ?>
                        ----------
                        <br>
                        <b>Total Amount</b><br>
                    </div>
                    <div class = "grid-container-child">
                        <b>Amount</b><br>
                        <?php
                            $sql = "SELECT cost FROM Orders WHERE supplierID = '$_POST[SupId]' AND paid = 0";

                            if(!$result = mysqli_query($conn, $sql)){
                                die("Error in query " . mysqli_error($conn));
                            }
                            while($row = mysqli_fetch_assoc($result)) {
                                echo $row["cost"] . "<br>";
                            }
                        ?>
                        ----------
                        <br>
                        <b><?php
                                $sum = 0;
                                $sql = "SELECT cost FROM Orders WHERE supplierID = '$_POST[SupId]' AND paid = 0";

                                if(!$result = mysqli_query($conn, $sql)){
                                    die("Error in query " . mysqli_error($conn));
                                }
                                while($row = mysqli_fetch_assoc($result)) {
                                    $sum += $row["cost"];   // adds costs together
                                }
                                echo $sum;
                            ?></b>
                    </div>
                </div>
                <div>
                    Yours sincerely,
                    Pharmacist
                </div>
            </div>
            <?php
                $sql = "UPDATE Orders SET paid = 1 WHERE supplierID = '$_POST[SupId]'"; // set orders as paid
                if(!$result = mysqli_query($conn, $sql)){
                    die("Error in query " . mysqli_error($conn));
                }
            ?>
        </main>
    </div>
</body>
    <script src="../assets/js/date.js"></script>
</html>