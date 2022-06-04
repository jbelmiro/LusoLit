<?php
//Database details
$db_host = 'localhost';
$db_username = 'rock_db';
$db_password = '#&yI+%%v(QLEtb+,eR5tEDzX%)2%fFFJI%}blS@e4941K##Sz0t2u)YucQJ2c<J{';
$db_name = 'astro_rock';

//Create connection and select DB
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}