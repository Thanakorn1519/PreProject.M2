<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "account_db";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// Check connection
