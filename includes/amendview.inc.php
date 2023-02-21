<?php
include_once 'dbh.inc.php';
include_once 'addsupplier.functions.php';

if (!isset($_SESSION)) {
    session_start();
}

function view(): void
{
    global $conn;

    $stmt = $conn->prepare("SELECT supplierID, address, email, website, telephone FROM suppliers WHERE supplierID = ? AND deleted = 0");
    $stmt->bind_param("i", $_POST['suppliers']);
    $stmt->execute();

    $result = $stmt->get_result();

    if (!$result) {
        echo 'Error with result when fetching supplier details from view button';
        exit();
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['supplierID'] = $row['supplierID'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['website'] = $row['website'];
            $_SESSION['telephone'] = $row['telephone'];
        }
    } else {
        echo 'No rows found';
    }

    $stmt->close();
}

function amend(): void
{
    global $conn;

    $supplierID = $_POST['suppliers'];
    $address = $_POST['address'];
    $website = $_POST['website'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];


    if (empty($_POST['suppliers']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['website']) || empty($_POST['telephone'])) {
        header("Location: ../amendview.php?error=emptyinput");
        exit();
    }

    if (invalidAddress()) {
        header("Location: ../amendview.php?error=invalidaddress");
        exit();
    }

    if (invalidEmail()) {
        header("Location: ../amendview.php?error=invalidemail");
        exit();
    }

    if (invalidWebsite()) {
        header("Location: ../amendview.php?error=invalidwebsite");
        exit();
    }

    if (invalidTelephone()) {
        header("Location: ../amendview.php?error=invalidphone");
        exit();
    }

    $stmt = $conn->prepare("UPDATE suppliers SET address = ?, email = ?, website = ?, telephone = ? WHERE supplierID = ? AND deleted = 0");
    $stmt->bind_param("ssssi", $address, $email, $website, $telephone, $supplierID);
    $stmt->execute();

    $stmt->close();
}

if (isset($_POST['view'])) {
    view();
    header("Location: ../amendview.php");
    return;
}

if (isset($_POST['submit-amend'])) {
    amend();
    view();
    header("Location: ../amendview.php?error=none");
    return;
}