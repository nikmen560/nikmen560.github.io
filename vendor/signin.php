<?php

    session_start();
    require_once 'connect.php';
    $connect = mysqli_connect('localhost', 'mysql', 'mysql', 'pract');
    $login = $_POST['login'];
    $password = $_POST['password'];
    $_SESSION['login'] = $_POST['login'];
    $date = date("Y-m-d");


$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email'],
            "active" => $user['active'],
            "last_visit" => $user['last_visit']
        ];
        $active = mysqli_query($connect, "UPDATE `users` SET `active` = '1', `last_visit` = '$date' WHERE `users`.`login` = '$login'");
        $_SESSION['active'] = 1;

        header('Location: ../profile.php');

    } else {
        $_SESSION['message'] = 'Login or password is wrong';
        header('Location: ../index.php');
    }
    ?>

<!--<pre>-->
//    print_r($check_user);
//    print_r($user);
//    ?>
<!--</pre>-->
