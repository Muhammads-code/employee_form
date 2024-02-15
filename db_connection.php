<?php

$server = 'localhost';
$db_name = 'second_try';
$username = 'root';
$password = '';

$connection = new mysqli($server, $username, $password, $db_name);

if ($connection->connect_error)
{
    echo 'Not Connected '.$connection->error;
    die();
}