<?php
$host = "localhost:3306";
$username = "root";
$password = "";
$database = "mydb";

/**
 * Create connection
 */
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}