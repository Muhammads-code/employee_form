<?php

include 'db_connection.php';



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_id = $_POST['user_id'];
    $s_name = $_POST['name'];
    $email = $_POST['email'];
    
    // $update_sql = "UPDATE `users` SET `name`='$s_name',`f_name`='$f_name',`email`='$email',`password`='$password',`dob`='$dob',`gender`='$gender' WHERE id = $user_id";
    $update_sql = "UPDATE `employees` SET `name`='$s_name',`email`='$email' WHERE id = $user_id";
    $connection->query($update_sql);

    header('location: mySqlPHP.php');
}