<?php
session_start();
include 'db_connection.php';



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['login_button']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $fetch_query = "SELECT * FROM employees WHERE name = '$name' AND email = '$email'";
        $result = $connection->query($fetch_query);

        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];

            header('location: ./mySqlPHP.php');
        }
        else
        {
            $_SESSION['error'] = 'Your Email or Password Invalid!!';
            header('location: employee');
        }

    }
    else
    {
        $s_name = $_POST['name'];
        $email = $_POST['email'];

        // $sql = "INSERT INTO `users` (`name`, `f_name`, `email`, `password`, `dob`, `gender`) VALUES ('$s_name', '$f_name', '$email', '$password', '$dob', '$gender')";
        $sql = "INSERT INTO `employees`(`name`, `email`) VALUES ('$s_name','$email')";
        $connection->query($sql);

        header('location: employee');

    }

}

// if ($_SERVER["REQUEST_METHOD"] == "GET")
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
   $mydeleteSql = "DELETE FROM employees WHERE id = $user_id";
    $connection->query($mydeleteSql);

    header('location: mySqlPHP.php');

}