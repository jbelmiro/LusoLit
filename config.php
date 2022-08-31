<?php

$config = parse_ini_file('../config.ini');

//Create connection and select DB
 $conn = mysqli_connect($config['dbhost'], $config['username'], $config['password'], $config['dbname']);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}