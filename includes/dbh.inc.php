<?php
$host = "localhost:3306";
$username = "root";
$password = "E=mcsquared3.1412pi";
$database = "college";

/**
 * Create connection
 */
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}