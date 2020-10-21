<?php

    session_start();
    require_once 'connect.php';

    $connect = mysqli_connect('localhost', 'mysql', 'mysql', 'pract');
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];


    if ($password === $password_confirm) {


        mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `active`) VALUES (NULL, '$login',  '$email', '$password', '0' )");


        $_SESSION['message'] = 'Registration was successful';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Passwords do not match';
        header('Location: ../register.php');
    }

?>
