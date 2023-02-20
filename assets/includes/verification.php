<?php

include_once('dbh.inc.php');

function emptyInputs(): bool
{
    $result = false;
    if (empty($_POST['supplierName']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['website']) || empty($_POST['telephone'])) {
        $result = true;
    }
    return $result;
}

function invalidEmail(): bool
{
    $result = false;
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}

function invalidTelephone(): bool
{
    $result = false;
    if (!preg_match("/^\[[0-9]{2,3}]\s[0-9]{7,10}$|^\([0-9]{2,3}\)\s[0-9]{7,10}$|^[0-9]{9,13}$|^\+[0-9]{3,4}[0-9]{9,13}$|^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4,6}$|^[0-9]{3}\s+[0-9]{3}\s+[0-9]{4}$/", $_POST['telephone'])) {
        $result = true;
    }
    return $result;
}

function invalidWebsite(): bool
{
    return !preg_match("/^[a-zA-Z0-9-]+[.][a-zA-Z]{2,4}$/", $_POST['website']);
}

function invalidName(): bool
{
    return !preg_match("/^[a-zA-Z0-9\s,'.\-!]+$/", $_POST['supplierName']);
}

function invalidAddress(): bool
{
    return !preg_match("/^[a-zA-Z0-9\s,'.\-!]+$/", $_POST['address']);
}

function check(): void
{
    if (isset($_GET['error'])) {
        $err = $_GET['error'];

        if ($err === "emptyinput") {
            echo '<p class="error">Please fill in all fields.</p>';
            return;
        }

        if ($err === "invalidname") {
            echo '<p class="error">Invalid name.</p>';
            return;
        }

        if ($err === "invalidaddress") {
            echo '<p class="error">Invalid address.</p>';
            return;
        }

        if ($err === "invalidemail") {
            echo '<p class="error">Invalid email address.</p>';
            return;
        }

        if ($err === "invalidwebsite") {
            echo '<p class="error">Invalid website address.</p>';
            return;
        }

        if ($err === "invalidphone") {
            echo '<p class="error">Invalid phone number.</p>';
            return;
        }

        if ($err === 'none') {
            echo '<p class="success">Updates have been saved!</p>';
        }
    }
}